<?php

namespace App\Http\Controllers;

use App\FacilityTestCollection;
use App\Mail\SendMail;
use App\MedicalTestResult;
use App\PatientInformation;
use App\ReportDescription;
use App\ReportFooterDetail;
use App\ReportResult;
use App\Sign;
use App\TestName;
use App\TestPossibility;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MedicalTestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $reportResult = ReportResult::where('user_id', auth()->user()->id)->first();

        $patient = PatientInformation::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();

        $facilityTestCollection = FacilityTestCollection::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();

        $testName = TestName::where('id', $facilityTestCollection->test_name)->first();

        $resultPossibilities = TestPossibility::where('test_name_id', $facilityTestCollection->test_name)->get();

        return view('result', compact('reportResult', 'facilityTestCollection', 'patient', 'resultPossibilities', 'testName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        try {

            $requestSubmissionType = $request->submission_type;

            $possibility_test = json_encode($request->possibility_test);

            $data = [

                "test_name_id" => $request->test_name_id,
                "test_possibility_id" => $possibility_test,
                "patient_id" => $request->patient_id,
                "facility_test_collection_id" => $request->facility_test_collection_id,
                "specimen_id" => $request->specimen_id,
                "status" => $request->status,
                "description" => $request->description,
            ];


            auth()->user()->medicalTestResult()->save(new MedicalTestResult($data));
            if ($requestSubmissionType == 'print') {
                return redirect()->route('report');
            } else {
                $patientInformations = PatientInformation::where('user_id', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $facilityTestCollection = FacilityTestCollection::where('user_id', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->first();


                $allMedicalResultData = MedicalTestResult::where('user_id', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $medicalTestName = TestName::where('id', $allMedicalResultData->test_name_id)
                    ->orderBy('id', 'desc')
                    ->first();

                $reports = ReportDescription::all();

                $reportsDetailsFooter = ReportFooterDetail::all();

                $signsImage = Sign::first();

                $pdf = PDF::loadView('test', compact('patientInformations', 'facilityTestCollection', 'allMedicalResultData', 'medicalTestName', 'reports', 'reportsDetailsFooter', 'signsImage'));
//                return $pdf->download('report.pdf');

                if ($request->multipleEmails) {

                    Mail::to($patientInformations->email)->cc($request->multipleEmails)->send(new SendMail($patientInformations, $facilityTestCollection,
                        $allMedicalResultData, $medicalTestName, $pdf));
                    return back()->with('success', 'Email send to' . " " . $patientInformations->email . " and selected emails" . "  " . 'successfully');

                } else {

                    Mail::to($patientInformations->email)->send(new SendMail($patientInformations, $facilityTestCollection, $allMedicalResultData, $medicalTestName, $pdf));
                    return back()->with('success', 'Email send to' . " " . $patientInformations->email . " ". 'successfully');

                }
            }

        } catch (\Exception $exception) {

            return back()->with('error', 'There is an issue with your submission. please try again !!!');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

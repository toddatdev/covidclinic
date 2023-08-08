<?php

namespace App\Http\Controllers;

use App\FacilityTestCollection;
use App\PatientInformation;
use App\ReportResult;
use App\TestPossibility;
use Illuminate\Http\Request;

class ReportResultController extends Controller
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

        $resultName = FacilityTestCollection::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();

        $resultPossibility = TestPossibility::where('test_name_id', $resultName->test_name)->get();

        return view('result' ,compact('reportResult','resultName','patient','resultPossibility'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            auth()->user()->reportResult()->save(new ReportResult($request->all()));

            return redirect()->route('report');
        }
        catch (\Exception $exception) {
            return redirect()->route('')
                ->with('error', 'There is an issue with your submission, please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $reportResult = ReportResult::where('user_id', auth()->user()->id)->first();

        if ($reportResult) {

            $reportResult->update([
                'lgg' => null,
                'lgg_result' => null,
                'lgm' => null,
                'lgm_result' => null,
                'flua' => null,
                'flua_result' => null,
                'flub' => null,
                'flub_result' => null,
                'flusars' => null,
                'flusars_result' => null,
                'result_report' => null,

            ]);

            $reportResult->update($request->all());

        } else {
            auth()->user()->reportResult()->save(new FacilityTestCollection($request->all()));
        }

        return redirect()->route('report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

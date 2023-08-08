<?php

namespace App\Http\Controllers;

use App\FacilityInformation;
use App\FacilityReportInfo;
use App\FacilityTestCollection;
use App\MedicalTestResult;
use App\PatientInformation;
use App\ReportDescription;
use App\ReportFooterDetail;
use App\ReportResult;
use App\Sign;
use App\TestDevice;
use App\TestName;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\SendMail;

class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function getAddress(Request $request, $selected_id)
    {

        $getFacilityReportInfo = FacilityReportInfo::where('id', $selected_id)->first();
        return \response($getFacilityReportInfo);

    }


    //Get All Pages Form Data Function

    public function printResult(Response $request)
    {

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

        return view('report', compact('reports', 'reportsDetailsFooter', 'signsImage',
            'patientInformations', 'facilityTestCollection', 'allMedicalResultData', 'medicalTestName'));

    }
}

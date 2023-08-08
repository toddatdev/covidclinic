<?php

namespace App\Http\Controllers;

use App\FacilityInformation;
use App\FacilityReportInfo;
use App\FacilityTestCollection;
use App\TestDevice;
use App\TestName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class FacilityTestCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $facilityTestInformation = FacilityTestCollection::first();
        $facilityInformations = FacilityInformation::all();
        $facilityReportInfo = FacilityReportInfo::all();
        $testNames = TestName::all();
        $testDevices = TestDevice::all();

        return view('facility-information',compact('facilityInformations','facilityReportInfo','testNames','testDevices','facilityTestInformation'));
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

            auth()->user()->facilityTestCollection()->save(new FacilityTestCollection($request->all()));

            return redirect()->route('medical-result.index');

        } catch (\Exception $exception) {

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $FacilityTestCollection = FacilityTestCollection::where('user_id', auth()->user()->id)->first();

        if ($FacilityTestCollection) {

            $FacilityTestCollection->update($request->all());

        } else {
            auth()->user()->patientInformations()->save(new FacilityTestCollection($request->all()));
        }

        return redirect()->route('medical-result.index');

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

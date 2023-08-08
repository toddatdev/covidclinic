<?php

namespace App\Http\Controllers;

use App\PatientInformation;
use Illuminate\Http\Request;

class PatientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientInformation = PatientInformation::first();
        return view('patient-information', compact('patientInformation'));
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

            $patientInformation = $request->all();

            auth()->user()->patientInformations()->save(new PatientInformation($patientInformation));

            return redirect()->route('facility-information.index');

        } catch (\Exception $exception) {

            return redirect()->route('')
                ->with('error', 'There is an issue with your submission, please try again later.');

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

        $facilityInfos = PatientInformation::where('user_id', auth()->user()->id)->first();

        if ($facilityInfos) {

            $facilityInfos->update($request->all());

        } else {
            auth()->user()->patientInformations()->save(new PatientInformation($request->all()));
        }
        return redirect()->route('facility-information.index');
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

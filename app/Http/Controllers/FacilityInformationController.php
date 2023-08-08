<?php

namespace App\Http\Controllers;

use App\cr;
use Illuminate\Http\Request;
use App\FacilityInformation;

class FacilityInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $facilityInformations = FacilityInformation::all();
            return view('admin.facilityinfo.index', compact('facilityInformations'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for ideating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilityinfo.create');
    }

    /**
     * Store a newly ideated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $facilityInfo = [
                'facility_info_name' => $request->facility_info_name,
            ];

            $facilityInfo = FacilityInformation::create($facilityInfo);

            if ($facilityInfo) {
                return redirect()->route('facility-info.index')->with('success', 'Facility Information Added successfully');

            }
        }catch (\Exception $exception){

            return redirect()
                ->route('facility-info.index')
                ->with('error', 'There is an issue with your submission, please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function show(id $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fi = FacilityInformation::findOrFail($id);
        return view('admin.courses.edit', compact('fi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $facilityInfos = FacilityInformation::findOrFail($id);


        $facilityInfo = [
            'facility_info_name' => $request->facility_info_name,
        ];

        $facilityInfo = $facilityInfos->update($facilityInfo);

        if ($facilityInfo) {

            return redirect()->route('facility-info.index')->with('success', 'Facility Information Updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FacilityInformation::find($id)->delete();

        return redirect()->route('facility-info.index')->with('deleted','Facility Information Deleted Successfully');
    }
}

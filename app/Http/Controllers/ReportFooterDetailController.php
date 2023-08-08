<?php

namespace App\Http\Controllers;

use App\ReportFooterDetail;
use App\Sign;
use Illuminate\Http\Request;

class ReportFooterDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signs = Sign::all();
        $reportFooterDetails = ReportFooterDetail::all();
        return view('admin.report-footer-details.index', compact('reportFooterDetails', 'signs'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        ReportFooterDetail::create($request->all());

        return redirect()->route('report-footer-details.index')
            ->with('success', 'Footer Details created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fd = ReportFooterDetail::findOrFail($id);

        return view('admin.report-footer-details.edit', compact('fd'));

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
        $ReportFooterDetail = ReportFooterDetail::find($id);
        $ReportFooterDetail->name = $request->name;
        $ReportFooterDetail->lic = $request->lic;
        $ReportFooterDetail->npi = $request->npi;
        $ReportFooterDetail->address = $request->address;
        $ReportFooterDetail->city = $request->city;
        $ReportFooterDetail->state = $request->state;
        $ReportFooterDetail->zip = $request->zip;
        $ReportFooterDetail->email = $request->email;
        $ReportFooterDetail->phone = $request->phone;
        $save = $ReportFooterDetail->save();
        if($save){
            return redirect()->route('report-footer-details.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        ReportFooterDetail::find($id)->delete();

        return redirect()->route('report-footer-details.index')->with('deleted','Footer Detail Deleted Successfully');

    }
}

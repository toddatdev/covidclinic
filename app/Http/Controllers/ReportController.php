<?php

namespace App\Http\Controllers;

use App\ReportDescription;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $reportDescriptions = ReportDescription::all();
            return view('admin.report-descriptions.index', compact('reportDescriptions'));
        }else{
            abort(404);
        }
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


            $report_description = [
                'description' => $request->report_description,
            ];


            $report_description = ReportDescription::create($report_description);

            if ($report_description) {

                return redirect()->route('report-descriptions.index')->with('success', 'Description Added successfully');

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
        $report_descriptions =  ReportDescription::findOrFail($id);


        $report_description = [
            'description' => $request->report_description,
        ];

        $report_description = $report_descriptions->update($report_description);

        if($report_description){

            return redirect()->route('report-descriptions.index')->with('success', 'Description Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReportDescription::find($id)->delete();

        return redirect()->route('report-descriptions.index')->with('deleted','Description Deleted Successfully');
    }
}

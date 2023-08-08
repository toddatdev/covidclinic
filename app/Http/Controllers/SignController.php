<?php

namespace App\Http\Controllers;

use App\Sign;
use Illuminate\Http\Request;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

            $course = new Sign();

            $filename = sprintf('thumbnail_%s.jpg', random_int(1, 1000));
            if ($request->hasFile('thumbnail'))
                $filename = $request->file('thumbnail')->storeAs('images', $filename, 'public');
            $course->thumbnail = $filename;

            $save = $course->save();

            return redirect()
                ->route('report-footer-details.index.index')
                ->with('success','image Created successfully');

        }catch (\Exception $exception){

            return redirect()
                ->route('report-footer-details.index')
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
        $course = Sign::find($id);

        $filename = sprintf('thumbnail_%s.jpg', random_int(1,1000));
        if($request->hasFile('thumbnail')){
            $filename = $request->file('thumbnail')->storeAs('images', $filename,'public');
            $course->thumbnail = $filename;
        }else{
            unset($course['thumbnail']);
        }
        $save = $course->save();
        if($save){
            return redirect()->route('report-footer-details.index')->with('success','Image Updated Successfully');
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
        Sign::find($id)->delete();

        return redirect()->route('report-footer-details.index')->with('deleted','Footer Image Deleted Successfully');
    }
}

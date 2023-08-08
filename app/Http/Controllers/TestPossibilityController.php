<?php

namespace App\Http\Controllers;

use App\TestName;
use App\TestPossibility;
use Illuminate\Http\Request;

class TestPossibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testNames = TestName::all();
        $allTestPossibilities = TestPossibility::all();

        return view('admin.test-possibilities.index',compact('allTestPossibilities','testNames'));
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

            $testPossibility = TestPossibility::create($request->all());

            if ($testPossibility){
                return redirect(route('test-possibilities.index'))->with('success', 'Created Successfully');
            }


        }catch (\Exception $exception){
            return redirect(route('test-possibilities.index'))->with('error', 'Please try again ');
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
        try {

            $testPossibility = TestPossibility::findOrFail($id);

            $testPossibility->update($request->all());

            if ($testPossibility){

                return redirect(route('test-possibilities.index'))->with('success', 'Updated Successfully');
            }


        }catch (\Exception $exception){

            return redirect(route('test-possibilities.index'))->with('error', 'Please try again ');
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
       TestPossibility::find($id)->delete();
        return redirect(route('test-possibilities.index'))->with('deleted', 'Deleted Successfully');
    }
}

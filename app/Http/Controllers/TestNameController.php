<?php

namespace App\Http\Controllers;

use App\TestDevice;
use App\TestName;
use App\TestPossibility;
use Illuminate\Http\Request;

class TestNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $testnames = TestName::all();
            return view('admin.test-names.index', compact('testnames'));
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
        try {


            $test_name = TestName::create($request->all());

            if ($test_name) {
                return redirect()->route('test-names.index')->with('success', 'Test Name Added successfully');

            }
        }catch (\Exception $exception){

            return redirect()
                ->route('test-names.index')
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

        $test_names =  TestName::findOrFail($id);

        $test_name = $test_names->update($request->all());

        if($test_name){

            return redirect()->route('test-names.index')->with('success', 'Test Name Updated successfully');
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

        TestName::find($id)->delete();

        return redirect()->route('test-names.index')->with('deleted','Test Name Deleted Successfully');
    }
}

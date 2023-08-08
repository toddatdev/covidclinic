<?php

namespace App\Http\Controllers;

use App\TestDevice;
use Illuminate\Http\Request;

class TestDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $testdevices = TestDevice::all();
            return view('admin.test-devices.index', compact('testdevices'));
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

            $test_device = [
                'test_device' => $request->test_device,
            ];

            $test_device = TestDevice::create($test_device);

            if ($test_device) {
                return redirect()->route('test-devices.index')->with('success', 'Device Added successfully');

            }
        }catch (\Exception $exception){

            return redirect()
                ->route('test-devices.index')
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

        $test_devices = TestDevice::findOrFail($id);


        $test_device = [
            'test_device' => $request->test_device,
        ];

        $test_device = $test_devices->update($test_device);

        if ($test_device) {

            return redirect()->route('test-devices.index')->with('success', 'Test Device Updated successfully');
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

        TestDevice::find($id)->delete();

        return redirect()->route('test-devices.index')->with('deleted','Device Deleted Successfully');
    }
}

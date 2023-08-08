<?php

namespace App\Http\Controllers;

use App\FacilityInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

     if (auth()->user()->is_admin == 1){
         $users = User::all();
         return view('admin.index', compact('users'));
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
    public function store(UserRequest $request)
    {

        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_admin = $request->role;
            $user->password = Hash::make($request->password);

            $user = $user->save();

            if ($user) {
                return redirect()->route('dashboard.index')->with('success', 'User Created successfully');

            }
        }catch (\Exception $exception){

            return redirect()
                ->route('dashboard.index')
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
    public function update(UserRequestUpdate $request, $id)
    {
        $users = User::findOrFail($id);

            $user = [
            'name' => $request->u_name,
            'email' => $request->u_email,
            'is_admin' => $request->role,
            'password' => Hash::make($request->u_password)
        ];

        $userUpdate = $users->update($user);
        if ($userUpdate) {

            return redirect()->route('dashboard.index')->with('success', 'User updated successfully');
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

        User::find($id)->delete();

        return redirect()->route('dashboard.index')->with('deleted','User Deleted Successfully');
    }
}

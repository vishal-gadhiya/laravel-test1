<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Redirect;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::withCount('blogs')->user()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        try {


            event(new Registered(User::create($input)));
            return Redirect::to('admin/users')->with('success_message','User Added Successfully');

        } catch (\Exception $e) {

            return Redirect::back()->with('error_message','Something Went Wrong. Please try again.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.add', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->dob = $request->dob;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        try {

            $user->save();
            return Redirect::to('admin/users')->with('success_message','User Updatedss Successfully');

        } catch (\Exception $e) {

            return Redirect::back()->with('error_message','Something Went Wrong. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return Redirect::to('admin/users')->with('success_message','User deleted Successfully');
        }else{
            return Redirect::to('admin/users')->with('error_message','Something Went Wrong. Please try again.');
        }
    }
}

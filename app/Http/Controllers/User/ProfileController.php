<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\ProfileRequest;
use App\Models\User;
use Redirect;
use Hash;

class ProfileController extends Controller
{
    public function index()
	{
		return view('user.profile', [
			'user' => auth()->user()
		]);
	}
   
    public function store(ProfileRequest $request)
    {
    	$input = $request->all();
    	unset($input['_token'],$input['password']);

    	if($request->password):
    		$input['password'] = Hash::make($request->password);
    	endif;

    	if(User::where('id', auth()->user()->id)->update($input)){
    		return Redirect::back()->with('success_message','Profile Updated Successfully');
    	}else{
    		return Redirect::back()->with('error_message','Something Went Wrong. Please try again.');
    	}
    }
}

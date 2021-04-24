<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('user.dashboard', [
    		'blogs' => Blog::where('user_id', auth()->user()->id)->count()
    	]);
    }
}

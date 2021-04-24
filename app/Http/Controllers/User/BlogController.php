<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\BlogRequest;
use App\Models\Blog;
use Auth;
use Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.blogs.index', [
            'blogs' => Blog::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.blogs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try {

            $blog = new Blog([
                'title'   => $request->title,
                'content' => $request->content
            ]);

            Auth::user()->blogs()->save($blog);
            return Redirect::to('user/blogs')->with('success_message','Blog Added Successfully');

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
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('user.blogs.add', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->content = $request->content;

        try {

            $blog->save();
            return Redirect::to('user/blogs')->with('success_message','Blog Updated Successfully');

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
    public function destroy(Blog $blog)
    {
        if($blog->delete()){
            return Redirect::back()->with('success_message','Blog deleted Successfully');
        }else{
            return Redirect::back()->with('error_message','Something Went Wrong. Please try again.');
        }
    }
}

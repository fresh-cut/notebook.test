<?php

namespace App\Http\Controllers\Blog;


use App\Models\Posts;
use Faker\Provider\Base;
use Illuminate\Http\Request;


class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        //dd($posts);
        return view('blog.posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posts $post)
    {
        $post->title=$request->title;
        $post->bodytext=$request->bodytext;
        $post->save();
        return redirect()->route('blog.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Posts::where('id', $id)->first();
        return view('blog.posts.show', compact('post') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post= Posts::where('id', $id)->first();
        return view('blog.posts.edit', compact('post'));
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
        $post=Posts::find($id);
        $post->title=$request->title;
        $post->bodytext=$request->bodytext;
        $post->save();
        return redirect()->route('blog.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::destroy($id);
        return redirect()->route('blog.posts.index');
    }
}


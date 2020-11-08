<?php

namespace App\Http\Controllers\Blog;


use App\Models\BlogPost;

use App\Repositories\BlogPostRepository;
use Faker\Provider\Base;
use Illuminate\Http\Request;


class PostController extends BaseController
{
    protected $blogPostRepository;
    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository=app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate();
        //dd($posts, $posts->count());
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
    public function store(Request $request, BlogPost $post)
    {
        $post->create($request->all());
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
        $post= BlogPost::where('id', $id)->first();
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

        $post= $this->blogPostRepository->getEdit($id);
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
        $post=$this->blogPostRepository->getedit($id);
        $post->update($request->all());
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
        BlogPost::destroy($id);
        return redirect()->route('blog.posts.index');
    }
}


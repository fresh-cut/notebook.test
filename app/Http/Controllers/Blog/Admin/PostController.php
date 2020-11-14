<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    private $blogPostRepository;
    private $blogCategoryRepository;
    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository=app(BlogPostRepository::class);
        // если редко используется,то можно пораждать и в методе
        $this->blogCategoryRepository=app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate();
//        dd($posts)
        return view('blog.admin.posts.index', compact('posts'));
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
        //
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
        $item=$this->blogPostRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
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
        $item=$this->blogPostRepository->getEdit($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=$id  не найдена"])
                ->withInput();//вернуть с веденными данными - нужна в виде функция old()
        }
        $result=$item->fill($request->all())->save();
        if($result)
        {
            return redirect()
                ->route('blog.admin.posts.edit',$id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
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
        dd(__METHOD__);
    }
}

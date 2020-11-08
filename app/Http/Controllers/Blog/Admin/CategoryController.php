<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts=BlogCategory::find(2)->posts;
//        dd($posts);
        $blogCategories=$this->blogCategoryRepository->getAllWithPaginate(6);
        return view('blog.admin.categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.categories.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request, BlogCategory$blogCategory)
    {
        $result=$blogCategory
            ->fill($request->all())
            ->save();//массовое сохранение(присвоение

        //
        // альтернатива тому что сверху
        // $data=$request->all();
        //$result=new BlogCategory($data);
        //
        //dd($blogCategory, $this->blogCategoryRepository);
        if($result)
        {
            return redirect()
                ->route('blog.admin.categories.edit', $blogCategory->id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=$this->blogCategoryRepository->getEdit($id); // получить запись для редактирования
        if(empty($item)) {
            abort(404);
        }
        $categoryList=$this->blogCategoryRepository->getForComboBox(); // получить для выпадающего списка
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item=$this->blogCategoryRepository->getEdit($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=$id  не найдена"])
                ->withInput();//вернуть с веденными данными - нужна в виде функция old()
        }
         $result=$item->fill($request->all())->save();//массовое сохранение(присвоение или можно $item->update($request->all())
        if($result)
        {
            return redirect()
                ->route('blog.admin.categories.edit',$id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }
}

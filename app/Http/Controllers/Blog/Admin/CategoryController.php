<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories=BlogCategory::paginate(6);
       // dd($categories);
        return view('blog.admin.categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        var_dump('ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogCategory=BlogCategory::findOrFail($id);
        $categotyList=BlogCategory::all('id', 'title');
        //dd($blogParent);
        return view('blog.admin.categories.edit', compact('blogCategory', 'categotyList'));
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
        $blogCategory=BlogCategory::find($id);
        if(empty($blogCategory))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=$id  не найдена"])
                ->withInput();//вернуть с веденными данными - нужна в виде функция old()
        }
         $result=$blogCategory->fill($request->all())->save();//массовое сохранение(присвоение
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

<?php


namespace App\Repositories;


use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список постов для вывода пагинатором
     *
     * @param $count
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count=25)
    {
        $fields = ['id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'];
        $result = $this->startConditions()
            ->select($fields) // выбираем только те поля которые нам нужны
            ->orderBy('id', 'DESC') // сортируем по ид в оратном порядке, что бы новые посты были сверху
                //->with(['category', 'user']) //  можно подвязывать отношения так(но заберет всеполя) или как ниже
                // можно и не использовать with, но тогда будет очень много запросов на каждую итерацию цикла.
                //поэтому рекомендуют подвязывать отношения сразу
                 ->with([ //так заберет только те поля которые нам нужны
                 'category'=> function($query) { // два способа
                      $query->select(['id', 'title']);
                      },
                 'user:id,name',
                 ])
            ->paginate($count);
        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id); // findOrFail лучше не деать в недрах кода, лучше всего в контроллерах
    }
}

<?php
namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить данные для редактирования в админке
     *
     * @param $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
       return $this->startConditions()->find($id); // findOrFail лучше не деать в недрах кода, лучше всего в контроллерах
    }

    /**
     * Получить список категорий для вывода в выпадающем списке
     *
     * @param $params
     * @return Collection
     */
    public function getForComboBox()
    {
        $fields=implode(', ', [
            'id',
            'CONCAT (id, ".", title) AS id_title'
        ]);
        $result = $this->startConditions()
            ->selectRaw($fields) // что бы использовать уже готовое SQL-выражение в вашем запросе
            ->toBase() // не нужно агригировать полученые данные в обьект блогкатегории, создает просто колекции
            ->get();
        return $result;
    }

    /**
     * Получить категории для вывода пагинатором
     *
     * @param $count
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count)
    {
        $fields=['id', 'title', 'parent_id'];
        return $this->startConditions()
            ->with('parentCategory:id,title')
            ->paginate($count, $fields); // выбираем только те поля которые нам нужны
    }
}

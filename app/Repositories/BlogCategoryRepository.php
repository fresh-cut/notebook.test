<?php
namespace App\Repositories;

use App\Models\BlogCategory as Model;

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
    public function getForComboBox($params)
    {
        return $this->startConditions()->all($params);
    }

}

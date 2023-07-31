<?php

namespace QH\Category\Repository;

use App\Repositories\BaseRepository;
use QH\Category\Repository\CategoryRepositoryInterface;
use QH\Category\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Category::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }
}
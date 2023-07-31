<?php

namespace QH\Category\Repository;

use App\Repositories\IRepository;

interface CategoryRepositoryInterface extends IRepository
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
}

<?php

namespace QH\Product\Repository;

use App\Repositories\IRepository;

interface ProductRepositoryInterface extends IRepository
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();

    public function getAllCategories();
    public function getAllUsers();
    public function deleteAndUnlinkImage($id);
}

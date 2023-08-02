<?php

namespace QH\Order\Repository;

use QH\Order\Models\Purchase;
use Qh\Product\Models\Product;
use App\Repositories\BaseRepository;
use QH\Order\Models\PurchaseProduct;
use QH\Order\Repository\PurchaseRepositoryInterface;

class PurchaseRepository extends BaseRepository implements PurchaseRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Purchase::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }

    public function getPurchaseProduct($id){
        return PurchaseProduct::where('purchase_id',$id)->get();
        
        
    }
}
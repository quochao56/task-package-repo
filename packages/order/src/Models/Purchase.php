<?php

namespace QH\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function purchaseProducts(){
        return $this->hasMany(PurchaseProduct::class);
    }
}

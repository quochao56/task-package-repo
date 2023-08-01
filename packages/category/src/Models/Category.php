<?php

namespace QH\Category\Models;

use Qh\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

}

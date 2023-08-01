<?php

namespace Qh\Product\Models;

use App\Models\User;
use QH\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumb',
        'price',
        'qty',
        'content',
        'category_id',
        'author_id',
        'author_type',
        'author_type',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}

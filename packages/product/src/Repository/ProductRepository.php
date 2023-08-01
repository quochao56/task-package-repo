<?php

namespace QH\Product\Repository;

use App\Models\User;
use QH\Product\Models\Product;
use QH\Category\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;
use QH\Product\Repository\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Product::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }

    public function getAllCategories()
    {
        $categories = Category::all();
        return $categories;
    }
    public function getAllUsers()
    {
        $users = User::all();
        return $users;
    }
    public function deleteAndUnlinkImage($id)
    {
        // $this->delete($id);
        $product = $this->model->find($id);
        if ($product) {
            $thumbnailPath = public_path($product->thumb);
            if (File::exists($thumbnailPath)) {
                try {
                    unlink($thumbnailPath);
                    // File deletion successful
                } catch (\Exception $e) {
                    \Log::error('Error deleting thumbnail: ' . $e->getMessage());
                }
            } else {
                \Log::error('File not found: ' . $thumbnailPath);
            }
        }
    }

    public function getAllProducts(){
        return Product::with("category")->with("user")->orderByDesc("id")->paginate(3);
    }

}

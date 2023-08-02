<?php

namespace QH\Product\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QH\Product\Repository\ProductRepository;
use QH\Product\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAllProducts();
        
        return view('admin.product.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = $this->productRepo->getAllCategories();
        $users = $this->productRepo->getAllUsers();
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm mới',
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumb' => 'required',
            'price' => 'required|numeric|gt:0',
            'qty' => 'required|numeric|gt:0',
            'content' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'author_type' => 'required',
        ]);

        $request->except('_token');
        $data = $request->all();
        try {
            $products = $this->productRepo->create($data);
            session()->flash('success', 'Thêm Sản phẩm Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.products.index");
    }

    public function show($id)
    {
        $categories = $this->productRepo->getAllCategories();
        $users = $this->productRepo->getAllUsers();
        $product = $this->productRepo->find($id);

        return view('admin.product.edit', [
                'title' => 'Sửa sản phẩm',
                'product' => $product,
                'categories' => $categories,
                'users' => $users
            ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'thumb' => 'required',
            'price' => 'required|numeric|gt:0',
            'qty' => 'required|numeric|gt:0',
            'content' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'author_type' => 'required',
        ]);
        $request->except('_token');
        $data = $request->all();
        try {
            $product = $this->productRepo->update($id, $data);
            session()->flash('success', 'Sửa Sản phẩm Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.products.index");
    }

    public function destroy($id)
    {
        try {
            $result = $this->productRepo->deleteAndUnlinkImage($id);
            
            session()->flash('success', 'Xóa Sản phẩm Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.products.index");
    }
}

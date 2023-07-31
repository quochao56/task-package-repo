<?php

namespace QH\Category\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QH\Category\Repository\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    // public function index(){
    //     return view('category::index');
    // }

    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->getAll();

        return view('admin.category.index', [
            'title' => 'Danh sánh danh mục',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.add', [ 'title' => 'Thêm danh mục mới']);
    }
    public function show($id)
    {
        $category = $this->categoryRepo->find($id);

        return view('admin.category.add', [ 'category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        $product = $this->categoryRepo->create($data);

        return redirect()->route("admin.category.index");
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();

    //     //... Validation here

    //     $product = $this->productRepo->update($id, $data);

    //     return view('home.products');
    // }

    // public function destroy($id)
    // {
    //     $this->productRepo->delete($id);
        
    //     return view('home.products');
    // }
}

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

        dd($category);
        return view('admin.category.add', ['title' => 'Sửa danh mục', 'category' => $category]);
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();

        //... Validation here

        $product = $this->categoryRepo->update($id, $data);

        return view('admin.category.index');
    }

    // public function destroy($id)
    // {
    //     $this->productRepo->delete($id);
        
    //     return view('home.products');
    // }
}

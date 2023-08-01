<?php

namespace QH\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QH\Category\Repository\CategoryRepositoryInterface;

class CategoryController extends Controller
{

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
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.add', ['title' => 'Thêm danh mục mới']);
    }
    public function show($id)
    {
        $category = $this->categoryRepo->find($id);

        return view('admin.category.edit', ['title' => 'Sửa danh mục', 'category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $request->except('_token');
        $data = $request->all();
        try {
            $category = $this->categoryRepo->create($data);
            session()->flash('success', 'Thêm Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.category.index");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        try {
            $category = $this->categoryRepo->update($id, $data);
            session()->flash('success', 'Sửa Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.category.index");
    }
    public function destroy($id)
    {
        try {
            $result = $this->categoryRepo->delete($id);
            session()->flash('success', 'Xóa Danh Mục Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.category.index");
    }
}

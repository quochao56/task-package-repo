<?php

namespace QH\Order\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use QH\Order\Http\Services\PurchaseService;
use QH\Order\Repository\PurchaseRepositoryInterface;
use QH\Product\Repository\ProductRepositoryInterface;

class PurchaseController extends Controller
{
    protected $productRepo;
    protected $purchaseService;
    protected $purchaseRepo;

    public function __construct(ProductRepositoryInterface $productRepo, PurchaseService $purchaseService, PurchaseRepositoryInterface $purchaseRepo)
    {
        $this->productRepo = $productRepo;
        $this->purchaseService = $purchaseService;
        $this->purchaseRepo = $purchaseRepo;
    }
    public function index(){
        $products = $this->productRepo->getAllProducts();
        $products_selected = $this->purchaseService->getProduct();

        return view('admin.order.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
            'products_selected' =>$products_selected,
            'carts' => Session::get('carts')
        ]);
    }
    public function create(Request $request){
        $this->purchaseService->create($request);

        return redirect()->back();
    }

    public function list(){
        $purchases = $this->purchaseRepo->getAll();
        return view('admin.order.list', [
            'title' => 'Danh sánh đơn hàng',
            'purchases' => $purchases
        ]);
    }

    public function detail($id){
        $purchases = $this->purchaseRepo->getPurchaseProduct($id);
        return view('admin.order.detail', [
            'title' => 'Chi tiết đơn hàng',
            'purchases' => $purchases,
        ]);
    }

    public function update(Request $request)
    {
        $request->except("_token");
        $this->purchaseService->update($request);

        return redirect()->back();
    }
    public function destroy($id = 0)
    {
        $this->purchaseService->remove($id);

        return redirect()->back();
    }
}

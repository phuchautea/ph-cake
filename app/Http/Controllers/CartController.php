<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Http\Services\OrderService;
use App\Http\Services\Payment\PaymentService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    protected $paymentService;
    protected $productService;
    protected $orderService;
    public function __construct(CartService $cartService, PaymentService $paymentService,
                                ProductService $productService, OrderService $orderService) {
        $this->cartService = $cartService;
        $this->paymentService = $paymentService;
        $this->productService = $productService;
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        $result = $this->cartService->add($request);
        if ($result == false){
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('cart.list', [
            'title' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }
    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }
}
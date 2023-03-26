<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function getBySlug($slug){
        $product = $this->productService->getBySlug($slug);
        if ($product != null) {
            return view('product.details', [
                'title' => 'Sản phẩm: '.$product->name.'',
                'product' => $product,
            ]);
        }
        return redirect()->route('home');
    }
}

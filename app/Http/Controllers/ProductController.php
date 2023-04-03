<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Http\Services\ReviewService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $reviewService;
    public function __construct(ProductService $productService, ReviewService $reviewService)
    {
        $this->productService = $productService;
        $this->reviewService = $reviewService;
    }
    public function getBySlug($slug){
        $product = $this->productService->getBySlug($slug);
        $related_products = $this->productService->getRelatedProducts($product->category_id, $product->id);
        $reviews = $this->reviewService->getAll();
        if ($product != null) {
            return view('product.details', [
                'title' => 'Sản phẩm: '.$product->name.'',
                'product' => $product,
                'related_products' => $related_products,
                'reviews' => $reviews,
            ]);
        }
        return redirect()->route('home');
    }
}

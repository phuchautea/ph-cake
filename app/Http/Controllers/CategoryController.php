<?php

namespace App\Http\Controllers;

use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $productService;
    public function __construct(CategoryService $categoryService, ProductService $productService){
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function all(Request $request)
    {
        $sortby = $request->get('sortby');
        if (empty($sortby)) {
            $products = $this->productService->getAllPaginate();
        } else {
            $products = $this->productService->getAll();
        }

        switch ($sortby) {
            case 'price-ascending':
                $products = $products->sortBy('price');
                break;
            case 'price-descending':
                $products = $products->sortByDesc('price');
                break;
            case 'title-ascending':
                $products = $products->sortBy('title');
                break;
            case 'title-descending':
                $products = $products->sortByDesc('title');
                break;
            case 'created-ascending':
                $products = $products->sortBy('created_at');
                break;
            case 'created-descending':
                $products = $products->sortByDesc('created_at');
                break;
            case 'best-selling':
                $products = $products->sortByDesc('sold_quantity');
                break;
            case 'quantity-descending':
                $products = $products->sortByDesc('quantity');
                break;
            default:
                // do nothing
                break;
        }

        return view('category.collections', [
            'title' => 'Bộ sưu tập',
            'categories' => $this->categoryService->getAll(),
            'products' => $products,
        ]);
    }

    public function getByCategorySlug($categorySlug)
    {
        $category = $this->categoryService->getBySlug($categorySlug);
        if ($category != null) {
            return view('category.collections', [
                'title' => 'Bộ sưu tập',
                'category_info' => $category,
                'categories' => $this->categoryService->getAll(),
                'products' => $this->productService->getByCategoryAndParent($category->id),
            ]);
        }
        return redirect()->route('home');
    }
}

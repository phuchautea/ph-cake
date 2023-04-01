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
        if (empty($sortby) || $sortby == '') {
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
            case 'name-ascending':
                $products = $products->sortBy('name');
                break;
            case 'name-descending':
                $products = $products->sortByDesc('name');
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

    public function getByCategorySlug($categorySlug, Request $request)
    {
        $category = $this->categoryService->getBySlug($categorySlug);
        if ($category != null) {
            $sortby = $request->get('sortby');
            if (empty($sortby) || $sortby == '') {
                $products = $this->productService->getByCategoryAndParentPaginate($category->id);
            } else {
                $products = $this->productService->getByCategoryAndParent($category->id);
            }

            switch ($sortby) {
                case 'price-ascending':
                    $products = $products->sortBy('price');
                    break;
                case 'price-descending':
                    $products = $products->sortByDesc('price');
                    break;
                case 'name-ascending':
                    $products = $products->sortBy('name');
                    break;
                case 'name-descending':
                    $products = $products->sortByDesc('name');
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
                'category_info' => $category,
                'categories' => $this->categoryService->getAll(),
                'products' => $products,
            ]);
        }
        return redirect()->route('home');
    }
}

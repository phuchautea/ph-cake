<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ManageProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'total_records' => $products->total(),
        ])->with('productService', $this->productService);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Tạo sản phẩm',
            'categories' => $this->productService->getCategory(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFormRequest $request)
    {
        $result = $this->productService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $product->name,
            'product' => $product,
            'products' => $this->productService->getAll(),
            'categories' => $this->productService->getCategory(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFormRequest $request, Product $product)
    {
        $result = $this->productService->update($product, $request);
        return redirect('admin/product/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->remove($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Có lỗi xảy ra khi xóa sản phẩm'
        ]);
    }
}

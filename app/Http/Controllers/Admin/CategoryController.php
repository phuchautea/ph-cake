<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.category.list', [
            'title' => 'Danh sách danh mục',
            'categories' => $categories,
            'total_records' => $categories->total(),
            // 'categoryWithParent' => $this->categoryService->categoryWithParent($categories),
        ])->with('categoryService', $this->categoryService);
        //return view('admin.category.list', compact('html'))->with('categoryService', $this->categoryService);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add', [
            'title' => 'Tạo danh mục',
            'categories' => $this->categoryService->getParent(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFormRequest $request)
    {
        $result = $this->categoryService->create($request);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        dd($category);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $category->name,
            'category' => $category,
            'categories' => $this->categoryService->getParent()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFormRequest $request, Category $category)
    {
        $result = $this->categoryService->update($category, $request);
        return redirect('admin/category/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->categoryService->remove($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Có lỗi xảy ra khi xóa danh mục'
        ]);
    }
}

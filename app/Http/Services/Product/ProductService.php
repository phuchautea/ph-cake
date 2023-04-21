<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    public function add($request)
    {
        try {
            $price = str_replace(',', '', $request->input('price'));
            Product::create([
                'name' => (string)$request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
                'description' => (string)$request->input('description'),
                'image' => (string)$request->input('image'),
                'price' => $price,
                'category_id' => (string)$request->input('category_id'),
                'sold_quantity' => 0,
                'status' => "1",
            ]);
            Session::flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }
    public function remove($request)
    {
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->first();
        if ($product) {
            return Product::where('id', $id)->delete();
        }
        return false;
    }
    public function update($product, $request) : bool
    {
        try {
            $product->fill($request->input());
            $product->price = str_replace(',', '', $request->price);
            $product->slug = Str::slug($request->name, "-");
            $product->updated_at = time();
            $product->save();
            
            Session::flash('success', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getAll()
    {
        return Product::all();
    }
    public function getById($id)
    {
        return Product::find($id);
    }
    public function getAllPaginate()
    {
        return Product::paginate(5);
    }
    public function getBySlug($slug)
    {
        return Product::where('slug', $slug)->first();
    }
    public function getRelatedProducts($categoryId, $productId){
        return Product::where('category_id', $categoryId)
                        ->where('id', '!=', $productId)
                        ->get();
    }
    public function getByCategoryId($categoryId){
        return Product::where('category_id', $categoryId)->get();
    }
    public function getByCategoryAndParent($categoryId){
        return Product::where('category_id', $categoryId)
                        ->orWhere(function ($query) use ($categoryId) {
                            $query->whereIn('category_id', function ($query) use ($categoryId) {
                                $query->select('id')
                                    ->from('categories')
                                    ->where('parent_id', $categoryId);
                            })->where('category_id', '<>', $categoryId);
                        })->get();
    }
    public function getByCategoryAndParentPaginate($categoryId)
    {
        return Product::where('category_id', $categoryId)
            ->orWhere(function ($query) use ($categoryId) {
                $query->whereIn('category_id', function ($query) use ($categoryId) {
                    $query->select('id')
                        ->from('categories')
                        ->where('parent_id', $categoryId);
                })->where('category_id', '<>', $categoryId);
            })->paginate(5);
    }
    public function status($status = 0): string
    {
        return $status == 0 ? '<span class="btn btn-danger btn-xs">TẮT</span>'
                            : '<span class="btn btn-success btn-xs">BẬT</span>';
    }
}
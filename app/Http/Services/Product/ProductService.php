<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    public function create($request)
    {
        try {
            $price = str_replace(',', '.', $request->input('price'));
            Product::create([
                'name' => (string)$request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
                'description' => (string)$request->input('description'),
                'image' => (string)$request->input('image'),
                'price' => $price,
                'category_id' => (string)$request->input('category_id'),
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
            $product->slug = Str::slug($request->name, "-");
            $product->updated_at = time();
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getCategory()
    {
        return Category::orderBy('created_at', 'asc')->get();
    }
    public function getAll()
    {
        return Product::orderBy('created_at', 'asc')->paginate(5);
    }
    public function status($status = 0): string
    {
        return $status == 0 ? '<span class="btn btn-danger btn-xs">TẮT</span>'
                            : '<span class="btn btn-success btn-xs">BẬT</span>';
    }
}

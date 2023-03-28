<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    public function add($request)
    {
        try {
            Category::create([
                'name' => (string)$request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
                'description' => (string)$request->input('description'),
                'image' => (string)$request->input('image'),
                'parent_id' => (string)$request->input('parent_id'),
                'status' => "1",
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }
    public function remove($request)
    {
        $id = (int)$request->input('id');
        $category = Category::where('id', $id)->first();
        if ($category) {
            return Category::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
    public function update($category, $request) : bool
    {
        try {
            if ($category->id == $request->parent_id) {
                Session::flash('error', 'Parent_ID không được chọn chính nó');
            } else {
                $category->slug = Str::slug($request->name, "-");
                $category->updated_at = time();
                $category->fill($request->input());
                $category->save();
                Session::flash('success', 'Cập nhật danh mục thành công');
            }
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getAll()
    {
        return Category::all();
    }
    public function getById($id){
        return Category::find($id);
    }
    public function getAllPaginate()
    {
        return Category::orderBy('created_at', 'asc')->paginate(5);
    }
    public function getParent()
    {
        return Category::where('parent_id', 0)->get();
    }
    public function getBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
    
    public function categoryWithParent($categories, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $html .= '
                <tr>
                    <td style="width: 100px">
                        <a href="/admin/category/edit/' . $category->id . '" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" onclick="removeRow(' . $category->id . ', \'/admin/category/destroy\')"
                            class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td style="width: 10px">' . $category->id . '</td>
                    <td>' . $char . '' . $category->name . '</td>
                    <td>' . $category->slug . '</td>
                    <td>' . $category->description . '</td>
                    <td>' . self::status($category->status) . '</td>
                    <td>' . $category->created_at . '</td>
                    <td>' . $category->updated_at . '</td>
                </tr>
                ';

                unset($categories[$key]);
                $html .= self::categoryWithParent($categories, $category->id, $char . $category->name . '|--');
            }
        }
        return $html;
    }
    public function status($status = 0): string
    {
        return $status == 0 ? '<span class="btn btn-danger btn-xs">TẮT</span>'
                            : '<span class="btn btn-success btn-xs">BẬT</span>';
    }
}

?>
<?php

namespace App\Http\Services;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ReviewService
{
    public function add($request)
    {
        if(Auth::check()){
            try {
                Review::create([
                    'title' => (string)$request->input('title'),
                    'content' => (string)$request->input('content'),
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->input('product_id'),
                    'rating' => $request->input('rating'),
                ]);
                Session::flash('success', 'Thêm đánh giá thành công');
            } catch (\Exception $ex) {
                Session::flash('error', $ex->getMessage());
                return false;
            }
            return true;
        }else{
            Session::flash('error', 'Vui lòng đăng nhập để đánh giá');
            return false;
        }
    }
    public function getAll() {
        return Review::all()->sortByDesc('created_at');
    }
    public function getAllPaginate()
    {
        return Review::orderBy('created_at', 'desc')->paginate(5);
    }
    public function remove($request)
    {
        $id = (int)$request->input('id');
        $review = Review::where('id', $id)->first();
        if ($review) {
            return Review::where('id', $id)->delete();
        }
        return false;
    }
}
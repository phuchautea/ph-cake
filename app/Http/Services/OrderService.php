<?php

namespace App\Http\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class OrderService
{
    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

    public function add($order)
    {
        try {
            //$price = str_replace(',', '.', $request->input('price'));
            $newOrder = Order::create([
                'customer_id' => $order['customer_id'],
                'code' => self::generateRandomString(12),
                'payment_method' => $order['payment_method'],
                'payment_status' => $order['payment_status'],
                'note' => $order['note'],
                'total_price' => $order['total_price'],
                'status' => "1",
            ]);
            Session::flash('orderCode', $newOrder->code); //đính kèm mã order để tra cứu đơn hàng
            return $newOrder->id;
        } catch (\Exception $ex) {
            return 0;
        }
    }
    public function remove($request)
    {
        $id = (int)$request->input('id');
        $category = Order::where('id', $id)->first();
        if ($category) {
            return Order::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
    public function update($category, $request): bool
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
        return Order::all();
    }
    public function getById($id)
    {
        return Order::find($id);
    }
}

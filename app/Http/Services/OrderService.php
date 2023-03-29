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
                'status' => $order['status'],
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
    public function search($request)
    {
        $code = $request->input('code');
        $category = Order::where('code', $code)->first();
        if ($category) {
            return Order::where('code', $code)->get();
        }
        return false;
    }
    public function update($order, $request): bool
    {
        try {
            $order->updated_at = time();
            $order->fill($request->input());
            $order->save();
            Session::flash('success', 'Cập nhật đơn hàng thành công');
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
    public function getByCode($code)
    {
        return Order::where('code', $code)->get();
    }
    public function getByCodeInfo($code)
    {
        return Order::with('customer', 'orderDetails')->where('code', $code)->get();
    }
    public function getAllPaginate()
    {
        return Order::orderBy('created_at', 'desc')->paginate(10);
    }
    public function getAllInfoPaginate()
    {
        return Order::with('customer', 'orderDetails')->orderBy('created_at', 'desc')->paginate(10);
    }
    public function status($status = 0): string
    {
        switch ($status) {
            case 1:
                return '<span class="btn btn-primary btn-xs">ĐANG LÀM</span>';
                break;
            case 2:
                return '<span class="btn btn-warning btn-xs">ĐANG GIAO</span>';
                break;
            case 3:
                return '<span class="btn btn-success btn-xs">HOÀN THÀNH</span>';
                break;
            case 4:
                return '<span class="btn btn-danger btn-xs">ĐÃ HỦY</span>';
                break;
            default:
                return '<span class="btn btn-info btn-xs">CHỜ XÁC NHẬN</span>';
                break;
        }
    }
    public function payment_status($status = 0): string
    {
        return $status == 'paid' ? '<span class="btn btn-success btn-xs">ĐÃ THANH TOÁN</span>'
        : '<span class="btn btn-danger btn-xs">CHƯA THANH TOÁN</span>';
    }
}

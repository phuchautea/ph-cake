<?php

namespace App\Http\Services;

use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderDetailService
{
    public function add($order_details){
        $carts = $order_details['carts'];
        foreach ($carts as $product_id => $quantity){
            $product = Product::find($product_id);
            OrderDetail::create([
                'order_id' => $order_details['order_id'],
                'product_id' => $product_id,
                'product_name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'total_price' => $product->price * $quantity,
            ]);
            $product->increment('sold_quantity', $quantity);
        }
    }
}
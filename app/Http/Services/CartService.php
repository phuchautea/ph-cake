<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class CartService
{
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    public function add(Request $request)
    {
        $quantity = (int)$request->input('quantity');
        $product_id = (int)$request->input('product_id');
        $product = $this->productService->getById($product_id);
        if ($quantity <= 0) {
            Session::flash('error', 'Số lượng không hợp lệ');
            return false;
        }
        if ($product_id <= 0 || $product == null) {
            Session::flash('error', 'Sản phẩm không hợp lệ');
            return false;
        }
        $carts = Session::get('carts');

        if (is_null($carts)) {
            $carts = [
                $product_id => $quantity,
            ];
        } else {
            $exists = Arr::exists($carts, $product_id);
            if ($exists) {
                $quantityNew = $carts[$product_id] + $quantity;
                $carts[$product_id] = $quantityNew;
            } else {
                $carts[$product_id] = $quantity;
            }
        }
        Session::put('carts', $carts);
        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)){
            return [];
        }
        $productIds = array_keys($carts);
        return Product::select('id', 'name', 'price', 'image')
            ->where('status', '1')
            ->whereIn('id', $productIds)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('quantity'));
        $carts = Session::get('carts');
        foreach ($carts as $product_id => $quantity) {
            if ($quantity <= 0) {
                unset($carts[$product_id]);
            }
        }
        Session::put('carts', $carts);
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        if($id == 0){
            Session::pull('carts');
        }else{
            unset($carts[$id]);
            Session::put('carts', $carts);
        }
        return true;
    }

    public function store(Request $request){
        try {
            $carts = Session::get('carts');

            if (is_null($carts)){
                return false;
            }
                
            $customer = Customer::create([
                'name' => $request->input('name'),
                'phoneNumber' => $request->input('phoneNumber'),
                'address' => $request->input('address'),
                'note' => $request->input('note')
            ]);

            $this->infoProductCart($carts, $customer->id);

            Session::flash('success', 'Đặt hàng thành công');

            Session::forget('carts');
        }catch (\Exception $e){
            Session::flash('error', 'Đã có lỗi xảy ra khi đặt hàng, vui lòng thử lại');
            return false;
        }
        return true;
    }

    public function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'image')
            ->where('status', "1")
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantity'   => $carts[$product->id],
                'price' => $product->price
            ];
        }

        return Order::insert($data);
    }

}

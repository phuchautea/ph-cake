<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Http\Services\OrderDetailService;
use App\Http\Services\CustomerService;
use App\Http\Services\CartService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Payment\PaymentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $orderService;
    protected $orderDetailService;
    protected $customerService;
    protected $cartService;
    protected $productService;
    protected $paymentService;
    

    public function __construct(OrderService $orderService, OrderDetailService $orderDetailService,
                                CustomerService $customerService, CartService $cartService,
                                ProductService $productService, PaymentService $paymentService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->customerService = $customerService;
        $this->cartService = $cartService;
        $this->productService = $productService;
        $this->paymentService = $paymentService;
    }
    public function success()
    {
        if (Session::has('orderCode')) {
            return view('order.success', [
                'title' => 'Đặt hàng thành công',
                'orderCode' => Session::get('orderCode'),
            ]);
        } else {
            return redirect()->route('home');
        }
    }
    public function search($code)
    {
        $order = $this->orderService->getByCodeInfo($code);
        return view('order.search', [
            'title' => 'Chi tiết đơn hàng',
            'order' => $order,
        ]);
    }
    private function isValidVietnamMobilePhoneNumber($phoneNumber)
    {
        $pattern = '/^(\\+?84|0)(86|96|97|98|32|33|34|35|36|37|38|39|91|94|83|84|85|81|82|90|93|70|79|77|76|78|92|56|58|99|59|55|87)\\d{7}$/';
        return preg_match($pattern, $phoneNumber);
    }
    private function isEmail($email){
        $pattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
        return preg_match($pattern, $email);
    }
    public function store(Request $request)
    {
        
        $errors = [];
        $name = (string)$request->input('name');
        $phoneNumber = (string)$request->input('phoneNumber');
        $address = (string)$request->input('address');
        $email = (string)$request->input('email');
        $note = (string)$request->input('note');
        $payment = (string)$request->input('payment');
        Auth::check() ? $user_id = Auth::user()->id : $user_id = null;
        // if(Auth::check()){
        //     $user_id = Auth::user()->id;
        // }else{
        //     $user_id = null;
        // }
        if (!$name) {
            $errors['name'] = "Vui lòng nhập tên";
        }
        if (self::isValidVietnamMobilePhoneNumber($phoneNumber) == false) {
            $errors['phoneNumber'] = "Số điện thoại không hợp lệ";
        }
        if (self::isEmail($email) == false) {
            $errors['email'] = "Email không hợp lệ";
        }
        if (!$address) {
            $errors['address'] = "Vui lòng nhập địa chỉ";
        }
        if ($payment != "cash" && $payment != "momo" && $payment && "vnpay") {
            $errors['payment'] = "Phương thức thanh toán không hợp lệ";
        }
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        } else {
            
            $customer = []; // lưu thông tin về customer
            $customer['name'] = $name;
            $customer['phoneNumber'] = $phoneNumber;
            $customer['address'] = $address;
            $customer['email'] = $email;
            
            Session::put("customer", $customer);
            // Lấy tổng tiền từ giỏ hàng
            $carts = Session::get("carts");
            $total_price = 0;
            foreach ($carts as $product_id => $quantity) {
                $product = $this->productService->getById($product_id);
                $price = explode('.', $product->price);
                $total_price += $price[0] * $quantity;
            }

            // Lưu thông tin order lên session
            $order = Session::get("order"); // lưu thông tin về order
            $order['note'] = $note;
            $order['payment_method'] = $payment;
            $order['payment_status'] = 'unpaid';
            $order['total_price'] = $total_price;
            $order['user_id'] = $user_id;
            $order['name'] = $name;
            $order['phoneNumber'] = $phoneNumber;
            $order['address'] = $address;
            $order['email'] = $email;
            Session::put("order", $order);
            // thêm phương thức thanh toán vào session['payment'] và chuyển tới phương thức thanh toán
            switch ($payment) {
                case "momo":                    
                    return $this->paymentService->MomoProcess($total_price);
                    break;
                case "vnpay":
                    break;
                default:
                    $customer_id = $this->customerService->add(Session::get("customer")); // Thêm vào customer
                    $order['customer_id'] = $customer_id;
                    $order['status'] = '0';
                    if ($customer_id != 0) {
                        $order_id = $this->orderService->add($order); // Thêm vào order
                        if ($order_id != 0) {
                            $order_details = [];
                            $order_details['carts'] = $carts;
                            $order_details['order_id'] = $order_id;
                            $this->orderDetailService->add($order_details);
                            $this->cartService->remove(0); // xóa hết giỏ hàng
                            Session::pull('customer');
                            Session::pull('order');
                            return redirect('/order/success');
                        }
                    }
                    
                    // add order ở đây, trạng thái chưa thanh toán, xóa session cart
                    break;
            }
        }
    }
}

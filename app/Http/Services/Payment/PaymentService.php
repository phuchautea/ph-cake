<?php

namespace App\Http\Services\Payment;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Services\OrderService;
use App\Http\Services\OrderDetailService;
use App\Http\Services\CustomerService;
use App\Http\Services\CartService;
use App\Http\Services\Payment\Momo\MomoService;
use App\Http\Services\Payment\VNPay\VNPayService;

class PaymentService
{
    protected $orderService;
    protected $orderDetailService;
    protected $customerService;
    protected $cartService;
    protected $momoService;
    protected $vnpayService;
    public function __construct(OrderService $orderService, OrderDetailService $orderDetailService,
                                CustomerService $customerService, CartService $cartService,
                                MomoService $momoService, VNPayService $vnpayService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->customerService = $customerService;
        $this->cartService = $cartService;
        $this->momoService = $momoService;
        $this->vnpayService = $vnpayService;
    }

    public function MomoProcess($amount){
        return $this->momoService->Processing($amount);
    }
    public function momoResult(Request $request){
        // Kiểm tra thêm từ WebHook như vậy ko an toàn
        $resultCode = $request->get('resultCode');
        if ($resultCode == '0')
        {
            $carts = Session::get('carts');
            $order = Session::get('order');
            $customer_id = $this->customerService->add(Session::get("customer")); // Thêm vào customer
            $order['customer_id'] = $customer_id;
            $order['payment_status'] = 'paid';
            $order['status'] = '1';
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
                }
            }
            return redirect('/order/success');
            // thanh toán thành công, đính kèm mã order để tra cứu, bằng session::flash
        }
        return redirect('/pay/error'); // thanh toán thất bại
    }
    public function VNPayProcess($amount)
    {
        return $this->vnpayService->Processing($amount);
    }
    public function vnpayResult(Request $request)
    {
        $vnp_HashSecret = env('vnp_HashSecret'); //Chuỗi bí mật
        $vnp_SecureHash = $request->get('vnp_SecureHash');
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($request->get('vnp_ResponseCode') == '00') {
                $carts = Session::get('carts');
                $order = Session::get('order');
                $customer_id = $this->customerService->add(Session::get("customer")); // Thêm vào customer
                $order['customer_id'] = $customer_id;
                $order['payment_status'] = 'paid';
                $order['status'] = '1';
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
                    }
                }
                return redirect('/order/success');
                // thanh toán thành công, đính kèm mã order để tra cứu, bằng session::flash
            } else {
                return redirect('/pay/error'); // thanh toán thất bại (GD không thành công)
            }
        } else {
            return redirect('/pay/error'); // thanh toán thất bại (Chữ ký không hợp lệ)
        }
    }
    public function ipnMomoResult(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $partnerCode = $data["partnerCode"];
        $orderId = $data["orderId"];
        $requestId = $data["requestId"];
        $amount = $data["amount"];
        $orderInfo = $data["orderInfo"];
        $orderType = $data["orderType"];
        $transId = $data["transId"];
        $resultCode = $data["resultCode"];
        $message = $data["message"];
        $payType = $data["payType"];
        $responseTime = $data["responseTime"];
        $extraData = $data["extraData"];
        $m2signature = $data["signature"]; //MoMo signature
        $accessKey = env('MOMO_accessKey');
        $secretKey = env('MOMO_secretKey');
        //Checksum
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&message=" . $message . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
        "&orderType=" . $orderType . "&partnerCode=" . $partnerCode . "&payType=" . $payType . "&requestId=" . $requestId . "&responseTime=" . $responseTime .
        "&resultCode=" . $resultCode . "&transId=" . $transId;

        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

        if ($m2signature == $partnerSignature) {
            if ($resultCode == '0') {
                return "Thành công";
            } else {
                return $message;
            }
        } else {
            return "This transaction could be hacked, please check your signature and returned signature";
        }
    }
}
?>
<?php

namespace App\Http\Controllers;

use App\Http\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function momoResult(Request $request)
    {
        return $this->paymentService->momoResult($request);
    }
    public function vnpayResult(Request $request)
    {
        return $this->paymentService->vnpayResult($request);
    }
    public function ipnMomoResult(Request $request)
    {
        return $this->paymentService->ipnMomoResult($request);
    }
    public function error()
    {
        return view('payment.error', [
            'title' => 'Thanh toán thất bại',
        ]);
    }
}

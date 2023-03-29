<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\OrderService;
use App\Http\Services\OrderDetailService;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class ManageOrderController extends Controller
{
    protected $productService;
    protected $orderService;
    protected $orderDetailService;
    public function __construct(ProductService $productService, OrderService $orderService,
                                OrderDetailService $orderDetailService)
    {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderService->getAllInfoPaginate();
        $payment_status_list = [
            0 => [
                'id' => 'paid',
                'name' => 'Đã thanh toán'
            ],
            1 => [
                'id' => 'unpaid',
                'name' => 'Chưa thanh toán'
            ]
        ];
        $status_list = [
            0 => [
                'id' => 0,
                'name' => 'Chờ xác nhận'
            ],
            1 => [
                'id' => 1,
                'name' => 'Đang làm'
            ],
            2 => [
                'id' => 2,
                'name' => 'Đang giao'
            ],
            3 => [
                'id' => 3,
                'name' => 'Hoàn thành'
            ],
            4 => [
                'id' => 4,
                'name' => 'Đã hủy'
            ]
        ];
        return view('admin.order.list', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $orders,
            'total_records' => $orders->total(),
            'payment_status_list' => $payment_status_list,
            'status_list' => $status_list,
        ])->with('orderService', $this->orderService);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $result = $this->orderService->update($order, $request);
        if ($result) {
            $arr_result = ['status' => true, 'message' => Session::get('success')];
        }else{
            $arr_result = ['status' => false, 'message' => Session::get('error')];
        }
        return json_encode($arr_result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

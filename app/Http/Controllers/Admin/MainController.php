<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $monthMap = array(
            'January' => 'Tháng 1',
            'February' => 'Tháng 2',
            'March' => 'Tháng 3',
            'April' => 'Tháng 4',
            'May' => 'Tháng 5',
            'June' => 'Tháng 6',
            'July' => 'Tháng 7',
            'August' => 'Tháng 8',
            'September' => 'Tháng 9',
            'October' => 'Tháng 10',
            'November' => 'Tháng 11',
            'December' => 'Tháng 12'
        );

        // Thống kê doanh thu theo tháng
        $currentYear = date('Y');
        $sales = DB::table('orders')
        ->select(DB::raw('DATE_FORMAT(created_at, "%M") as month'), DB::raw('SUM(total_price) as sales'))
        ->whereYear('created_at', $currentYear)
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('YEAR(created_at)'), 'asc')
        ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
        ->get();

        $salesStatistics = [['Tháng', 'Doanh thu']];
        foreach ($sales as $data) {
            $salesStatistics[] = array($monthMap[$data->month], (int) $data->sales);
        }

        // Thống kê phương thức thanh toán
        $payment_methods = DB::table('orders')
                            ->select('payment_method', DB::raw('count(*) as total'))
                            ->groupBy('payment_method')
                            ->get();

        $paymentMethodStatistics = [['Phương thức thanh toán', 'Tổng']];
        foreach ($payment_methods as $data) {
            $paymentMethodStatistics[] = array($data->payment_method, $data->total);
        }

        // Thống kê sản phẩm bán chạy
        $bestSellingProducts = DB::table('products')
                            ->select('id', 'name', 'sold_quantity')
                            ->groupBy('id', 'name')
                            ->orderBy('sold_quantity', 'desc')
                            ->take(5)
                            ->get();
        $soldQuantityStatistics = [['Tên', 'Số lượng']];
        foreach ($bestSellingProducts as $data) {
            $soldQuantityStatistics[] = array($data->name, $data->sold_quantity);
        }

        return view('admin.home', [
            'title' => 'Dashboard Admin',
            'salesStatistics' => $salesStatistics,
            'paymentMethodStatistics' => $paymentMethodStatistics,
            'soldQuantityStatistics' => $soldQuantityStatistics,
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

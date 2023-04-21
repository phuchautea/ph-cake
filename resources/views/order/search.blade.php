@extends('main')
@section('content')
<div class="page-layout">
	
	<div class="wrapper-row pd-page">
        <div class="container-fluid">
			<div class="heading-page">
				<div class="header-page">
					<h1>Tra cứu đơn hàng</h1>
				</div>
			</div>
            @if($order->count() > 0)
			<div class="row wrapbox-content-cart">
				<div class="col-md-12 col-sm-4 col-xs-12 sidebarCart-sticky">
					<div class="sidebox-order">
						<div class="sidebox-order-inner">
							<div class="sidebox-order_title">
								<h3>Thông tin đơn hàng</h3>
							</div>
							<div class="sidebox-order_text">
                                <div class="col-md-6 col-sm-4 col-xs-12">
								    <p>Mã đơn hàng: <b>#{{ $order[0]->code }}</b></p>
								    <p>Tên người nhận: <b>{{ $order[0]->customer->name }}</b></p>
								    <p>Số điện thoại: <b>{{ $order[0]->customer->phoneNumber }}</b></p>
								    <p>Địa chỉ: <b>{{ $order[0]->customer->address }}</b></p>
                                    <p>Tình trạng đơn hàng: {!! $orderService->status($order[0]->status) !!}</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <p>Phương thức thanh toán: <img style="width:50px" src="/storage/images/payment/{{ $order[0]->payment_method }}.png"></p>
                                    <p>Tổng tiền: <b>{{ number_format($order[0]->total_price) }}đ</b></p>
                                    <p>Ghi chú: <b>{{ $order[0]->note }}</b></p>
                                    <p>Thời gian tạo: <b>{{ $order[0]->created_at }}</b></p>
                                    <p>Tình trạng thanh toán: {!! $orderService->payment_status($order[0]->payment_status) !!}</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12" style="text-align: center">
                                    <img src="https://chart.googleapis.com/chart?chs=130x130&cht=qr&chl=http://{{ $_SERVER['HTTP_HOST'] }}/order/search/{{ $order[0]->code}}">
                                </div>
							</div>
							<div class="sidebox-order_text">
								<table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng </th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order[0]->orderDetails as $order_details)
                                        <tr>
                                            <td>{{ $order_details->product_name }}</td>
                                            <td>{{ number_format($order_details->price) }}đ</td>
                                            <td>{{ $order_details->quantity }}</td>
                                            <td>{{ number_format($order_details->total_price) }}đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>			
			</div>
            @else
            <h3 style="color:red; text-align:center">Đơn hàng không hợp lệ</h3>
            <h4 style="text-align:center;"><a href="/">Trở về trang chủ</a></h4>
            @endif
		</div>
	</div>
</div>
@endsection
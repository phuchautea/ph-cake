@extends('main')
@section('content')
<div class="layout-info-account">
    <div class="title-infor-account text-center">
        <h1>Tài khoản của bạn </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 sidebar-account">
                <div class="AccountSidebar">
                    <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                    <div class="AccountContent">
                        <div class="AccountList">
                            <ul class="list-unstyled">
                                <li class="current"><a href="/account">Thông tin tài khoản</a></li>
                                <li class="last"><a href="/account/logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="col-xs-12" id="customer_sidebar">
                        <p class="title-detail">Thông tin tài khoản</p>
                        <h2 class="name_account">Tên đăng nhập: {{ Auth::user()->name }} </h2>
                        <p class="email ">Địa chỉ email: {{ Auth::user()->email }}</p>
                    </div>
                    <div class="col-xs-12 customer-table-wrap" id="customer_orders">
                        <div class="customer_order customer-table-bg">
                            @if($orders->count() > 0)
							<p class="title-detail">
								Danh sách đơn hàng mới nhất
							</p>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="order_number text-center">Mã đơn hàng</th>
											<th class="date text-center">Ngày đặt</th>
											<th class="total text-right">Thành tiền</th>
											<th class="payment_status text-center">Thanh toán</th>
											<th class="fulfillment_status text-center">Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orders as $order)
										<tr class="odd ">
											<td class="text-center"><a href="/order/search/{{ $order->code }}" title="">#{{ $order->code }}</a></td>
											<td class="text-center"><span>{{ $order->created_at }}</span></td>
											<td class="text-right"><span class="total money">{{ number_format($order->total_price) }}đ</span></td>
											<td class="text-center">{!! $orderService->payment_status($order->payment_status) !!}</td>
											<td class="text-center">{!! $orderService->status($order->status) !!}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
                            @else
                            <p>Bạn chưa đặt mua sản phẩm.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
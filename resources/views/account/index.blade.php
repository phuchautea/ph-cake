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
                            <p>Bạn chưa đặt mua sản phẩm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
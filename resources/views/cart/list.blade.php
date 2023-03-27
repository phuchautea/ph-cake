@include('admin.alerts')
@php
    $productQuantity = 0;
    if (is_null(Session::get('carts')) == false) {
        foreach (Session::get('carts') as $product_id => $quantity) {
            $productQuantity += $quantity;
        }
    }
@endphp
Giỏ hàng: {{ $productQuantity }}
@if(count($products) > 0)
<form method="post" action="/updateCart">
    @csrf
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($products as $product)
                @php $total += $product->price * $carts[$product->id] @endphp
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}đ</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid" width="100px"></td>
                <td><input type="number" class="form-control" name="quantity[{{ $product->id }}]" value="{{ $carts[$product->id] }}"></td>
                <td>{{ number_format($product->price * $carts[$product->id]) }}đ</td>
                <td><a href="/carts/delete/{{ $product->id }}">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="/carts/delete/0" class="btn btn-danger">Xóa giỏ hàng</a>
    Thành tiền: {{ number_format($total) }}đ
</form>
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-header">Thông tin người nhận</div>
            <div class="card-body">
                <form method="POST" action="/order">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-2 control-label">Họ và tên</label>
                        <input type="text" class="form-control" name="name" id="name" value="Nguyễn Văn A">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số điện thoại</label>
                        <input type="number" class="form-control" name="phoneNumber" id="phoneNumber" value="0334455678">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" value="82/57 Đ.138 KP2 Q9 TPHCM">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ghi chú</label>
                        <textarea rows="5" class="form-control" name="note" id="note" value="Thêm hướng dẫn giao hàng hoặc gì đó về đơn hàng"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Phương thức thanh toán</label>
                        <div class="col-md-10">
                            <div class="custom-control custom-radio">
                                <input id="cash" name="payment" type="radio" class="custom-control-input" checked="" required="" value="cash">
                                <label class="custom-control-label" for="cash">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="momo" name="payment" type="radio" class="custom-control-input" required="" value="momo">
                                <label class="custom-control-label" for="momo">MoMo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="vnpay" name="payment" type="radio" class="custom-control-input" required="" value="vnpay">
                                <label class="custom-control-label" for="vnpay">VNPay</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@else
    Giỏ hàng trống
@endif

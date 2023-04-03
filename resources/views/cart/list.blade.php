@php
    $productQuantity = 0;
    if (is_null(Session::get('carts')) == false) {
        foreach (Session::get('carts') as $product_id => $quantity) {
            $productQuantity += $quantity;
        }
    }
@endphp

@extends('main')
@section('content')
    <div class="layoutPage-cart" id="layout-cart">
        <div class="breadcrumb-shop">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                        <ol class="breadcrumb breadcrumb-arrows">
                            <li>
                                <a href="/" target="_self"><span>Trang chủ</span></a>
                                <meta content="1">
                            </li>

                            <li class="active">
                                <span content="/cart"><span>Giỏ hàng ({{ $productQuantity }})</span></span>
                                <meta content="2">
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-cart-detail">
            <div class="container-fluid">
                <div class="heading-page">
                    <div class="header-page">
                        <h1>Giỏ hàng của bạn</h1>
                        <p class="count-cart">Có <span>{{ $productQuantity }} sản phẩm</span> trong giỏ hàng</p>
                    </div>
                </div>
                <div class="row wrapbox-content-cart">
                    @include('admin.alerts')

                    <div class="col-md-8 col-sm-8 col-xs-12 contentCart-detail">

                        <div class="cart-container">
                            @if(count($products) > 0)
                            <div class="cart-col-left">
                                <div class="main-content-cart">
                                    <form action="/updateCart" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table-cart">
                                                    <thead>
                                                        <tr>
                                                            <th class="image">&nbsp;</th>
                                                            <th class="item">Tên sản phẩm</th>
                                                            <th class="remove">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $total = 0; @endphp
                                                        @foreach ($products as $product)
                                                        @php $total += $product->price * $carts[$product->id] @endphp
                                                        <tr class="line-item-container" data-variant-id="{{ $product->id }}">
                                                            <td class="image">
                                                                <div class="product_image">
                                                                    <a href="/products/{{ $product->slug }}">
                                                                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                                                    </a>

                                                                </div>
                                                            </td>
                                                            <td class="item">
                                                                <h3><a href="/products/{{ $product->slug }}">{{ $product->name }}</a></h3>
                                                                <p>
                                                                    <span class="pri">{{ number_format($product->price) }}đ</span>
                                                                    {{-- <del>(150,000₫)</del> --}}
                                                                </p>
                                                                {{-- <p class="variant">
                                                                    <span class="variant_title">Đỏ</span>
                                                                </p> --}}
                                                                <div class="qty quantity-partent qty-click clearfix">
                                                                    <button type="button" class="qtyminus qty-btn">-</button>
                                                                    <input type="text" size="4" name="quantity[{{ $product->id }}]" min="1" id="quantity[{{ $product->id }}]" value="{{ $carts[$product->id] }}" class="tc line-item-qty item-quantity">
                                                                    <button type="button" class="qtyplus qty-btn">+</button>
                                                                </div>

                                                                <p class="price">
                                                                    <span class="text">Thành tiền:</span>
                                                                    <span class="line-item-total">{{ number_format($product->price * $carts[$product->id]) }}đ</span>
                                                                </p>

                                                            </td>
                                                            <td class="remove">
                                                                <a href="/carts/delete/{{ $product->id }}" class="cart">
                                                                    <img src="//theme.hstatic.net/1000300454/1000883469/14/ic_close.png?v=571"></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                                    <a href="/carts/delete/0" class="btn btn-danger">Xóa giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7 col-sm-12 col-xs-12 hidden-xs">
                                                <div class="sidebox-group sidebox-policy">
                                                    <h4>Chính sách mua hàng</h4>
                                                    <ul>
                                                        <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                                        <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                                        <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống</li>
                                                        <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="expanded-message">
                                <p class="cart-empty text-center" style="color:red">Giỏ hàng của bạn đang trống</p>
                            </div>
                            @endif
                        </div>

                        <!-- End cart -->
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 sidebarCart-sticky">
                        <div class="sidebox-order">
                            <div class="sidebox-order-inner">
                                <form action="/order" method="post">
                                    <div class="sidebox-order_title">
                                        <h3>Thông tin đơn hàng</h3>
                                    </div>
                                    <div class="sidebox-order_total">
                                        <p>Tổng tiền:
                                            <span class="total-price">
                                                @if(count($products) > 0)
                                                    {{ number_format($total) }}đ
                                                @else
                                                    0đ
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    @csrf
                                                    @if(!Auth::check())
                                                    Bạn đã có tài khoản? <a href="{{ Route("login") }}">Đăng nhập</a>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="control-label">Họ và tên</label>
                                                        <input type="text" required class="form-control" name="name" id="name" value="@if(Auth::check()){{ Auth::user()->name }}@endif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="email" required class="form-control" name="email" id="email" value="@if(Auth::check()){{ Auth::user()->email }}@endif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Số điện thoại</label>
                                                        <input type="number" required class="form-control" name="phoneNumber" id="phoneNumber" value="@if(Auth::check()){{ Auth::user()->phone }}@endif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Địa chỉ</label>
                                                        <input type="text" required class="form-control" name="address" id="address" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Ghi chú</label>
                                                        <textarea rows="5" class="form-control" name="note" id="note" value="Thêm hướng dẫn giao hàng hoặc gì đó về đơn hàng"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Phương thức thanh toán</label>
                                                        <div class="col-md-10">
                                                            <div class="custom-control custom-radio">
                                                                <input id="cash" name="payment" type="radio" class="custom-control-input" required="" value="cash">
                                                                <label class="custom-control-label" for="cash"><img style="width:30px" src="/storage/images/payment/cash.png"> Tiền mặt</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input id="momo" name="payment" type="radio" class="custom-control-input" checked="" required="" value="momo">
                                                                <label class="custom-control-label" for="momo"><img style="width:30px" src="/storage/images/payment/momo.png"> MoMo</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input id="vnpay" name="payment" type="radio" class="custom-control-input" required="" value="vnpay">
                                                                <label class="custom-control-label" for="vnpay"><img style="width:30px" src="/storage/images/payment/vnpay.png"> VNPay</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="sidebox-order_text">
                                        <p>Phí vận chuyển sẽ được tính ở trang thanh toán.<br>
                                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                                    </div> --}}
                                    <div class="sidebox-order_action">
                                        <button type="submit" class="button dark btn-block">ĐẶT HÀNG</button>
                                        <p class="link-continue text-center">
                                            <a href="/collections/all">
                                                <i class="fa fa-reply"></i> Tiếp tục mua hàng
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function log(args) {
            var str = "";
            for (var i = 0; i < arguments.length; i++) {
                if (typeof arguments[i] === "object") {
                    str += JSON.stringify(arguments[i]);
                } else {
                    str += arguments[i];
                }
            }
            return str;
        }

        function addCommas(str) {
            var parts = (str + "").split("."),
                main = parts[0],
                len = main.length,
                output = "",
                i = len - 1;

            while (i >= 0) {
                output = main.charAt(i) + output;
                if ((len - i) % 3 === 0 && i > 0) {
                    output = "," + output;
                }
                --i;
            }
            // put decimal part back
            if (parts.length > 1) {
                output += "," + parts[1];
            }
            return output;
        };
        (function($, window, document, undefined) {
            var pluginName = 'hrvAJAXCart',
                defaults = {
                    propertyName: "value"
                };

            function Plugin(element, options) {
                this.element = element;
                this.options = $.extend({}, defaults, options);
                this._defaults = defaults;
                this._name = 'hrvAJAXCart';
                this.init();
            }
            Plugin.prototype = {
                init: function() {
                    var item = this.options.item,
                        item_total = this.options.item_total,
                        item_qty = this.options.item_qty,
                        subtotal = $(this.options.subtotal);

                    // Change line item quantity
                    $(item_qty).change(function() {
                        var qty = $(this).val(),
                            this_item = $(this).closest(item),
                            variant_id = this_item.data('variant-id'),
                            this_item_total = this_item.find(item_total);
                        $.ajax({
                            type: 'POST',
                            url: '/cart/change.js',
                            dataType: 'json',
                            data: {
                                quantity: qty,
                                id: variant_id
                            },
                            success: function(cart) {
                                if (qty == 0) {
                                    this_item.remove();
                                } else {
                                    $.each(cart.items, function(index, row) {
                                        var price = parseFloat(row.line_price / 100).toFixed(2);
                                        var currency = Number(price.replace(/[^0-9\.-]+/g, ""));
                                        if (variant_id == row.variant_id) this_item_total.html(log(addCommas(currency)) + ' đ');
                                    });
                                }
                                var sub_price = parseFloat(cart.total_price / 100).toFixed(2);
                                sub_price = Number(sub_price.replace(/[^0-9\.-]+/g, ""));
                                subtotal.html(log(addCommas(sub_price)) + ' đ');
                            },
                            error: function(response) {
                                alert(response);
                            }
                        });
                    });

                    // Remove line item
                    $(this.options.item_remove).click(function(e) {
                        e.preventDefault();
                        $(this).closest(item).find(item_qty).val(0);
                        $(this).closest(item).find(item_qty).trigger('change');
                    });
                }
            };
            $.fn.hrvAJAXCart = function(options) {
                return this.each(function() {
                    if (!$.data(this, "plugin_" + pluginName)) {
                        $.data(this, "plugin_" + pluginName, new Plugin(this, options));
                    }
                });
            };
        })(jQuery, window, document);
        /* Social */
        $(document).ready(function() {
            var href = window.location.href;
            if (href.indexOf("?add=") != -1) {
                var splitHref = href.split("?add=")[1];
                var variantId = parseInt($.trim(splitHref.split("&ref=")[0]));
                $.ajax({
                    url: "/cart/" + variantId + ":1",
                    success: function(data) {
                        window.location = '/cart';
                    }
                });
            }
            $('.btncart-checkout').click(function(e) {
                e.preventDefault();
                $('button[name="checkout"]').trigger('click');
            });

        });
        /*==== END SOCIAL ==========================================*/
    </script>
    <script>
        function unPromote(tmp) {
            var self = this;
            tmp += "&note=" + $('#note').val();
            $.post('/cart', tmp).always(function() {
                setTimeout(function() {
                    location.reload();
                }, 500);
            });
        }
        //debugger;
        console.log("");

        $(document).on('click', '.qty-click .qtyplus', function(e) {
            e.preventDefault();
            var input = $(this).parent('.quantity-partent').find('input');
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                input.val(currentVal + 1);
            } else {
                input.val(1);
            }
            Update_price_change();
        });
        $(document).on('click', ".qty-click .qtyminus", function(e) {
            e.preventDefault();
            var input = $(this).parent('.quantity-partent').find('input');
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                input.val(currentVal - 1);
            } else {
                input.val(1);
            }
            Update_price_change();
        });

        function Update_price_change() {
            var params = {
                type: 'POST',
                url: '/cart/update.js',
                data: $('#cartformpage').serialize(),
                async: false,
                dataType: 'json',
                success: function(data) {
                    $.each(data.items, function(i, v) {
                    });
                    $('.count-cart').html('Có ' + '<span>' + data.item_count + ' sản phẩm </span>' + 'trong giỏ hàng');
                    $('.icon-cart .count').html(data.item_count);
                },
                error: function(XMLHttpRequest, textStatus) {
                    Haravan.onError(XMLHttpRequest, textStatus);
                }
            };
            jQuery.ajax(params);
        }
    </script>
@endsection
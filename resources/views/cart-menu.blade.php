@php
    $productQuantity = 0;
    if (is_null($carts) == false) {
        foreach ($carts as $product_id => $quantity) {
            $productQuantity += $quantity;
        }
    }
@endphp
            <div class="header-action header-action_cart">
                <div class="header-action_text">
                    <a class="header-action__link header-action-toggle" href="javascript:void(0)" id="site-cart-handle" aria-label="Giỏ hàng" title="Giỏ hàng">
                        <span class="box-icon">
                            <svg version="1.1" class="svg-ico-cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                <g>
                                    <path d="M0,6v21h24V6H0z M22,25H2V8h20V25z" />
                                </g>
                                <g>
                                    <path d="M12,2c3,0,3,2.3,3,4h2c0-2.8-1-6-5-6S7,3.2,7,6h2C9,4.3,9,2,12,2z" />
                                </g>
                            </svg>
                            <span class="box-icon--close">
                                <svg viewBox="0 0 19 19" role="presentation">
                                    <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill="currentColor" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="count-holder">
                                <span class="count">{{ $productQuantity }}</span>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="header-action_dropdown">
                    <span class="box-triangle">
                        <svg viewBox="0 0 20 9" role="presentation">
                            <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                        </svg>
                    </span>
                    <div class="header-dropdown_content">
                        <div class="site-cart">
                            <div class="cart-ttbold">
                                <p class="ttbold">Giỏ hàng</p>
                            </div>
                            @if($productCarts != null && $productCarts->count() > 0)
                            <div class="cart-view clearfix">
                                <div class="cart-view-scroll">
                                    <table id="cart-view">
                                        <tbody>
                                            @php $totalPrice = 0; @endphp
                                            @foreach ($productCarts as $product)
                                            @php $totalPrice += $product->price * $carts[$product->id]; @endphp            
                                            <tr class="item_2">
                                                <td class="img"><a href="/products/{{ $product->slug }}" title="/products/{{ $product->slug }}"><img src="{{ $product->image }}" alt="{{ $product->name }}"></a></td>
                                                <td>
                                                    <p class="pro-title">
                                                        <a class="pro-title-view" href="/products/{{ $product->slug }}" title="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                                    </p>
                                                    <div class="mini-cart_quantity">
                                                        <div class="pro-quantity-view"><span class="qty-value">{{ $carts[$product->id] }}</span></div>
                                                        <div class="pro-price-view">{{ number_format($product->price) }}đ</div>
                                                    </div>
                                                    <div class="remove_link remove-cart">
                                                        <a href="/carts/delete/{{ $product->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                                <g>
                                                                    <path d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z"></path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="line"></div>
                                <div class="cart-view-total">
                                    <table class="table-total">
                                        <tbody>
                                            <tr>
                                                <td class="text-left">TỔNG TIỀN:</td>
                                                <td class="text-right" id="total-view-cart">{{ number_format($totalPrice) }}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><a href="/carts" class="linktocart button dark">Xem giỏ hàng & Thanh toán</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @else
                            <div class="cart-view clearfix">
                                <div class="cart-view-scroll">
                                    <table id="clone-item-cart" class="table-clone-cart">
                                        <tr class="item_2 hidden">
                                            <td class="img"><a href="" title=""><img src="" alt="" /></a></td>
                                            <td>
                                                <p class="pro-title">
                                                    <a class="pro-title-view" href="" title=""></a>
                                                    <span class="variant"></span>
                                                </p>
                                                <div class="mini-cart_quantity">
                                                    <div class="pro-quantity-view"><span class="qty-value"></span></div>
                                                    <div class="pro-price-view"></div>
                                                </div>
                                                <div class="remove_link remove-cart"></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table id="cart-view">
                                        <tr class="item-cart_empty">
                                            <td>
                                                <div class="svgico-mini-cart">
                                                    <svg width="81" height="70" viewBox="0 0 81 70">
                                                        <g transform="translate(0 2)" stroke-width="4" stroke="#1e2d7d" fill="none" fill-rule="evenodd">
                                                            <circle stroke-linecap="square" cx="34" cy="60" r="6"></circle>
                                                            <circle stroke-linecap="square" cx="67" cy="60" r="6"></circle>
                                                            <path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                Hiện chưa có sản phẩm
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="line"></div>
                                <div class="cart-view-total">
                                    <table class="table-total">
                                        <tr>
                                            <td class="text-left">TỔNG TIỀN:</td>
                                            <td class="text-right" id="total-view-cart">0₫</td>
                                        </tr>
                                        <tr>
                                            <tr>
                                                <td colspan="2"><a href="/carts" class="linktocart button dark">Xem giỏ hàng & Thanh toán</a></td>
                                            </tr>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
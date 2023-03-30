{{-- Chi tiết sản phẩm: {{ $product->slug }}<hr>
Tên: {{ $product->name }} <br>
Giá: {{ number_format($product->price) }}đ <br>
Mô tả: {{ $product->description }} <br>
<img src="{{ $product->image }}" class="img-fluid" width="100px"> <br>
<form method="post" action="/addToCart">
    <input class="form-control" type="number" min="1" value="1" name="quantity">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
    @csrf
</form> --}}
@extends('main')
@section('content')
@php $category = \App\Models\Category::find($product->category_id); @endphp
<div id="product" class="productDetail-page">
    <div class="breadcrumb-shop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li>
                            <a href="/" target="_self">
                                <span>Trang chủ</span>
                            </a>
                            <meta content="1">
                        </li>
                        <li>
                            <a href="/collections/{{ $category->slug }}" target="_self">
                                <span>{{ $category->name }}</span>
                            </a>
                            <meta content="2">
                        </li>

                        <li class="active">
                            <span content="/products/{{ $product->slug }}">
                                <span>{{ $product->name }}</span>
                            </span>
                            <meta content="3">
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="product-detail-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row product-detail-main pr_style_03">
                        <div class="col-md-5 col-sm-12 col-xs-12 product-content-img">


                            <div class="product-gallery">
                                <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                                    <div class="product-gallery__thumbs thumb-fix">

                                        <div class="product-gallery__thumb active">
                                            <a class="product-gallery__thumb-placeholder" href="javascript:" data-image="{{ $product->image }}" data-zoom-image="{{ $product->image }}">
                                                <img alt="{{ $product->name }}" data-image="{{ $product->image }}" src="{{ $product->image }}" style="width:30%">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="product-image-detail box__product-gallery scroll">
                                    <ul id="sliderproduct" class="site-box-content slide_product clearfix hidden-lg hidden-md">

                                        <li class="product-gallery-item gallery-item current">
                                            <img class="product-image-feature" src="{{ $product->image }}" alt="{{ $product->name }}">
                                        </li>

                                    </ul>
                                    <div class="hidden-sm hidden-xs">
                                        <img class="product-image-feature" src="{{ $product->image }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-image__button">
                                        <div id="product-zoom-in" class="product-zoom icon-pr-fix " aria-label="Zoom in" title="Zoom in">
                                            <span class="zoom-in" aria-hidden="true">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width: 30px; height: 30px;" xml:space="preserve">
                                                    <polyline points="6,14 9,11 14,16 16,14 11,9 14,6 6,6 "></polyline>
                                                    <polyline points="22,6 25,9 20,14 22,16 27,11 30,14 30,6 "></polyline>
                                                    <polyline points="30,22 27,25 22,20 20,22 25,27 22,30 30,30 "></polyline>
                                                    <polyline points="14,30 11,27 16,22 14,20 9,25 6,22 6,30 "></polyline>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="gallery-index icon-pr-fix"><span class="current">1</span> / <span class="total">1</span></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
                            <div class="product-title">
                                <h1>{{ $product->name }}</h1>


                            </div>
                            <div class="product-price" id="price-preview">


                                <span class="pro-price">{{ number_format($product->price) }}đ</span>


                            </div>

                            <form id="add-item-form" action="/addToCart" method="post" class="variants clearfix">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="select clearfix" style="display:none">
                                    <select id="product-select" name="id" style="display:none;">

                                        <option value="1100378778">Default Title - 220,000₫</option>

                                    </select>
                                </div>
                                <div class="select-swatch clearfix">

                                </div>
                                <div class="selector-actions">

                                    <div class="quantity-area clearfix">
                                        <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                                        <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                                        <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                                    </div>
                                    <div class="wrap-addcart clearfix">
                                        <button type="submit" class="add-to-cartProduct button dark btn-addtocart addtocart-modal">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>


                                {{-- <div class="product-action-bottom visible-xs">
                                    <div class="input-bottom">
                                        <input id="quan-input" type="number" value="1" min="1">
                                    </div>
                                    <button type="button" id="add-to-cartbottom" class=" add-to-cartProduct add-cart-bottom button dark addtocart-modal" name="add">
                                        Thêm vào giỏ
                                    </button>
                                </div> --}}
                            </form>
                            <div class="product-description">
                                <div class="title-bl">
                                    <h2>Mô tả</h2>
                                </div>
                                <div class="description-content">
                                    <div class="description-productdetail">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-productRelated clearfix">
                        <div class="heading-title text-center">
                            <h2>Sản phẩm liên quan</h2>
                        </div>
                        <div class="content-product-list row">
                            @foreach($related_products as $related_product)
                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">
                                <div class="product-block product-resize ">
                                    <div class="product-img ">
                                        <a href="/product/{{ $related_product->slug }}" title="{{ $related_product->name }}" class="image-resize ratiobox">
                                            <picture>
                                                <img class="lazyload img-loop" data-sizes="auto" data-src="//product.hstatic.net/200000449489/product/11.19a_80d790b93b7a4b7b8b986f08b0df1660_grande.jpg" data-lowsrc="//product.hstatic.net/200000449489/product/11.19a_80d790b93b7a4b7b8b986f08b0df1660_grande.jpg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Bánh 12 con giáp - bánh kem sinh nhật Đà nẵng " />
                                            </picture>
                                            <picture>
                                                <img class="img-loop img-hover lazyload" data-src="//product.hstatic.net/200000449489/product/1.1_f9a06a4e5a8449d889402ef45f6bb010_grande.jpg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Bánh 12 con giáp - bánh kem sinh nhật Đà nẵng " />
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1084131641')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">{{ number_format($related_product->price) }}₫</span>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/product/{{ $related_product->slug }}" title="Bánh 12 con giáp">
                                                    {{ $related_product->name }}
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>{{ number_format($related_product->price) }}₫</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            {{-- <div class="col-md-4 col-sm-6 col-xs-6 pro-loop  pro-loop-lastHide ">
                                <div class="product-block product-resize fixheight" style="height: 253px;">
                                    <div class="product-img ">
                                        <a href="/products/banh-kem-size-54" title="Bánh kem size 14" class="image-resize ratiobox" style="height: 210px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_medium.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_large.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_grande.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <img class="lazyload img-loop" data-sizes="auto" data-src="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_grande.jpg" data-lowsrc="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_grande.jpg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Bánh kem size 14 ">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_medium.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_large.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_grande.jpg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                <img class="img-loop img-hover lazyload" data-src="//product.hstatic.net/200000449489/product/66_358585cfc5f34c13a18ad2836b4324f3_grande.jpg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Bánh kem size 14 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1100388884')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">200,000₫</span>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/banh-kem-size-54" title="Bánh kem size 14">
                                                    Bánh kem size 14
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>200,000₫</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="divzoom">
    <div class="divzoom_main">
        <div class="product-thumb text-center">
            <img class="product-image-feature" src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
    </div>
    <div id="positionButtonDiv" class="hidden">
        <p>
            <span>
                <button type="button" class="buttonZoomIn"><i></i></button>
                <button type="button" class="buttonZoomOut"><i></i></button>
            </span>
        </p>
    </div>
    <button id="closedivZoom"><i></i></button>
</div>
<script>
    $(document).ready(function() {
        $('#add-to-cart').click(function(e) {
            e.preventDefault();
            $(this).addClass('clicked_buy');
            add_item_show_modalCart($('#product-select').val());
            //getCartModal();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#add-to-cartbottom').click(function() {
            $('#add-to-cart').trigger('click');
        });
        $('#quan-input').keyup(function() {
            $('[name="quantity"]').val($(this).val());
        })
        $('[name="quantity"]').on('keyup change', function() {
            $('#quan-input').val($(this).val());
        })
    });
    $(document).on("click", "#product-zoom-in", function() {
        //	var indexThumb = $(this).index();
        $("body").addClass("open_layer");
        $("#divzoom").css({
            'opcaity': 0,
            'visibility': 'hidden'
        }).show();
        $('.divzoom_main').flickity({
            resize: true,
            draggable: true,
        });
        if ($(window).width() > 768) {
            var ncurrent = parseInt($(".gallery-index .current").html()) - 1;
        } else {
            var ncurrent = parseInt($(".product-gallery-item.is-selected").index());
        }
        $('.divzoom_main').flickity('select', ncurrent);
        setTimeout(function() {
            $("#divzoom").css({
                'opcaity': 1,
                'visibility': 'visible'
            })
        }, 50);
    });
    $(document).on('click', '#closedivZoom', function(event) {
        $("#divzoom").hide();
        $("body").removeClass("open_layer");
        $('.divzoom_main').flickity('select', 0);
        //$('.divzoom_main').slick('unslick');
    });
</script>
<script>
    $(".product-gallery__thumb img").click(function() {
        $(".product-gallery__thumb").removeClass('active');
        $(this).parents('.product-gallery__thumb').addClass('active');
        var img_thumb = $(this).data('image');
        var total_index = $(this).parents('.product-gallery__thumb').index() + 1;
        $(".gallery-index .current").html(total_index);

        $(".product-image-detail .product-image-feature").attr("src", $(this).attr("data-image"));


    });
    $(".product-gallery__thumb").first().addClass('active');
    var check_variant = true;
    var fIndex = false;
    var selectCallback = function(variant, selector) {
        if (variant && variant.available) {
            if (variant.featured_image != null) {
                if ($(window).width() > 991) {

                    $(".product-gallery__thumb a img[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https:', '') + "']").click().parents('.product-gallery__thumb').addClass('active');

                } else {
                    setTimeout(function() {
                        var indexVariant = $(".product-gallery-item img[src='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https:', '') + "']").parent().index();
                        $("#sliderproduct").flickity('select', indexVariant);
                    }, 500);
                }

            }
            if (variant.sku != null) {
                jQuery('#pro_sku').html('SKU: ' + variant.sku);
            }
            jQuery('#detail-product .add-to-cartProduct').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");


            jQuery('#detail-product #buy-now').removeAttr('disabled').removeClass('disabled').html("Mua ngay").show();
            jQuery('#detail-product .pro-soldold').addClass('hidden')
            if (variant.price > 0) {
                if (variant.price < variant.compare_at_price) {
                    var pro_sold = variant.price;
                    var pro_comp = variant.compare_at_price / 100;
                    var sale = 100 - (pro_sold / pro_comp);
                    var kq_sale = Math.round(sale);
                    var html = '<span class="pro-sale">-' + kq_sale + '%</span>';
                    jQuery('#detail-product #price-preview').html(html);
                    jQuery('#detail-product .price-fixed-mb').html(html);
                } else {
                }
            } else {
                jQuery('#detail-product #price-preview').html("<span class='pro-price'>Liên hệ</span>");
                jQuery('#detail-product .price-fixed-mb').html("<span class='pro-price'>Liên hệ</span>");
            }
            check_variant = true;
        } else {
            jQuery('#detail-product .add-to-cartProduct').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng");

            jQuery('#detail-product #buy-now').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng").hide();
            var message = variant ? "Hết hàng" : "Không có hàng";
            jQuery('#detail-product .pro-soldold').removeClass('hidden')
            jQuery('#detail-product .pro-soldold').text(message);
            check_variant = false;
        }
        return check_variant;
    };
    jQuery(document).ready(function($) {


    });
</script>
<script>
    var swatch_size = parseInt($('#add-item-form .select-swatch').children().size());
    jQuery(document).on('click', '#add-item-form .swatch input', function(e) {
        e.preventDefault();
        var $this = $(this);
        var _available = '';
        $this.parent().siblings().find('label').removeClass('sd');
        $this.next().addClass('sd');
        var name = $this.attr('name');
        var value = $this.val();
        $('#add-item-form select[data-option=' + name + ']').val(value).trigger('change');
        if (swatch_size == 2) {
            if (name.indexOf('1') != -1) {
                $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                $('#add-item-form .selector-wrapper .single-option-selector').eq(1).find('option').each(function() {
                    var _tam = $(this).val();
                    $(this).parent().val(_tam).trigger('change');
                    if (check_variant) {
                        if (_available == '') {
                            _available = _tam;
                        }
                    } else {
                        $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                        $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                    }
                })
                $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val(_available).trigger('change');
                $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
            }
        } else if (swatch_size == 3) {
            var _count_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').size();
            var _count_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').size();
            if (name.indexOf('1') != -1) {
                $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                var _avi_op1 = '';
                var _avi_op2 = '';
                $('#add-item-form #variant-swatch-1 .swatch-element').each(function(ind, value) {
                    var _key = $(this).data('value');
                    var _unavi = 0;
                    $('#add-item-form .single-option-selector').eq(1).val(_key).change();
                    $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-2 .swatch-element').each(function(i, v) {
                        var _val = $(this).data('value');
                        $('#add-item-form .single-option-selector').eq(2).val(_val).change();
                        if (check_variant == true) {
                            if (_avi_op1 == '') {
                                _avi_op1 = _key;
                            }
                            if (_avi_op2 == '') {
                                _avi_op2 = _val;
                            }
                            //console.log(_avi_op1 + ' -- ' + _avi_op2)
                        } else {
                            _unavi += 1;
                        }
                    })
                    if (_unavi == _count_op3) {
                        $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"]').addClass('soldout');
                        setTimeout(function() {
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"] input').attr('disabled', 'disabled');
                        })
                    }
                })
                $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _avi_op1 + '"] input').click();
            } else if (name.indexOf('2') != -1) {
                $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                $('#add-item-form .selector-wrapper .single-option-selector').eq(2).find('option').each(function() {
                    var _tam = $(this).val();
                    $(this).parent().val(_tam).trigger('change');
                    if (check_variant) {
                        if (_available == '') {
                            _available = _tam;
                        }
                    } else {
                        $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                        $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                    }
                })
                $('#add-item-form .selector-wrapper .single-option-selector').eq(2).val(_available).trigger('change');
                $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
            }
        } else {

        }
    })
    $(document).ready(function() {
        var _chage = '';
        $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(0).val() + '"]').find('input').click();
        $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val() + '"]').find('input').click();
        if (swatch_size == 2) {
            var _avi_op1 = '';
            var _avi_op2 = '';
            var _count = $('#add-item-form #variant-swatch-1 .swatch-element').size();
            $('#add-item-form #variant-swatch-0 .swatch-element').each(function(ind, value) {
                var _key = $(this).data('value');
                var _unavi = 0;
                $('#add-item-form .single-option-selector').eq(0).val(_key).change();
                $('#add-item-form #variant-swatch-1 .swatch-element').each(function(i, v) {
                    var _val = $(this).data('value');
                    $('#add-item-form .single-option-selector').eq(1).val(_val).change();
                    if (check_variant == true) {
                        if (_avi_op1 == '') {
                            _avi_op1 = _key;
                        }
                        if (_avi_op2 == '') {
                            _avi_op2 = _val;
                        }
                    } else {
                        _unavi += 1;
                    }
                })
                if (_unavi == _count) {
                    $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key + '"]').addClass('soldout');
                    $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key + '"]').find('input').attr('disabled', 'disabled');
                }
            })
            $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _avi_op2 + '"] input').click();
            $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
        } else if (swatch_size == 3) {
            var _avi_op1 = '';
            var _avi_op2 = '';
            var _avi_op3 = '';
            var _size_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').size();
            var _size_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').size();

            $('#add-item-form #variant-swatch-0 .swatch-element').each(function(ind, value) {
                var _key_va1 = $(this).data('value');
                var _count_unavi = 0;
                $('#add-item-form .single-option-selector').eq(0).val(_key_va1).change();
                $('#add-item-form #variant-swatch-1 .swatch-element').each(function(i, v) {
                    var _key_va2 = $(this).data('value');
                    var _unavi_2 = 0;
                    $('#add-item-form .single-option-selector').eq(1).val(_key_va2).change();
                    $('#add-item-form #variant-swatch-2 .swatch-element').each(function(j, z) {
                        var _key_va3 = $(this).data('value');
                        $('#add-item-form .single-option-selector').eq(2).val(_key_va3).change();
                        if (check_variant == true) {
                            if (_avi_op1 == '') {
                                _avi_op1 = _key_va1;
                            }
                            if (_avi_op2 == '') {
                                _avi_op2 = _key_va2;
                            }
                            if (_avi_op3 == '') {
                                _avi_op3 = _key_va3;
                            }
                        } else {
                            _unavi_2 += 1;
                        }
                    })
                    if (_unavi_2 == _size_op3) {
                        _count_unavi += 1;
                    }
                })
                if (_size_op2 == _count_unavi) {
                    $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key_va1 + '"]').addClass('soldout');
                    $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key_va1 + '"]').find('input').attr('disabled', 'disabled');
                }
            })
            $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
        }
    });
    $(document).ready(function() {
        var vl = $('#add-item-form .swatch .color input').val();
        $('#add-item-form .swatch .color input').parents(".swatch").find(".header span").html(vl);
        $("#add-item-form .select-swap .color").hover(function() {
            var value = $(this).data("value");
            $(this).parents(".swatch").find(".header span").html(value);
        }, function() {
            var value = $("#add-item-form .select-swap .color label.sd span").html();
            $(this).parents(".swatch").find(".header span").html(value);
        });
    });
</script>
@endsection
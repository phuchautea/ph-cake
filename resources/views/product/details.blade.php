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
                            <span content="/product/{{ $product->slug }}">
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
                    <div class="row product-detail-main pr_style_03">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#rates" aria-expanded="true">Đánh giá sản phẩm</a></li>
                                <li class=""><a data-toggle="tab" href="#comments" aria-expanded="false">Nhận xét sản phẩm</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="rates" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: 10px;">
                                            <h3>Viết đánh giá mới</h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form action="/review/store" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="star-rating">
                                                                <div class="star active" data-value="1"><i class="fa fa-star"></i></div>
                                                                <div class="star active" data-value="2"><i class="fa fa-star"></i></div>
                                                                <div class="star active" data-value="3"><i class="fa fa-star"></i></div>
                                                                <div class="star active" data-value="4"><i class="fa fa-star"></i></div>
                                                                <div class="star active" data-value="5"><i class="fa fa-star"></i></div>
                                                            </div>
                                                            <input type="hidden" id="rating" name="rating" value="5">
                                                            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                            <div class="form-group">
                                                                <label>Tiêu đề</label>
                                                                <input type="text" class="form-control" id="title" name="title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nội dung</label>
                                                                <textarea rows="5" class="form-control" id="content" name="content"></textarea>
                                                            </div>
                                                            <button type="submit" class="button dark btn-block">Gửi đánh giá</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="media comment">
                                                        @foreach($reviews as $review)
                                                        <div class="row">
                                                            <div class="col-sm-2" style="text-align:center">
                                                            <img src="/template/admin/images/avatar.png" class="mr-3 rounded-circle" alt="Avatar">
                                                            </div>
                                                            <div class="col-sm-10">
                                                            <div class="media-body">
                                                                <h4 class="mt-0"><b>{{ $review->user->name }}</b></h4>
                                                                <div class="rating">
                                                                    @php
                                                                        for($i = 1; $i <= 5; $i++){
                                                                            if($i <= (int)$review->rating){
                                                                                echo '<span class="fa fa-star checked"></span>';
                                                                            }else{
                                                                                echo '<span class="fa fa-star"></span>';
                                                                            }
                                                                        }
                                                                    @endphp
                                                                </div>
                                                                <h6 class="mb-0"><b>{{ $review->title }}</b></h6>
                                                                
                                                                <p>{{ $review->content }}</p>
                                                                <p class="mt-0 text-muted">{{ $review->created_at }}</p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            $('.star-rating .star').click(function() {
                                                var rating = $(this).data('value');
                                                $('input[name=rating]').val(rating);
                                                $(this).addClass('active').prevAll('.star').addClass('active');
                                                $(this).nextAll('.star').removeClass('active');
                                            });
                                        </script>
                                        <style>
                                            .comment {
                                                margin-bottom: 20px;
                                                border: 1px solid #ccc;
                                                padding: 20px;

                                                overflow-y: scroll;
                                                min-height: 100px;
                                                max-height: 500px;
                                                width: 100%;
                                            }
                                            .comment img {
                                                width: 64px;
                                                height: 64px;
                                            }
                                            .comment h5 {
                                                margin-top: 0;
                                            }
                                            /* .comment .rating {
                                                color: orange;
                                            } */
                                            .checked {
                                                color: orange;
                                            }
                                            
                                            .fb-comments {
                                                overflow-y: scroll;
                                                height: 500px;
                                                width: 100%;
                                            }

                                            .star-rating {
                                                display: flex;
                                                justify-content: center;
                                            }

                                            .star {
                                                margin-top: 10px;
                                                font-size: 20px;
                                                margin-right: 5px;
                                            }

                                            div.star.active i {
                                                color: gold;
                                            }
                                        </style>
                                    </div>
                                </div>
                                <div id="comments" class="tab-pane fade">
                                    <div class="col-md-12" style="text-align:center">
                                        <div class="fb-comments" data-href="{{ url('/product/'.$product->slug) }}" data-width="1000" data-numposts="3"></div>
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
                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize ">
                                    <div class="product-img ">
                                        <a href="/product/{{ $related_product->slug }}" title="{{ $related_product->name }}" class="image-resize ratiobox">
                                            <picture>
                                                <img class="lazyload img-loop" data-sizes="auto" data-src="{{ $related_product->image }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" />
                                            </picture>
                                            <picture>
                                                <img class="img-loop img-hover lazyload" data-src="{{ $related_product->image }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" />
                                            </picture>
                                        </a>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">{{ number_format($related_product->price) }}₫</span>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/product/{{ $related_product->slug }}">
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
@endsection
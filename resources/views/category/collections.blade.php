@foreach ($products as $product)
    Tên sp: <a href="/product/{{ $product->slug }}">{{ $product->name}}</a> - Giá {{ number_format($product->price) }} <br>
@endforeach

@extends('main')
@section('content')
<div id="collection" class="collection-page">
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
                            <a href="/collections" target="_self">
                                <span>Danh mục</span>
                            </a>
                            <meta content="2">
                        </li>

                        <li class="active">
                            <span content="/collections/banh-be-trai">
                                <span>Bánh bé trai</span>
                            </span>
                            <meta content="3">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content ">
        <div class="container-fluid">
            <div class="row">
                <div id="collection-body" class="wrap-collection-body clearfix">

                    <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
                        <div class="wrap-filter">
                            <div class="box_sidebar">
                                <div class="block left-module">
                                    <div class=" filter_xs">
                                        <div class="layered">

                                            <p class="title_block visible-sm visible-xs">
                                                Bộ lọc sản phẩm
                                                <span><i class="fa fa-angle-down"></i></span>
                                            </p>
                                            <div class="block_content">
                                                <!-- ./filter brand -->

                                                <!-- ./collection-links -->
                                                <div class="group-filter" aria-expanded="true">
                                                    <div class="layered_subtitle dropdown-filter"><span>Danh mục sản phẩm</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                                    <div class="layered-content bl-filter filter-price">
                                                        <ul class="check-box-list">

                                                            <li><a href="/collections/banh-mini">Bánh mini</a></li>

                                                            <li><a href="/collections/banh-mung-tho-ong-ba">Bánh mừng thọ ông bà</a></li>

                                                            <li><a href="/collections/banh-kem-san-moi-ngay">Bánh sẵn mỗi ngày</a></li>

                                                            <li><a href="/collections/banh-ngot-moi-ngay">Bánh ngọt mỗi ngày</a></li>

                                                            <li><a href="/collections/set-banh-su">Set bánh su</a></li>

                                                            <li><a href="/collections/banh-mousse-dua">Mousse dừa</a></li>

                                                            <li><a href="/collections/mix-vi">Mix Vị</a></li>

                                                            <li><a href="/collections/tiramisu">Tiramisu</a></li>

                                                            <li><a href="/collections/red-velvet">Red velvet</a></li>

                                                            <li><a href="/collections/cheese-chanh-day">Cheese Chanh dây</a></li>

                                                            <li><a href="/collections/basque-burnt-cheesecake">Basque Burnt Cheesecake</a></li>

                                                            <li><a href="/collections/banh-hu-vang-khai-truong">Bánh hũ vàng &amp; khai trương</a></li>

                                                            <li><a href="/collections/banh-tao-hinh">Bánh nặn tạo hình</a></li>

                                                            <li><a href="/collections/banh-mau-tim">Bánh mẫu tim</a></li>

                                                            <li><a href="/collections/banh-18">Bánh 18+</a></li>

                                                            <li><a href="/collections/banh-doc-la">Bánh chủ đề theo yêu cầu</a></li>

                                                            <li><a href="/collections/banh-chu-so">Bánh chữ &amp; số</a></li>

                                                            <li><a href="/collections/banh-cuoi">Bánh cưới</a></li>

                                                            <li><a href="/collections/banh-hoa">Bánh hoa</a></li>

                                                            <li><a href="/collections/banh-trai-cay">Bánh trái cây</a></li>

                                                            <li><a href="/collections/banh-bup-be">Bánh búp bê</a></li>

                                                            <li><a href="/collections/banh-may-bay-o-to-sieu-nhan">Bánh máy bay, ô tô, siêu nhân</a></li>

                                                            <li><a href="/collections/banh-12-con-giap">Bánh 12 con giáp</a></li>

                                                            <li><a href="/collections/banh-logo-cong-ty">Bánh logo &amp; công ty</a></li>

                                                            <li><a href="/collections/banh-ve">Bánh vẽ</a></li>

                                                            <li><a href="/collections/banh-be-gai">Bánh bé gái</a></li>

                                                            <li><a href="/collections/banh-be-trai">Bánh bé trai</a></li>

                                                            <li><a href="/collections/cupcake">Cupcake</a></li>

                                                            <li><a href="/collections/bong-lan-trung-muoi">Bông lan trứng muối</a></li>

                                                            <li><a href="/collections/banh-ngot-do-uong">Bánh Ngọt &amp; Đồ Uống</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- ./filter price -->

                                                <div class="group-filter" aria-expanded="true">
                                                    <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                                    <div class="layered-content bl-filter filter-price">
                                                        <ul class="check-box-list">
                                                            <li>
                                                                <input type="checkbox" id="p0" name="cc" data-price="(price:product<1)">
                                                                <label for="p0">
                                                                    Liên hệ
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="p1" name="cc" data-price="((price:product>1)&amp;&amp;(price:product<=20000))">
                                                                <label for="p1">
                                                                    <span>Dưới</span> 20,000₫
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="p2" name="cc" data-price="((price:product>20000)&amp;&amp;(price:product<=40000))">
                                                                <label for="p2">
                                                                    20,000₫ - 40,000₫
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="p3" name="cc" data-price="((price:product>40000)&amp;&amp;(price:product<=60000))">
                                                                <label for="p3">
                                                                    40,000₫ - 60,000₫
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="p4" name="cc" data-price="((price:product>60000)&amp;&amp;(price:product<=100000))">
                                                                <label for="p4">
                                                                    60,000₫ - 100,000₫
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="p5" name="cc" data-price="(price:product>=100000)">
                                                                <label for="p5">
                                                                    <span>Trên</span> 100,000₫
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- ./filter color -->

                                                <!-- ./filter size -->

                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <script>
                                jQuery(document).ready(function() {
                                    jQuery('.check-box-list li > input').click(function() {
                                        //$('.custom-loader').show();
                                        jQuery(this).parent().toggleClass('active');
                                        Stringfilter();
                                    })
                                    str = "";
                                    var Stringfilter = function() {
                                        var q = "",
                                            gia = "",
                                            vendor = "",
                                            color = "",
                                            size = "",
                                            total_page = 0,
                                            cur_page = 1;
                                        var handle_coll = $('#coll-handle').val();
                                        var str_url = 'filter=';
                                        q = "(" + handle_coll + ")";
                                        jQuery('.filter-price ul.check-box-list li.active').each(function() {
                                            gia = gia + jQuery(this).find('input').data('price') + '||';
                                        })
                                        gia = gia.substring(0, gia.length - 2);
                                        if (gia != "") {
                                            gia = '(' + gia + ')';
                                            q += '&&' + gia;
                                        }
                                        jQuery('.filter-brand ul.check-box-list li.active').each(function() {
                                            vendor = vendor + jQuery(this).find('input').data('vendor') + '||';
                                        })
                                        vendor = vendor.substring(0, vendor.length - 2);
                                        if (vendor != "") {
                                            vendor = '(' + vendor + ')';
                                            q += '&&' + vendor;
                                        }
                                        jQuery('.filter-color ul.check-box-list li.active').each(function() {
                                            color = color + jQuery(this).find('input').data('color') + '||';
                                            //size2 = size2 + jQuery(this).data('s') + '--';
                                        })
                                        color = color.substring(0, color.length - 2);
                                        if (color != "") {
                                            color = '(' + color + ')';
                                            q += '&&' + color;
                                        }
                                        jQuery('.filter-size ul.check-box-list li.active').each(function() {
                                            size = size + jQuery(this).find('input').data('size') + '||';
                                        })
                                        size = size.substring(0, size.length - 2);
                                        if (size != "") {
                                            size = '(' + size + ')';
                                            q += '&&' + size;
                                        }
                                        console.log(str_url + q)
                                        str_url += encodeURIComponent(q);
                                        str = str_url;
                                        jQuery.ajax({ // lấy tổng số trang của kết quả filter
                                            url: "/search?q=" + str_url + "&view=page",
                                            async: false,
                                            success: function(data) {
                                                total_page = parseInt(data);
                                            }
                                        })
                                        //console.log(total_page);
                                        if (cur_page <= total_page) {
                                            jQuery('.pagi').show();
                                            jQuery.ajax({
                                                url: "/search?q=" + str_url + "&view=filter",
                                                success: function(data) {
                                                    jQuery(".product-list.filter").html(data);
                                                    /*
				// fix lazyload
					jQuery('.content-product-list img').imagesLoaded( function() {
						jQuery(window).resize();
					}); 
	*/
                                                    jQuery(".product-list.filter").removeClass('border');
                                                    jQuery(".alert-no-filter").hide();
                                                }
                                            })
                                            jQuery.ajax({ // đoạn code 
                                                url: "/search?q=" + str_url + "&view=paginate",
                                                async: false,
                                                success: function(data) {
                                                    //jQuery(".pagi-filter").html(data); // in phân trang
                                                    jQuery(".pagi").html(data); // in phân trang
                                                }
                                            })
                                        } else {
                                            if (jQuery('.alert-no').length > 0) {
                                                jQuery(".alert-no").html("<p>Không tìm thấy sản phẩm nào phù hợp!</p>");
                                            } else {
                                                jQuery(".alert-no-filter").show().html("<p>Không tìm thấy sản phẩm nào phù hợp!</p>");
                                            }
                                            //jQuery(".product-list.filter").html("<div class='col-sm-12 col-xs-12 text-center no-product'><p>Không tìm thấy sản phẩm nào phù hợp!</p></div>");
                                            jQuery(".product-list.filter").html('');
                                            jQuery(".product-list.filter").addClass('border');
                                            jQuery('.pagi').hide();
                                        }
                                        jQuery('.pagi').on("click", "a", function() { // bắt sự kiện click các nút phân trang
                                            var link = jQuery(this).attr("data-link");
                                            if (link == 'm') {
                                                link = cur_page - 1;
                                            }
                                            if (link == 'p') {
                                                link = cur_page + 1;
                                            }
                                            link = parseInt(link);
                                            jQuery.ajax({
                                                url: "/search?q=" + str + "&view=filter&page=" + link,
                                                success: function(data) {
                                                    jQuery(".product-list.filter").html(data);
                                                    cur_page = link;
                                                }
                                            })
                                            //console.log("/search?q="+str+"&view=paginate&page="+link);
                                            jQuery.ajax({
                                                url: "/search?q=" + str + "&view=paginate&page=" + link,
                                                success: function(data) {
                                                    //jQuery(".pagi-filter").html(data); // in phân trang
                                                    jQuery(".pagi").html(data); // in phân trang
                                                }
                                            })
                                        });
                                        var x = $('#collection-body').offset().top;
                                        smoothScroll(x - 10, 500);
                                    }
                                })
                            </script>




                        </div>
                    </div>

                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="wrap-collection-title row">
                            <div class="heading-collection row">
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <h1 class="title">
                                        Bánh bé trai
                                    </h1>

                                    <div class="alert-no-filter"></div>

                                </div>

                                <div class="col-md-4 hidden-sm hidden-xs">
                                    <div class="option browse-tags">
                                        <label class="lb-filter hide" for="sort-by">Sắp xếp theo:</label>
                                        <span class="custom-dropdown custom-dropdown--grey">
                                            <select class="sort-by custom-dropdown__select">

                                                <option value="manual">Sản phẩm nổi bật</option>

                                                <option value="price-ascending" data-filter="&amp;sortby=(price:product=asc)">Giá: Tăng dần</option>
                                                <option value="price-descending" data-filter="&amp;sortby=(price:product=desc)">Giá: Giảm dần</option>
                                                <option value="title-ascending" data-filter="&amp;sortby=(title:product=asc)">Tên: A-Z</option>
                                                <option value="title-descending" data-filter="&amp;sortby=(price:product=desc)">Tên: Z-A</option>
                                                <option value="created-ascending" data-filter="&amp;sortby=(updated_at:product=desc)">Cũ nhất</option>
                                                <option value="created-descending" data-filter="&amp;sortby=(updated_at:product=asc)">Mới nhất</option>
                                                <option value="best-selling" data-filter="&amp;sortby=(sold_quantity:product=desc)">Bán chạy nhất</option>
                                                <option value="quantity-descending">Tồn kho: Giảm dần</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row filter-here">
                            <div class="content-product-list product-list filter clearfix">
                                {{-- @foreach ($products as $product)
    Tên sp: <a href="/product/{{ $product->slug }}">{{ $product->name}}</a> - Giá {{ number_format($product->price) }} <br>
@endforeach --}}
                                @foreach ($products as $product)
                                <div class="col-md-3 col-sm-6 col-xs-6 pro-loop col-4">
                                    <div class="product-block product-resize ">
                                        <div class="product-img ">
                                            <a href="/product/{{ $product->slug }}" title="{{ $product->name }}" class="image-resize ratiobox">
                                                <picture>
                                                    <img class="lazyload img-loop" data-sizes="auto" data-src="{{ $product->image }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="{{ $product->name }}" />
                                                </picture>
                                                <picture>
                                                    <img class="img-loop img-hover lazyload" data-src="{{ $product->image }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="{{ $product->name }}" />
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1084131641')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">0₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/product/{{ $product->slug }}" title="{{ $product->name }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>{{ number_format($product->price) }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="sortpagibar pagi clearfix text-center">
                                <div id="pagination" class="clearfix">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <span class="page-node current">1</span>

                                        <a class="page-node" href="/collections/banh-be-trai?page=2">2</a>

                                        <a class="page-node" href="/collections/banh-be-trai?page=3">3</a>

                                        <a class="page-node" href="/collections/banh-be-trai?page=4">4</a>

                                        <a class="next" href="/collections/banh-be-trai?page=2">
                                            <svg data-icon="chevron-double-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <g class="fa-group">
                                                    <path fill="currentColor" d="M285.6 273L90.79 467a24 24 0 0 1-33.88.1l-.1-.1-22.74-22.7a24 24 0 0 1 0-33.85L188.39 256 34.07 101.55A23.8 23.8 0 0 1 34 67.8l.11-.1L56.81 45a24 24 0 0 1 33.88-.1l.1.1L285.6 239a24.09 24.09 0 0 1 0 34z" class="fa-secondary"></path>
                                                    <path fill="currentColor" d="M478 273L283.19 467a24 24 0 0 1-33.87.1l-.1-.1-22.75-22.7a23.81 23.81 0 0 1-.1-33.75l.1-.1L380.8 256 226.47 101.55a24 24 0 0 1 0-33.85L249.22 45a24 24 0 0 1 33.87-.1.94.94 0 0 1 .1.1L478 239a24.09 24.09 0 0 1 0 34z" class="fa-primary"></path>
                                                </g>
                                            </svg>
                                        </a>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="text" class="hidden" id="coll-handle" value="(collectionid:product=1003053764)">
</div>
<script>
    Haravan.queryParams = {};
    if (location.search.length) {
        for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
            aKeyValue = aCouples[i].split('=');
            if (aKeyValue.length > 1) {
                Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
            }
        }
    }
    var collFilters = jQuery('.coll-filter');
    collFilters.change(function() {
        var newTags = [];
        var newURL = '';
        delete Haravan.queryParams.page;
        collFilters.each(function() {
            if (jQuery(this).val()) {
                newTags.push(jQuery(this).val());
            }
        });

        newURL = '/collections/' + 'banh-be-trai';
        if (newTags.length) {
            newURL += '/' + newTags.join('+');
        }
        var search = jQuery.param(Haravan.queryParams);
        if (search.length) {
            newURL += '?' + search;
        }
        location.href = newURL;

    });
    jQuery('.sort-by')
        .val('title-ascending')
        .bind('change', function() {
            Haravan.queryParams.sort_by = jQuery(this).val();
            location.search = jQuery.param(Haravan.queryParams);
        });
</script>
@endsection
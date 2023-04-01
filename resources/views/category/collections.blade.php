{{-- @foreach ($products as $product)
    Tên sp: <a href="/product/{{ $product->slug }}">{{ $product->name}}</a> - Giá {{ number_format($product->price) }} <br>
@endforeach --}}

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
                                                Danh mục sản phẩm
                                                <span><i class="fa fa-angle-down"></i></span>
                                            </p>
                                            <div class="block_content">
                                                <div class="group-filter" aria-expanded="true">
                                                    <div class="layered_subtitle dropdown-filter"><span>Danh mục sản phẩm</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                                    <div class="layered-content bl-filter filter-price">
                                                        <ul class="check-box-list">
                                                            @foreach ($categories as $category)
                                                            <li><a href="/collections/{{ $category->slug }}">{{ $category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="wrap-collection-title row">
                            <div class="heading-collection row">
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <h1 class="title">
                                        {{ isset($category_info) && $category_info != null ? $category_info->name : "Tất cả sản phẩm" }}
                                    </h1>

                                    <div class="alert-no-filter"></div>

                                </div>

                                <div class="col-md-4">
                                    <div class="option browse-tags">
                                        <label class="lb-filter hide" for="sort-by">Sắp xếp theo:</label>
                                        <span class="custom-dropdown custom-dropdown--grey">
                                            <select class="sort-by custom-dropdown__select">
                                                <option value="manual">Sản phẩm nổi bật</option>
                                                <option value="price-ascending">Giá: Tăng dần</option>
                                                <option value="price-descending">Giá: Giảm dần</option>
                                                <option value="name-ascending">Tên: A-Z</option>
                                                <option value="name-descending">Tên: Z-A</option>
                                                <option value="created-ascending">Cũ nhất</option>
                                                <option value="created-descending">Mới nhất</option>
                                                <option value="best-selling">Bán chạy nhất</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row filter-here">
                            <div class="content-product-list product-list filter clearfix">
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

                                        <ul class="pagination pagination-sm m-0 float-right">
                                            @if(empty($_GET['sortby']))
                                                {{ $products->links('pagination::bootstrap-4') }}
                                            @endif
                                            {{-- {{ $products->appends(['sortby' => isset($_GET['sortby']) ? $_GET['sortby'] : ''])->links('pagination::bootstrap-4') }} --}}
                                        </ul>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var sortByValue = urlParams.get('sortby');
        var pageValue = urlParams.get('page');
        if (sortByValue) {
            $('.sort-by').val(sortByValue);
        }
        $('.sort-by').on('change', function() {
            var sortByValue = $(this).val();
            var currentUrl = window.location.href.split('?')[0];
            var newUrl = currentUrl + '?sortby=' + sortByValue;
            if (pageValue) {
                newUrl += '&page=' + pageValue;
            }
            window.location.href = newUrl;
        });
    });

</script>
@endsection
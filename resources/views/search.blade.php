@extends('main')

@section('content')
<div class="searchPage" id="layout-search">
    <div class="container-fluid">
        <div class="row pd-page">
            <div class="col-md-12 col-xs-12">
                <div class="heading-page">
                    <h1>Tìm kiếm</h1>
                    <p class="subtxt">Có <span>{{ $products->count() }} sản phẩm</span> cho tìm kiếm</p>
                </div>
                <div class="wrapbox-content-page">
                    <div class="content-page" id="search">
                        <p class="subtext-result"> Kết quả tìm kiếm cho <strong>'{{ $query }}'</strong>. </p>
                        @if($products->count() > 0)
                        <div class="results content-product-list ">
                            <div class=" search-list-results row">
                                <!-- Begin results -->
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
                        </div> <!-- End results -->
                        <div class="row pagination-theme clearfix text-center">
                            <div id="pagination" class="clearfix">
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('form.search-page').submit(function (e) {
        e.preventDefault();
        var q = $(this).find('input[type="text"]').val();
        if (q.indexOf('script') > -1 || q.indexOf('>') > -1) {
            alert("Key word của bạn có chứa mã độc hại");
            $(this).find('input[type="text"]').val('');
        }
        else {
            window.location.href = "/search?type=product&q=" + $('input.search_box').val();
        }
    })
</script>
@endsection
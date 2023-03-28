@extends('main')

{{-- <a href="/collections/all">Xem tất cả sản phẩm</a><br>
@foreach($categoryParents as $categoryParent)
    Tên: <a href="/collections/{{ $categoryParent->slug }}">{{ $categoryParent->name }}</a><br>
@endforeach --}}

@section('content')
            <section id="catagories" class="section ">  
                <div class="container-fluid d-flex flex-wrap">
                    @foreach($categoryParents as $categoryParent)
                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/collections/{{ $categoryParent->slug }}" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                <picture>
                                    <source data-srcset="{{ $categoryParent->image }}">
                                    <img class="lazyload" alt="{{ $categoryParent->name }}" data-sizes="auto" data-src="{{ $categoryParent->image }}" data-lowsrc="{{ $categoryParent->image }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                </picture>
                            </a>

                            <a href="/collections/{{ $categoryParent->slug }}" class="caption_banner_slide">
                                <h3>{{ $categoryParent->name }}</h3>
                            </a>

                        </div>
                    </div>
                    @endforeach
                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/pages/banh-kem" aria-label="Banner 1">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_1_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_1_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_1_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Bánh Kem">
                                </picture>
                            </a>

                            <a href="/pages/banh-kem" class="caption_banner_slide">
                                <h3>Bánh Kem</h3>
                            </a>

                        </div>
                    </div>

                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/pages/mousse-cheese-cake" aria-label="Banner 2">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_2_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_2_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_2_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Mousse Cheese Cake">
                                </picture>
                            </a>

                            <a href="/pages/mousse-cheese-cake" class="caption_banner_slide">
                                <h3>Mousse /<br>Chesse Cake</h3>
                            </a>

                        </div>
                    </div>





                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/collections/cupcake" aria-label="Banner 3">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_3_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_3_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_3_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Cupcake">
                                </picture>
                            </a>

                            <a href="/collections/cupcake" class="caption_banner_slide">
                                <h3>Cupcake</h3>
                            </a>

                        </div>
                    </div>





                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/collections/bong-lan-trung-muoi/" aria-label="Banner 4">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_4_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_4_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_4_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Bông Lan Trứng Muối">
                                </picture>
                            </a>

                            <a href="/collections/bong-lan-trung-muoi/" class="caption_banner_slide">
                                <h3>Bông Lan <br>Trứng Muối</h3>
                            </a>

                        </div>
                    </div>





                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/collections/banh-ngot-do-uong" aria-label="Banner 5">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_5_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_5_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_5_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Bánh Ngọt & Đồ Uống">
                                </picture>
                            </a>

                            <a href="/collections/banh-ngot-do-uong" class="caption_banner_slide">
                                <h3>Bánh Ngọt <br>& Đồ Uống</h3>
                            </a>

                        </div>
                    </div>





                    <div class="home-banner-pd col-1-3">
                        <div class="block-banner-category d-flex position-relative">
                            <a class="link-banner ratiobox" href="/products/banh-cookie-icing/" aria-label="Banner 6">
                                <picture>
                                    <source data-srcset="https://theme.hstatic.net/200000449489/1000802239/14/home_category_6_banner.jpg?v=569" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                    <img class="lazyload" data-sizes="auto" data-src="https://theme.hstatic.net/200000449489/1000802239/14/home_category_6_banner.jpg?v=569" data-lowsrc="https://theme.hstatic.net/200000449489/1000802239/14/home_category_6_banner.jpg?v=569" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Cookies Icing">
                                </picture>
                            </a>

                            <a href="/products/banh-cookie-icing/" class="caption_banner_slide">
                                <h3>Cookies <br>Icing</h3>
                            </a>

                        </div>
                    </div>


                </div>
            </section>

            <section id="blogs-section" class="section d-flex flex-wrap">
                <div class="wrapper-heading-home animation-tran text-center">
                    <div class="container-fluid">
                        <div class="site-animation">
                            <h2>
                                <a href="/blogs/news">

                                    Chuyện của Cake

                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex flex-wrap">

                    <!-- first image in blog post content -->
                    <div class="col-1-3 blog-item">
                        <a href="/blogs/news/" class="text-colored">
                            <div class="hero-image-new"><img src="/template/user/images/blog1.jpg"></div>
                        </a>
                        <h3><a href="/blogs/news/">Cách làm bánh su kem đơn giản tại nhà</a></h3>
                        <p>Bánh su kem là một món ăn vặt được nhiều người yêu thích. Trong bài viết này, chúng tôi sẽ hướng dẫn các bạn cách làm
                        bánh su kem đơn giản tại nhà, giúp bạn có thể thưởng thức món ăn ngon tuyệt này mà không cần đến tiệm bánh.</p>
                    </div>

                    <div class="col-1-3 blog-item">
                        <a href="/blogs/news/" class="text-colored">
                            <div class="hero-image-new"><img src="/template/user/images/blog2.jpg"></div>
                        </a>
                        <h3><a href="/blogs/news/">Top 10 loại bánh ngọt phổ biến nhất tại Việt Nam</a></h3>
                        <p>Bánh ngọt là một phần không thể thiếu trong ẩm thực Việt Nam. Tuy nhiên, với nhiều loại bánh khác nhau, bạn có thể bị
                        bối rối khi chọn loại nào để thưởng thức. Trong bài viết này, chúng tôi sẽ giới thiệu cho bạn top 10 loại bánh ngọt phổ
                        biến nhất tại Việt Nam, giúp bạn có thể lựa chọn và thưởng thức những món bánh ngon nhất.</p>
                    </div>

                    <div class="col-1-3 blog-item">
                        <a href="/blogs/news/" class="text-colored">
                            <div class="hero-image-new"><img src="/template/user/images/blog3.jpg"></div>
                        </a>
                        <h3><a href="/blogs/news/">Tìm hiểu về loại bánh cupcakes đang được ưa chuộng</a></h3>
                        <p>Cupcake là một trong những loại bánh phổ biến nhất trên thế giới, với nhiều hương vị và kiểu dáng khác nhau. Tuy nhiên,
                        không phải ai cũng biết được sự khác biệt giữa các loại bánh cupcakes và cách thưởng thức chúng. Bài viết này sẽ giới
                        thiệu về loại bánh cupcakes đang được ưa chuộng nhất hiện nay, giúp bạn hiểu rõ hơn về loại bánh này và cách làm chúng
                        tại nhà.</p>
                    </div>

                </div>
            </section>
@endsection
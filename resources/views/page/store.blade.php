@extends('main')
@section('content')
<div class="pageAbout-us page-layout">
    <div class="breadcrumb-shop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li>
                            <a href="/"><span>Trang chủ</span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="active">
                            <span>
                                <span>Cửa hàng</span>
                            </span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-row pd-page">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-md-9 col-sm-12 col-xs-12 mx-auto">
                    <div class="page-wrapper">
                        <div class="heading-page">
                            <h1>Vị trí Cửa hàng</h1>
                        </div>
                        <div class="wrapbox-content-page">
                            <div class="content-page">
								<div class="col-lg-4 col-md-12 col-12 wrapbox-left">
									<div class="wrapbox-info">
										<div class="box-content boxscroll" id="store-info">
											<div class="store-item">
												<h3>Cửa hàng PHCake</h3>
												<p><i class="fa fa-map-marker"></i> Địa chỉ: <b>82/57 Đường 138, Phường Tân Phú, Quận 9, Thành phố Hồ Chí Minh</b></p>
												<p><i class="fa fa-clock-o"></i> Thời gian hoạt động: <b>07h30 - 20h00 (kể cả CN và ngày lễ)</b></p>
												<p><i class="fa fa-phone"></i> Số điện thoại: <b>08 7722 0202</b></p>
											</div>
										</div> 
									</div>
								</div>
								<div class="col-lg-8 col-md-12 col-12 wrapbox-right">
									<div class="box-map" id="boxMap">
										<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d692.666522859533!2d106.80542313721728!3d10.863738203048896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDUxJzQ4LjkiTiAxMDbCsDQ4JzIwLjQiRQ!5e0!3m2!1svi!2s!4v1680446972833!5m2!1svi!2s" style="border:0;width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
@endsection

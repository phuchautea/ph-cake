<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    @include('head')
</head>

<body id="kidty-theme" class="index">
    <div class="main-body layoutProduct_scroll">
        <div class="mainHeader--height">
            <header id="site-header" class="main-header mainHeader_temp02">

                <div class="header-upper-middle">
                    <div class="container-fluid">
                        <div class="flexContainer-header">
                            @include('menu-mobile')
                            <div class="header-upper-logo">
                                <div class="header-logo wrap-logo">
                                    <a href="/">
                                        <img src="/template/user/images/logo.png" alt="PHCake"
                                            class="img-responsive logoimg" style="margin: auto;">
                                    </a>

                                </div>
                            </div>
                            @include('menu')
                            <div class="header-upper-icon">
                                <div class="header-wrap-icon">
                                    <div class="header-action header-action_search">
                                        <div class="header-action_text">
                                            <a class="header-action__link header-action-toggle" href="javascript:void(0)" id="site-search-handle" aria-label="Tìm kiếm" title="Tìm kiếm">
                                                <span class="box-icon">
                                                    <svg class="svg-ico-search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                                        <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z" />
                                                        <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8" />
                                                    </svg>
                                                    <span class="box-icon--close">
                                                        <svg viewBox="0 0 19 19" role="presentation">
                                                            <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill="currentColor" fill-rule="evenodd"></path>
                                                        </svg>
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
                                                <p class="ttbold">Tìm kiếm</p>
                                                <div class="site_search">

                                                    <div class="search-box wpo-wrapper-search">
                                                        <form action="/search" class="searchform searchform-categoris ultimate-search">
                                                            <div class="wpo-search-inner">
                                                                <input type="hidden" name="type" value="product" />
                                                                <input required id="inputSearchAuto" name="q" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                                                            </div>
                                                            <button type="submit" class="btn-search btn" id="search-header-btn" aria-label="Tìm kiếm">
                                                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                                                    <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path>
                                                                    <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                                                            <div class="resultsContent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-action header-action_account">
                                        <div class="header-action_text">
                                            <a class="header-action__link  header-action-toggle " href="javascript:void(0);" id="site-account-handle" aria-label="Tài khoản" title="Tài khoản">
                                                <span class="box-icon">
                                                    <svg class="svg-ico-account" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px" height="510px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                                                        <g>
                                                            <g id="account-circle">
                                                                <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
																 c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
																 c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="box-icon--close">
                                                        <svg viewBox="0 0 19 19" role="presentation">
                                                            <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill="currentColor" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="header-action_dropdown ">
                                            <span class="box-triangle">
                                                <svg viewBox="0 0 20 9" role="presentation">
                                                    <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                                </svg>
                                            </span>
                                            <div class="header-dropdown_content">
                                                <div class="site_account " id="siteNav-account">
                                                    <div class="site_account_panel_list">
                                                        <div id="header-login-panel" class="site_account_panel site_account_default is-selected">
                                                            <header class="site_account_header">
                                                                <h2 class="site_account_title heading">Đăng nhập tài khoản</h2>
                                                                <p class="site_account_legend">Nhập email và mật khẩu của bạn:</p>
                                                            </header>
                                                            <div class="site_account_inner">
                                                                <form accept-charset='UTF-8' action='/account/login' id='customer_login' method='post'>
                                                                    <input name='form_type' type='hidden' value='customer_login'>
                                                                    <input name='utf8' type='hidden' value='✓'>

                                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                                        <input type="email" id="login-customer[email]" class="form__field form__field--text" name="customer[email]" required="required">
                                                                        <label for="login-customer[email]" class="form__floating-label">Email</label>
                                                                    </div>
                                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                                        <input type="password" id="login-customer[password]" class="form__field form__field--text" name="customer[password]" required="required" autocomplete="current-password">
                                                                        <label for="login-customer[password]" class="form__floating-label">Mật khẩu</label>
                                                                        <div class="sitebox-recaptcha">
                                                                            This site is protected by reCAPTCHA and the Google
                                                                            <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                                                            and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="form__submit button dark" id="form_submit-login">Đăng nhập</button>

                                                                    <input id='7909839f50ed4be48612ee4ec9668f51' name='g-recaptcha-response' type='hidden'><noscript src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></noscript><noscript>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('7909839f50ed4be48612ee4ec9668f51').value = token;});});</noscript>
                                                                </form>
                                                                <div class="site_account_secondary-action">
                                                                    <p>Khách hàng mới?
                                                                        <a class="link" href="/account/register">Tạo tài khoản</a>
                                                                    </p>
                                                                    <p>Quên mật khẩu?
                                                                        <button aria-controls="header-recover-panel" class="js-link link">Khôi phục mật khẩu</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="header-recover-panel" class="site_account_panel  site_account_sliding">
                                                            <header class="site_account_header">
                                                                <h2 class="site_account_title heading">Khôi phục mật khẩu</h2>
                                                                <p class="site_account_legend">Nhập email của bạn:</p>
                                                            </header>
                                                            <div class="site_account_inner">
                                                                <form accept-charset='UTF-8' action='/account/recover' method='post'>
                                                                    <input name='form_type' type='hidden' value='recover_customer_password'>
                                                                    <input name='utf8' type='hidden' value='✓'>

                                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                                        <input type="email" id="recover-customer[recover_email]" class="form__field form__field--text" name="email" required="required">
                                                                        <label for="recover-customer[recover_email]" class="form__floating-label">Email</label>
                                                                        <div class="sitebox-recaptcha">
                                                                            This site is protected by reCAPTCHA and the Google
                                                                            <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                                                            and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="form__submit button dark" id="form_submit-recover">Khôi phục</button>

                                                                    <input id='4a6c3c26801a44b287a09113c47159e2' name='g-recaptcha-response' type='hidden'><noscript src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></noscript><noscript>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('4a6c3c26801a44b287a09113c47159e2').value = token;});});</noscript>
                                                                </form>
                                                                <div class="site_account_secondary-action">
                                                                    <p>Bạn đã nhớ mật khẩu?
                                                                        <button aria-controls="header-login-panel" class="js-link link">Trở về đăng nhập</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
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
                                                        <span class="count">0</span>
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
                                                                    <td><a href="/cart" class="linktocart button dark">Xem giỏ hàng</a></td>
                                                                    <td><a href="/checkout" class="linktocheckout button dark">Thanh toán</a></td>
                                                                </tr>
                                                            </table>
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
                </div>
                <div class="header-search-mobile search-bar-mobile">
                    <div class="search-box wpo-wrapper-search">
                        <form action="/search" class="searchform searchform-categoris ultimate-search">
                            <div class="wpo-search-inner">
                                <input type="hidden" name="type" value="product" />
                                <input required id="inputSearchAuto-mb" name="q" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                                <span class="close-search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                    </svg></span>
                            </div>
                            <button type="submit" class="btn-search btn" id="search-header-btn-mb" aria-label="Tìm kiếm">
                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                    <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path>
                                    <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect>
                                </svg>
                            </button>
                        </form>
                        <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                            <div class="resultsContent"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <main class="mainContent-theme main-index">

            @yield('content')

        </main>
        @include('foot')
    </div>
</body>

</html>
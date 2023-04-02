@extends('main')
@section('content')
<div class="layout-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xs-12 wrapbox-heading-account">
                <div class="header-page clearfix">
                    <h1>Đăng ký</h1>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 wrapbox-content-account">
                <div id="customer-login">
                    <div id="login" class="userbox">
                        <div class="accounttype">
                            <h2 class="title"></h2>
                        </div>
                        <form accept-charset="UTF-8" action="/account/register/store" id="customer_login" method="post">
                            @include('admin.alerts')
                            @csrf
                            <div class="clearfix large_form">
                                <label for="name" class="icon-field"><i
                                        class="icon-login icon-envelope "></i></label>
                                <input required="" type="text" value="" name="name" id="name"
                                    placeholder="Họ và tên" class="text">
                            </div>

                            <div class="clearfix large_form">
                                <label for="phone" class="icon-field"><i
                                        class="icon-login icon-phone "></i></label>
                                <input required="" type="text" value="" name="phone" id="phone"
                                    placeholder="Số điện thoại" class="text">
                            </div>

                            <div class="clearfix large_form">
                                <label for="email" class="icon-field"><i
                                        class="icon-login icon-envelope "></i></label>
                                <input required="" type="email" value="" name="email" id="email"
                                    placeholder="Email" class="text">
                            </div>

                            <div class="clearfix large_form">
                                <label for="password" class="icon-field"><i
                                        class="icon-login icon-shield"></i></label>
                                <input required="" type="password" value="" name="password"
                                    id="password" placeholder="Mật khẩu" class="text" size="16">
                            </div>

                            <div class="clearfix large_form">
                                <label for="password_confirmation" class="icon-field"><i
                                        class="icon-login icon-shield"></i></label>
                                <input required="" type="password" value="" name="password_confirmation"
                                    id="password_confirmation" placeholder="Mật khẩu xác nhận" class="text" size="16">
                            </div>
                            <div class="clearfix action_account_custommer">
                                <div class="action_bottom button dark">
                                    <input class="btn btn-signin" type="submit" value="Đăng ký">
                                </div>
                                <div class="req_pass">
                                    <a href="#" onclick="showRecoverPasswordForm();return false;">Quên mật
                                        khẩu?</a><br>
                                    hoặc <a href="/account/login" title="Đăng nhập">Đăng nhập</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="recover-password" style="display:none;" class="userbox">
                        <div class="accounttype">
                            <h2>Phục hồi mật khẩu</h2>
                        </div>
                        <form accept-charset="UTF-8" action="/account/recover" method="post">
                            <input name="form_type" type="hidden" value="recover_customer_password">
                            <input name="utf8" type="hidden" value="✓">


                            <div class="clearfix large_form large_form-mr10">
                                <label for="email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
                                <input type="email" value="" size="30" name="email" placeholder="Email"
                                    id="recover-email" class="text">
                            </div>
                            <div class="clearfix action_account_custommer">
                                <div class="action_bottom button dark">
                                    <input class="btn" type="submit" value="Gửi">
                                </div>
                                <div class="req_pass">
                                    <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'block';
        document.getElementById('login').style.display = 'none';
    }

    function hideRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'none';
        document.getElementById('login').style.display = 'block';
    }

    if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('language.appTitle') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- RTL layouts -->
    <link rel="stylesheet" href="{{ asset('assets/css/layout-rtl.css') }}">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">{{ __('language.login') }}</h4>
                        <form id="login-form" class="needs-validation was-validated">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fill">
                                        <label class="form-label">{{ __('language.email') }}</label>
                                        <input type="email" class="form-control" name="login_email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fill">
                                        <label class="form-label">{{ __('language.password') }}</label>
                                        <input type="password" class="form-control" name="login_password" minlength="10"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary has-ripple">{{ __('language.login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/ripple.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/notification/notification.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/login/login.js') }}"></script>

</body>

</html>

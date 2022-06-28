<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ asset('assetsa/images/logo.png') }}" alt="" class="logo">

        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">

        <ul class="navbar-nav ms-auto">

            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-notification">
                        <div class="pro-head">

                            @if (Auth::User()->image != '')
                                <img class="img-radius" src="{{ asset('../appImage/users/' . Auth::User()->image) }}"
                                    alt="User-Profile-Image">
                            @else
                                <img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                    alt="User-Profile-Image">
                            @endif
                            <span>{{ Auth::User()->name }}</span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                    Profile</a></li>
                            <li><a href="javascript:void(0)" onclick="logout();" class="dropdown-item"><i class="feather icon-lock"></i>
                                {{ __('language.logout') }}</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

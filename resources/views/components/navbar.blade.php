  <!-- [ navigation menu ] start -->
  <nav class="pcoded-navbar menu-light brand-blue">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    @if (Auth::User()->image != '')
                        <img class="img-radius" src="{{ asset('../appImage/users/' . Auth::User()->image) }}"
                            alt="User-Profile-Image">
                    @else
                        <img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                            alt="User-Profile-Image">
                    @endif

                    <div class="user-details">
                        <div id="more-details">{{ Auth::User()->name }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip"
                                title="View Profile"><i class="feather icon-user"></i></a></li>

                        <li class="list-inline-item"><a href="javascript:void(0)" onclick="logout();"
                                data-toggle="tooltip" title="Logout" class="text-danger"><i
                                    class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('language.navigation') }}</label>
                </li>
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span
                            class="pcoded-mtext">{{ __('language.dashboard') }}</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0);" class="nav-link has-ripple"><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">{{ __('language.administration') }}</span><span class="ripple ripple-animate"
                            style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -77.5px; left: 17px;"></span></a>
                    <ul class="pcoded-submenu" style="display: none;">

                        <li><a href="{{ url('/roleNames') }}">{{ __('language.roleNames') }}</a></li>

                    </ul>
                </li>

              
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

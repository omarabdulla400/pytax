@include('components.head')

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
    <!-- [ Pre-loader ] End -->
    @include('components.navbar')


    <!-- [ Header ] start -->
    @include('components.header')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-yellow">$30200</h4>
                                                    <h6 class="text-muted m-b-0">{{ __('language.balance') }}</h6>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <i class="feather icon-bar-chart-2 f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-yellow">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white m-b-0"></p>
                                                </div>
                                                <div class="col-3 text-end">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-green">290+</h4>
                                                    <h6 class="text-muted m-b-0">{{ __('language.minutes') }}</h6>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <i class="feather icon-mic f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-green">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white m-b-0"></p>
                                                </div>
                                                <div class="col-3 text-end">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-red">145</h4>
                                                    <h6 class="text-muted m-b-0">{{ __('language.calls') }}</h6>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <i class="feather icon-phone f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-red">
                                            <div class="row align-items-center">
                                                <div class="col-9">

                                                </div>
                                                <div class="col-3 text-end">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-blue">500</h4>
                                                    <h6 class="text-muted m-b-0">{{ __('language.reacharing') }}</h6>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <i class="feather icon-rotate-ccw f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-blue">
                                            <div class="row align-items-center">
                                                <div class="col-9">

                                                </div>
                                                <div class="col-3 text-end">

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
    </div>


    @include('components.footer')


</body>

</html>

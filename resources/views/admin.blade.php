
@include('components.header')
<body class="vertical  light  rtl">
    
    <div class="wrapper">
    @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            {{-- <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow bg-primary text-white border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary-light">
                                                    <i class="fe fe-16 fe-file text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">نوسراوەکان</p>
                                                <span class="h3 mb-0 text-white" id="admin_form">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-type text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">جۆری نوسراوەکان</p>
                                                <span class="h3 mb-0" id="admin_type">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0" >بەکارهێنەرەکان</p>
                                                <span class="h3 mb-0" id="admin_users">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end section -->
                        
                        <!-- charts-->
                       
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
           
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    </body>
    <script>
    getDashboardData();
    
    </script>
</html>
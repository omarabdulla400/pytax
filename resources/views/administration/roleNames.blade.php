@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main roleName="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.roleNamesTable') }}</h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addRoleNamesModal">{{ __('language.addRoleNames') }}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-roleNames">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{ __('language.name') }} </th>

                                                    <th>{{ __('language.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <div class="modal fade" id="addRoleNamesModal" tabindex="-1" roleName="dialog"
                aria-labelledby="addroleNamesModalLabel" aria-hidden="true">
                <div class="modal-dialog " roleName="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addroleNamesModalLabel">{{ __('language.addRoleNames') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-roleNames-form">

                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_kr"
                                            name="roleNames_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_ar"
                                            name="roleNames_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_en"
                                            name="roleNames_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                              
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button roleNames="submit" class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateRoleNamesModal" tabindex="-1" roleName="dialog"
                aria-labelledby="addroleNamesModalLabel" aria-hidden="true">
                <div class="modal-dialog " roleName="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateroleNamesModalLabel">{{ __('language.updateRoleNames') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-roleNames-form">

                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_kr_update"
                                            name="roleNames_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_ar_update"
                                            name="roleNames_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="roleNames_name_en_update"
                                            name="roleNames_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button roleNames="submit" class="btn mb-2 btn-primary">{{ __('language.update') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
        create_roleNames_datatable();
    </script>

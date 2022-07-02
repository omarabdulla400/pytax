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
                                <!-- Zero config table start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('language.roleNamesTable') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" class="btn btn-primary has-ripple"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#addRoleNamesModal">{{ __('language.add') }}<span
                                                                    class="ripple ripple-animate"
                                                                    style="height: 174.078px; width: 174.078px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -67.2185px; left: 16.969px;"></span></button>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="dataTable-roleNames"
                                                                class="table table-striped table-bordered nowrap dataTable"
                                                                aria-describedby="simpletable_info">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Position: activate to sort column ascending"
                                                                            style="width: 167.969px;">
                                                                            #</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.name') }}</th>
                                                                            <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.page') }}</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Position: activate to sort column ascending"
                                                                            style="width: 167.969px;">
                                                                            {{ __('language.action') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
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
            </div>
        </div>
    </div>
    <div id="addRoleNamesModal" class="modal fade" tabindex="-1" aria-labelledby="addRoleNamesModal1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" roleName="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.addRoleNames') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="add-roleNames-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_kr') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_kr" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_ar') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_ar" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_en') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_en" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.page') }}</label>
                                    <input type="number" class="form-control" name="roleNames_page" required
                                        >
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary"
                        data-bs-dismiss="modal">{{ __('language.cancel') }}</button>
                    <button type="submit" class="btn btn-primary has-ripple">{{ __('language.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="updateRoleNamesModal" class="modal fade" tabindex="-1" aria-labelledby="addRoleNamesModal1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" roleName="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.updateRoleNames') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="update-roleNames-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_kr') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_kr" required
                                        id="roleNames_name_kr_update">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_ar') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_ar" required
                                        id="roleNames_name_ar_update">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_en') }}</label>
                                    <input type="text" class="form-control" name="roleNames_name_en" required
                                        id="roleNames_name_en_update">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.page') }}</label>
                                    <input type="number" class="form-control" name="roleNames_page" required
                                        id="roleNames_page_update">
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary"
                        data-bs-dismiss="modal">{{ __('language.cancel') }}</button>
                    <button type="submit" class="btn btn-primary has-ripple">{{ __('language.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
    <script>
        create_roleNames_datatable();
    </script>

</body>

</html>

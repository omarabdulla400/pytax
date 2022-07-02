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
                                            <h5>{{ __('language.adminTable') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" class="btn btn-primary has-ripple"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#addAdminModal">{{ __('language.add') }}<span
                                                                    class="ripple ripple-animate"
                                                                    style="height: 174.078px; width: 174.078px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -67.2185px; left: 16.969px;"></span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="dataTable-admin"
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
                                                                            {{ __('language.email') }}</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.phone') }}</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.role') }}</th>
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
    <div id="addAdminModal" class="modal fade" tabindex="-1" aria-labelledby="addAdminModal1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" admin="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.addAdmin') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="add-admin-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name') }}</label>
                                    <input type="text" class="form-control" name="admin_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.phone') }}</label>
                                    <input type="text" class="form-control" name="admin_phone" required
                                        maxlength="11" minlength="11" pattern=".{0}|.{11,}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.email') }}</label>
                                    <input type="email" class="form-control" name="admin_email" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.password') }}</label>
                                    <input type="password" class="form-control" name="admin_password" minlength="8"
                                        required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.selectRole') }}</label>
                                    <select class="form-control" aria-invalid="false" 
                                        name="admin_role" required>
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.selectImage') }}</label>
                                    <input type="file" name="admin_image" class="form-control"
                                        accept="image/x-png,image/gif,image/jpeg" required>
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

    <div id="updateAdminModal" class="modal fade" tabindex="-1" aria-labelledby="updateAdminModal1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" admin="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.updateAdmin') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="update-admin-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name') }}</label>
                                    <input type="text" class="form-control" name="admin_name"  id="admin_name_update" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.phone') }}</label>
                                    <input type="text" class="form-control" name="admin_phone"  id="admin_phone_update" required
                                        maxlength="11" minlength="11" pattern=".{0}|.{11,}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.email') }}</label>
                                    <input type="email" class="form-control" name="admin_email" id="admin_email_update" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.password') }}</label>
                                    <input type="password" class="form-control" name="admin_password" id="admin_password_update" minlength="8"
                                        required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.selectRole') }}</label>
                                    <select class="form-control" aria-invalid="false" id="admin_role_update"
                                        name="admin_role" required>
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.selectImage') }}</label>
                                    <input type="file" name="admin_image" class="form-control"
                                        accept="image/x-png,image/gif,image/jpeg" >
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
        create_admin_datatable();
        setSelection('#admin_role', "", '/getRolesAllData', 'educationLevel')
    </script>

</body>

</html>

@include('components.header')

<body class="vertical  light   rtl">
<div class="wrapper">
    @include('components.navbar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">{{ __('language.adminTable') }} </h2>
                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addAdminModal"> {{ __('language.addAdmin') }} </button>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-admin">
                                        <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>{{ __('language.name') }} </th>
                                            <th>{{ __('language.phone') }}</th>
                                            <th>{{ __('language.phone') }}</th>
                                            <th>{{ __('language.role') }}</th>

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
        <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminModalLabel">{{ __('language.addAdmin') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" id="add-admin-form">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">{{ __('language.name') }}</label>
                                    <input type="text" class="form-control" id="admin_name" name="admin_name"
                                           required="">
                                    <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">{{ __('language.phone') }}</label>
                                    <input type="text" class="form-control" id="admin_phone" name="admin_phone"
                                           maxlength="11"
                                           minlength="11" pattern=".{0}|.{11,}" required="">
                                    <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputEmail1">{{ __('language.email') }}</label>
                                    <input type="email" class="form-control" name="admin_email"
                                           id="admin_email" aria-describedby="emailHelp" required="">
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    <div class="invalid-feedback"> {{ __('language.emailRequired') }}</div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomAdminname">{{ __('language.password') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="admin_password" id="admin_password" minlength="8"
                                               aria-describedby="inputGroupPrepend" required="">
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback">{{ __('language.passwordRequired') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-12 mb-3">
                                    <label for="example-multiselect">{{ __('language.selectRole') }}</label>
                                    <select id="admin_role" name="admin_role" class="form-control" required="">

                                    </select>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    <div class="invalid-feedback"> {{ __('language.selectRoleRequired') }}</div>
                                </div>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" id="admin_image" name="admin_image" class="custom-file-input"
                                       accept="image/x-png,image/gif,image/jpeg">
                                <label class="custom-file-label"
                                       for="validatedCustomFile">{{ __('language.selectImage') }}</label>
                                <div class="invalid-feedback">{{ __('language.imageRequired') }}</div>
                                <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                        <button type="submit" class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- update -->
        <div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateAdminModalLabel">نوێکرادنەوەی بەکارهێنەر</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" id="update-admin-form">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">{{ __('language.name') }}</label>
                                    <input type="text" class="form-control" id="admin_name_update" name="admin_name"
                                           required="">
                                    <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">{{ __('language.phone') }}</label>
                                    <input type="text" class="form-control" id="admin_phone_update" name="admin_phone"
                                           maxlength="11"
                                           minlength="11" pattern=".{0}|.{11,}" required="">
                                    <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputEmail1">{{ __('language.email') }}</label>
                                    <input type="email" class="form-control" name="admin_email"
                                           id="admin_email_update" aria-describedby="emailHelp" required="">
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    <div class="invalid-feedback"> {{ __('language.emailRequired') }}</div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustomAdminname">{{ __('language.password') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="admin_password" id="admin_password_update" minlength="8"
                                               aria-describedby="inputGroupPrepend" required="">
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback">{{ __('language.passwordRequired') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-12 mb-3">
                                    <label for="example-multiselect">{{ __('language.selectRole') }}</label>
                                    <select id="admin_role_update" name="admin_role" class="form-control" required="">
                                    </select>
                                    <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    <div class="invalid-feedback"> {{ __('language.selectRoleRequired') }}</div>
                                </div>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" id="admin_image_update" name="admin_image" class="custom-file-input"
                                       accept="image/x-png,image/gif,image/jpeg">
                                <label class="custom-file-label"
                                       for="validatedCustomFile">{{ __('language.selectImage') }}</label>
                                <div class="invalid-feedback">{{ __('language.imageRequired') }}</div>
                                <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                        <button type="submit" class="btn mb-2 btn-primary">{{ __('language.update') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main> <!-- main -->
</div> <!-- .wrapper -->
@include('components.footer')
<script>
    create_admin_datatable();
    setSelection('#admin_role', "", '/getRolesAllData', 'educationLevel')
</script>

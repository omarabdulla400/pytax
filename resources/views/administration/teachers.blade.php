@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.teacherTable') }} </h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addTeacherModal"> {{ __('language.addTeacher') }} </button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-teacher">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{ __('language.name') }} </th>
                                                    <th>{{ __('language.phone') }}</th>
                                                    <th>{{ __('language.email') }}</th>
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
            <div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog"
                aria-labelledby="addTeacherModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTeacherModalLabel">{{ __('language.addTeacher') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-teacher-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_kr" name="teacher_name_kr"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_ar" name="teacher_name_ar"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_en" name="teacher_name_en"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.phone') }}</label>
                                        <input type="text" class="form-control" id="teacher_phone"
                                            name="teacher_phone" maxlength="11" minlength="11" pattern=".{0}|.{11,}"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">{{ __('language.email') }}</label>
                                        <input type="email" class="form-control" name="teacher_email"
                                            id="teacher_email" aria-describedby="emailHelp" required="">
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.emailRequired') }}</div>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label
                                            for="example-multiselect">{{ __('language.selectEducationLevel') }}</label>
                                        <select id="teacher_educationLevel" name="teacher_educationLevel"
                                            class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.educationLevelRequired') }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label
                                            for="validationCustomTeachername">{{ __('language.password') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="teacher_password"
                                                id="teacher_password" minlength="8" aria-describedby="inputGroupPrepend"
                                                required="">
                                            <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                            <div class="invalid-feedback">{{ __('language.passwordRequired') }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.selectRole') }}</label>
                                        <select id="teacher_role" name="teacher_role" class="form-control">

                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.selectRoleRequired') }}</div>
                                    </div>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" id="teacher_image" name="teacher_image" class="custom-file-input"
                                        required="" accept="image/x-png,image/gif,image/jpeg">
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
            <div class="modal fade" id="updateTeacherModal" tabindex="-1" role="dialog"
                aria-labelledby="addTeacherModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTeacherModalLabel">{{ __('language.updateTeacher') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-teacher-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_kr_update" name="teacher_name_kr"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_ar_update" name="teacher_name_ar"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="teacher_name_en_update" name="teacher_name_en"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.phone') }}</label>
                                        <input type="text" class="form-control" id="teacher_phone_update"
                                            name="teacher_phone" maxlength="11" minlength="11" pattern=".{0}|.{11,}"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">{{ __('language.email') }}</label>
                                        <input type="email" class="form-control" name="teacher_email"
                                            id="teacher_email_update" aria-describedby="emailHelp" required="">
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.emailRequired') }}</div>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label
                                            for="example-multiselect">{{ __('language.selectEducationLevel') }}</label>
                                        <select id="teacher_educationLevel_update" name="teacher_educationLevel"
                                            class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.educationLevelRequired') }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label
                                            for="validationCustomTeachername">{{ __('language.password') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="teacher_password"
                                                id="teacher_password_update" minlength="8" aria-describedby="inputGroupPrepend"
                                                required="">
                                            <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                            <div class="invalid-feedback">{{ __('language.passwordRequired') }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.selectRole') }}</label>
                                        <select id="teacher_role_update" name="teacher_role" class="form-control">

                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.selectRoleRequired') }}</div>
                                    </div>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" id="teacher_image_update" name="teacher_image" class="custom-file-input"
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
        create_teacher_datatable();
        setSelection('#teacher_educationLevel', "", '/getAllEducationLevel', 'educationLevel')
        setSelection('#teacher_role', "", '/getRolesAllData', 'educationLevel')
    </script>

@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.studentTable') }} </h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addStudentModal"> {{ __('language.addStudent') }} </button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-student">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{ __('language.code') }} </th>
                                                    <th>{{ __('language.name') }} </th>
                                                    <th>{{ __('language.phone') }}</th>
                                                    <th>{{ __('language.address') }}</th>
                                                    <th>{{ __('language.gender') }}</th>
                                                    <th>{{ __('language.department') }}</th>
                                                    <th>{{ __('language.stage') }}</th>
                                                    <th>{{ __('language.studyType') }}</th>
                                                    <th>{{ __('language.studyStatus') }}</th>
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
            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog"
                aria-labelledby="addStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStudentModalLabel">{{ __('language.addStudent') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-student-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.code') }}</label>
                                        <input type="text" class="form-control" id="student_code"
                                            name="student_code" required="">
                                        <div class="invalid-feedback"> {{ __('language.codeRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="student_name_kr"
                                            name="student_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="student_name_ar"
                                            name="student_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="student_name_en"
                                            name="student_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.phone') }}</label>
                                        <input type="text" class="form-control" id="student_phone"
                                            name="student_phone" maxlength="11" minlength="11" pattern=".{0}|.{11,}"
                                            required="">
                                        <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.address') }}</label>
                                        <input type="text" class="form-control" id="student_address"
                                            name="student_address" required="">
                                        <div class="invalid-feedback"> {{ __('language.addressValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.gender') }}</label>
                                        <select id="student_gender" name="student_gender"
                                            class="form-control" required="">
                                            <option value="male" selected>{{ __('language.male') }}</option>
                                            <option value="female" >{{ __('language.female') }}</option>
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.department') }}</label>
                                        <select id="student_department" name="student_department"
                                            class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.stage') }}</label>
                                        <select id="student_stage" name="student_stage" class="form-control"
                                            required="">
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.year')}}</label>
                                        <select id="student_year" name="student_year" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.studyType')}}</label>
                                        <select id="student_types" name="student_types" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.studyStatus')}}</label>
                                        <select id="student_statuses" name="student_statuses" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
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
            <div class="modal fade" id="updateStudentModal" tabindex="-1" role="dialog"
                aria-labelledby="addStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateStudentModalLabel">
                                {{ __('language.updateStudent') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-student-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.code') }}</label>
                                        <input type="text" class="form-control" id="student_code_update"
                                               name="student_code" required="">
                                        <div class="invalid-feedback"> {{ __('language.codeRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="student_name_kr_update"
                                               name="student_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="student_name_ar_update"
                                               name="student_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="student_name_en_update"
                                               name="student_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.phone') }}</label>
                                        <input type="text" class="form-control" id="student_phone_update"
                                               name="student_phone" maxlength="11" minlength="11" pattern=".{0}|.{11,}"
                                               required="">
                                        <div class="invalid-feedback"> {{ __('language.phoneValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ __('language.address') }}</label>
                                        <input type="text" class="form-control" id="student_address_update"
                                               name="student_address" required="">
                                        <div class="invalid-feedback"> {{ __('language.addressValidate') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.gender') }}</label>
                                        <select id="student_gender_update" name="student_gender"
                                                class="form-control" required="">
                                            <option value="male" selected>{{ __('language.male') }}</option>
                                            <option value="female" >{{ __('language.female') }}</option>
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.department') }}</label>
                                        <select id="student_department_update" name="student_department"
                                                class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3">
                                        <label for="example-multiselect">{{ __('language.stage') }}</label>
                                        <select id="student_stage_update" name="student_stage" class="form-control"
                                                required="">
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.year')}}</label>
                                        <select id="student_year_update" name="student_year" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.studyType')}}</label>
                                        <select id="student_types_update" name="student_types" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.studyStatus')}}</label>
                                        <select id="student_statuses_update" name="student_statuses" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
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
        create_student_datatable();

        setSelection('#student_year', "", '/getYears', 'year')
        setSelection('#student_department', "", '/getDepartmentsAllData', 'departments')
        setSelection('#student_stage', "", '/getStageAllData', 'stage')
        setSelection('#student_statuses', "", '/getStudyStatusAllData', 'stage')
        setSelection('#student_types', "", '/getStudyTypesAllData', 'stage')
    </script>

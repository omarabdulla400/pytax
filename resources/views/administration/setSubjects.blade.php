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
                                            <h5>{{ __('language.setSubjectTable') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" class="btn btn-primary has-ripple"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#addSetSubjectModal">{{ __('language.add') }}<span
                                                                    class="ripple ripple-animate"
                                                                    style="height: 174.078px; width: 174.078px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -67.2185px; left: 16.969px;"></span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="dataTable-setSubjects"
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
                                                                            {{ __('language.subject') }}</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.department') }}</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.stage') }}</th>
                                                                        <th class="sorting sorting_asc" tabindex="0"
                                                                            aria-controls="simpletable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 249.531px;">
                                                                            {{ __('language.teacher') }}</th>


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
    <div id="addSetSubjectModal" class="modal fade" tabindex="-1" aria-labelledby="addSetSubjectModal1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" setSubject="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.addSetSubject') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="add-setSubject-form" class="needs-validation was-validated">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.department') }}</label>
                                    <select class="form-control" aria-invalid="false" id="setSubjects_department"
                                        name="setSubjects_department" required onchange="changeAndLoadSubjectsAdd()">
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.stage') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_stage"
                                        id="setSubjects_stage" required onchange="changeAndLoadSubjectsAdd()">
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.teacher') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_teacher"
                                        id="setSubjects_teacher" required>
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.subject') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_subject"
                                        id="setSubjects_subject" required>
                                        <option value="" hidden></option>

                                    </select>
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

    <div id="updateSetSubjectModal" class="modal fade" tabindex="-1" aria-labelledby="updateSetSubjectModal1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" setSubject="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.updateSetSubject') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="update-setSubject-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.department') }}</label>
                                    <select class="form-control" aria-invalid="false"
                                        id="setSubjects_department_update" name="setSubjects_department" required onchange="changeAndLoadSubjectsUpdate()">
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.stage') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_stage"
                                        id="setSubjects_stage_update" required onchange="changeAndLoadSubjectsUpdate()">
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.teacher') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_teacher"
                                        id="setSubjects_teacher_update" required>
                                        <option value="" hidden></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.subject') }}</label>
                                    <select class="form-control" aria-invalid="false" name="setSubjects_subject"
                                        id="setSubjects_subject_update" required>
                                        <option value="" hidden></option>

                                    </select>
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
        create_setSubjects_datatable();
        setSelection('#setSubjects_department', "", '/getDepartmentsAllData', 'departments')
        setSelection('#setSubjects_stage', "", '/getStageAllData', 'stage')
        setSelection('#setSubjects_teacher', "", '/getTeachersAllData', 'teacher')
    </script>

</body>

</html>

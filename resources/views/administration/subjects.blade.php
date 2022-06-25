@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.subjectTable') }}</h2>
                        <button subjects="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addSubjectsModal">{{ __('language.addSubject') }}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-subjects">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{ __('language.code') }} </th>
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
                <div class="row">
                    <div class="col-md-12" data-select2-id="9">
                        <div class="card shadow mb-4" data-select2-id="8">
                            <div class="card-body" data-select2-id="7">
                                <form class="needs-validation" novalidate="" id="set-subjects-form">

                                    <div class="form-row">
                                        <!-- form-group -->
                                        <div class="form-group col-md-5" style="margin-left: 1%; margin-right: 1%;">
                                            <label for="multi-select2">{{ __('language.subjects') }}</label>
                                            <select class="form-control select2-multi select2-hidden-accessible"
                                                id="multi-select-subjects" name="multiSelectSubjects"
                                                multiple="multiple" required="true">
                                            </select>
                                        </div> <!-- form-group -->
                                        <!-- form-group -->
                                        <div class="form-group col-md-5">
                                            <label for="multi-select2">{{ __('language.departments') }}</label>
                                            <select class="form-control select2-multi select2-hidden-accessible"
                                                id="multi-select-departemnts" name="multiSelectDepartments"
                                                data-select2-id="multi-select2" tabindex="-1" aria-hidden="true"
                                                required="true">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5" style="margin-left: 1%; margin-right: 1%;">
                                            <label for="example-multiselect">{{ __('language.stage') }}</label>
                                            <select id="subjectStage" name="subjectStage" class="form-control"
                                                required="">

                                            </select>
                                            <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                            <div class="invalid-feedback"> {{ __('language.StageRequired') }}</div>
                                        </div>
                                   
                                        <div class="form-row" >
                                            <div class="col-md-10">
                                                <label for="validationCustom01">{{ __('language.theory') }}</label>
                                                <input type="number" class="form-control" id="subjectStage_theory_1"
                                                    name="subjectStage_theory" required="" min="0" value="0">
                                                <div class="invalid-feedback"> {{ __('language.theoryRequired') }}</div>
                                                <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                            </div>
                                        </div>
                                        <div class="form-row" >
                                            <div class="col-md-10">
                                                <label for="validationCustom01">{{ __('language.practice') }}</label>
                                                <input type="number" class="form-control" id="subjectStage_practice_1"
                                                    name="subjectStage_practice" required="" min="0" value="0">
                                                <div class="invalid-feedback"> {{ __('language.practiceRequired') }}</div>
                                                <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                            </div>
                                        </div>
                                    </div> <!-- form-row -->

                                    <div class="form-row" >
                                        <div class="col-md-5 mb-3" style="margin-left: 1%; margin-right: 1%;">
                                            <label for="example-multiselect">{{__('language.educationType')}}</label>
                                            <select id="subjectStage_educationType_1" name="subjectStage_educationType" class="form-control" required="">
                                            </select>
                                            <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                            <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="margin-top: 3%">

                                        <button subjects="submit"
                                            class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                                    </div>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-subjects-departments">
                                    <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>{{ __('language.subject') }} </th>
                                            <th>{{ __('language.department') }} </th>
                                            <th>{{ __('language.stage') }} </th>
                                            <th>{{ __('language.theory') }} </th>
                                            <th>{{ __('language.practice') }} </th>
                                            <th>{{__('language.educationType')}} </th>
                                            <th>{{ __('language.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div>

            </div> <!-- .container-fluid -->
            <div class="modal fade" id="addSubjectsModal" tabindex="-1" role="dialog"
                aria-labelledby="addsubjectsModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addsubjectsModalLabel">{{ __('language.addSubject') }}
                            </h5>
                            <button subjects="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-subjects-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.code') }}</label>
                                        <input type="text" class="form-control" id="subjects_code"
                                            name="subjects_code" required="">
                                        <div class="invalid-feedback"> {{ __('language.codeRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_kr"
                                            name="subjects_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_ar"
                                            name="subjects_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_en"
                                            name="subjects_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.educationType')}}</label>
                                        <select id="setSubjects_educationType" name="setSubjects_educationType" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.theory') }}</label>
                                        <input type="number" class="form-control" id="subjects_theory"
                                            name="subjects_theory" required="" min="0" value="0">
                                        <div class="invalid-feedback"> {{ __('language.theoryRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.practice') }}</label>
                                        <input type="number" class="form-control" id="subjects_practice"
                                            name="subjects_practice" required="" min="0" value="0">
                                        <div class="invalid-feedback"> {{ __('language.practiceRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- form-group -->
                                    <div class="form-group col-md-12">
                                        <label for="multi-select2">{{ __('language.departments') }}</label>
                                        <select class="form-control select2-multi select2-hidden-accessible"
                                            id="subjects_multi-select-departemnts"
                                            name="subjects_multiSelectDepartments" data-select2-id="multi-select2"
                                            tabindex="-1" aria-hidden="true" required="true">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="example-multiselect">{{ __('language.stage') }}</label>
                                        <select id="subjects_subjectStage" name="subjects_subjectStage"
                                            class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }}</div>
                                        <div class="invalid-feedback"> {{ __('language.StageRequired') }}</div>
                                    </div>

                                </div> <!-- form-row -->
                        </div>
                        <div class="modal-footer">
                            <button subjects="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button subjects="submit" class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateSubjectsModal" tabindex="-1" role="dialog"
                aria-labelledby="addsubjectsModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatesubjectsModalLabel">
                                {{ __('language.updateSubject') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-subjects-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.code') }}</label>
                                        <input type="text" class="form-control" id="subjects_code_update"
                                            name="subjects_code" required="">
                                        <div class="invalid-feedback"> {{ __('language.codeRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_kr_update"
                                            name="subjects_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_ar_update"
                                            name="subjects_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="subjects_name_en_update"
                                            name="subjects_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button subjects="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button subjects="submit"
                                class="btn mb-2 btn-primary">{{ __('language.save') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        setSelection('#subjects_multi-select-departemnts', "", '/getDepartmentsAllData', 'departments')

        setSelection('#subjects_subjectStage', "", '/getStageAllData', 'stage')
        setSelection('#multi-select-departemnts', "", '/getDepartmentsAllData', 'departments')
        setSelection('#multi-select-subjects', "", '/getSubjectsAllData', 'subjects')
        setSelection('#subjectStage', "", '/getStageAllData', 'stage')
        setSelection('#setSubjects_educationType', "", '/getEducationTypesAllData','educationType')
        setSelection('#subjectStage_educationType_1', "", '/getEducationTypesAllData','educationType')
        
        create_subjects_datatable();
        create_subjects_and_departments_datatable();
    </script>

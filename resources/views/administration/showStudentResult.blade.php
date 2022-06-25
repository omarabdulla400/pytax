@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3  mb-3">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                                </div>
                                                <div class="col pr-0">
                                                    <p class="small text-muted mb-0" >{{__("language.passedStudent")}}</p>
                                                    <span class="h3 mb-0" id="showStudentResult_passedStudent">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  mb-3">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                                </div>
                                                <div class="col pr-0">
                                                    <p class="small text-muted mb-0" >{{__("language.failedStudent")}}</p>
                                                    <span class="h3 mb-0" id="showStudentResult_failedStudent">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  mb-3">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                                </div>
                                                <div class="col pr-0">
                                                    <p class="small text-muted mb-0" >{{__("language.passedStudentBoy")}}</p>
                                                    <span class="h3 mb-0" id="showStudentResult_passedStudentBoy">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  mb-3">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                                </div>
                                                <div class="col pr-0">
                                                    <p class="small text-muted mb-0" >{{__("language.failedStudentGirl")}}</p>
                                                    <span class="h3 mb-0" id="showStudentResult_failedStudentGirl">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="margin-top: 1%;">
                            <div class="col-md-4 mb-3" >
                                <label for="example-multiselect">{{__('language.department')}}</label>
                                <select id="showStudentResultSubject_department" name="showStudentResultSubject_department" class="form-control" required="" onchange="changeAndLoadResultSubjectsShow()">

                                </select>
                                <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                            </div>
                            <div class="col-md-4 mb-3" >
                                <label for="example-multiselect">{{__('language.stage')}}</label>
                                <select id="showStudentResultSubject_stage" name="showStudentResultSubject_stage" class="form-control" required="" onchange="changeAndLoadResultSubjectsShow()">

                                </select>
                                <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                            </div>
                            <div class="col-md-4 mb-3" >
                                <label for="example-multiselect">{{__('language.subject')}}</label>
                                <select id="showStudentResultSubject_subject" name="showStudentResultSubject_subject" class="form-control" required="">

                                </select>
                                <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                            </div>
                        </div>



                        <div class="col-12">
                            <button type="button" class="btn mb-2 btn-primary" onclick="update_student_show_result__datatable()"> {{ __('language.reload') }} </button>
                        </div>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div id="result_showStudentTable"></div>

                                        <!-- table -->
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->


                  <!-- end section -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <div class="modal fade" id="addSubjectSemesterExamandactivtyModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectSExamActivitiessModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSubjectSExamActivitiessModalLabel">{{__('language.addSubjectSubjectSExamActivitiesExamActivities')}}</h5>
                            <button SubjectSExamActivitiess="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-SubjectSExamActivitiess-form">
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.semesters_examandactivties')}}</label>
                                        <select id="subjectSExamActivitiess_examActivities" name="subjectSExamActivitiess_examActivities" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.subject')}}</label>
                                        <select id="subjectSExamActivitiess_subject" name="subjectSExamActivitiess_subject" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.mark')}}</label>
                                        <input type="text" class="form-control" id="SubjectSExamActivitiess_mark" name="SubjectSExamActivitiess_mark" required="">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button SubjectSExamActivitiess="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button SubjectSExamActivitiess="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateSubjectSemesterExamandactivtyModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectSExamActivitiessModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateSubjectSExamActivitiessModalLabel">{{__('language.updateSubjectSubjectSExamActivitiesExamActivities')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-SubjectSExamActivitiess-form">
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="SubjectSExamActivitiess_name_kr_update" name="SubjectSExamActivitiess_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="SubjectSExamActivitiess_name_ar_update" name="SubjectSExamActivitiess_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="SubjectSExamActivitiess_name_en_update" name="SubjectSExamActivitiess_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.mark')}}</label>
                                        <input type="number" class="form-control" id="SubjectSExamActivitiess_mark_update" name="SubjectSExamActivitiess_mark" required="">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.year')}}</label>
                                        <select id="SubjectSExamActivitiess_year_update" name="SubjectSExamActivitiess_year" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button SubjectSExamActivitiess="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button SubjectSExamActivitiess="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
        setSelection('#showStudentResultSubject_department', "", '/getDepartmentsAllData','departments')
        setSelection('#showStudentResultSubject_stage', "", '/getStageAllData','stage')
        create_student_show_result__datatable();



    </script>

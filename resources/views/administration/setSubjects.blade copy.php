@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{__('language.setSubjectTable')}}</h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addSetSubjectsModal">{{__('language.addSetSubject')}}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-setSubjects">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{__('language.subject')}} </th>
                                                    <th>{{__('language.department')}} </th>
                                                    <th>{{__('language.stage')}} </th>
                                                    <th>{{__('language.teacher')}} </th>
                                                    <th>{{__('language.action')}}</th>
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
            <div class="modal fade" id="addSetSubjectsModal" tabindex="-1" role="dialog" aria-labelledby="addsetSubjectsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addsetSubjectsModalLabel">{{__('language.addSetSubject')}}</h5>
                            <button setSubjects="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-setSubjects-form">                    
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.department')}}</label>
                                        <select id="setSubjects_department" name="setSubjects_department" class="form-control" required="" onchange="changeAndLoadSubjectsAdd()">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.stage')}}</label>
                                        <select id="setSubjects_stage" name="setSubjects_stage" class="form-control" required="" onchange="changeAndLoadSubjectsAdd()">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.teacher')}}</label>
                                        <select id="setSubjects_teacher" name="setSubjects_teacher" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.subject')}}</label>
                                        <select id="setSubjects_subject" name="setSubjects_subject" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button setSubjects="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button setSubjects="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateSetSubjectsModal" tabindex="-1" role="dialog" aria-labelledby="addsetSubjectsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatesetSubjectsModalLabel">{{__('language.updateSetSubject')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-setSubjects-form">
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.department')}}</label>
                                        <select id="setSubjects_department_update" name="setSubjects_department" class="form-control" required="" onchange="changeAndLoadSubjectsUpdate()">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.stage')}}</label>
                                        <select id="setSubjects_stage_update" name="setSubjects_stage" class="form-control" required="" onchange="changeAndLoadSubjectsUpdate()">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.teacher')}}</label>
                                        <select id="setSubjects_teacher_update" name="setSubjects_teacher" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.subject')}}</label>
                                        <select id="setSubjects_subject_update" name="setSubjects_subject" class="form-control" required="">
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>                                
                              
                                
                        </div>
                        <div class="modal-footer">
                            <button setSubjects="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button setSubjects="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
    create_setSubjects_datatable();
    setSelection('#setSubjects_department', "", '/getDepartmentsAllData','departments')
    setSelection('#setSubjects_stage', "", '/getStageAllData','stage')
    setSelection('#setSubjects_teacher', "", '/getTeachersAllData','teacher')
   
    </script>
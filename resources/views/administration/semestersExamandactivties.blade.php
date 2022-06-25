@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{__('language.semesters_examandactivtiesTable')}}</h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addSemestersExamandactivtiesModal">{{__('language.addSemesters_examandactivties')}}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-semestersExamandactivties">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{__('language.name_kr')}} </th>
                                                    <th>{{__('language.name_ar')}} </th>
                                                    <th>{{__('language.name_en')}} </th>
                                            
                                                    <th>{{__('language.semester')}} </th>
                                                   
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
            <div class="modal fade" id="addSemestersExamandactivtiesModal" tabindex="-1" role="dialog" aria-labelledby="addsemestersExamandactivtiesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addsemestersExamandactivtiesModalLabel">{{__('language.addSemesters_examandactivties')}}</h5>
                            <button semestersExamandactivties="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-semestersExamandactivties-form">
                               
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_kr" name="semestersExamandactivties_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;"> 
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_ar" name="semestersExamandactivties_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;"> 
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_en" name="semestersExamandactivties_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                               
                                
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.semester')}}</label>
                                        <select id="semestersExamandactivties_semester" name="semestersExamandactivties_semester" class="form-control" required="">
                                           
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button semestersExamandactivties="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button semestersExamandactivties="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateSemestersExamandactivtiesModal" tabindex="-1" role="dialog" aria-labelledby="addsemestersExamandactivtiesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatesemestersExamandactivtiesModalLabel">{{__('language.updateSemesters_examandactivties')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-semestersExamandactivties-form">
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_kr_update" name="semestersExamandactivties_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;"> 
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_ar_update" name="semestersExamandactivties_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;"> 
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="semestersExamandactivties_name_en_update" name="semestersExamandactivties_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                               

                                
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.semester')}}</label>
                                        <select id="semestersExamandactivties_semester_update" name="semestersExamandactivties_semester" class="form-control" required="">
                                           
                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button semestersExamandactivties="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button semestersExamandactivties="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
    create_semestersExamandactivties_datatable();
    setSelection('#semestersExamandactivties_semester', "", '/getSemestersData','semesters')
    </script>
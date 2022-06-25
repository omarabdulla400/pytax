@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{__('language.departmentTable')}}</h2>
                        <button departments="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addDepartmentsModal">{{__('language.addDepartment')}}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-departments">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{__('language.code')}} </th>
                                                    <th>{{__('language.name')}} </th>

                                                    <th>{{__('language.state')}} </th>

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
            <div class="modal fade" id="addDepartmentsModal" tabindex="-1" role="dialog" aria-labelledby="adddepartmentsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adddepartmentsModalLabel">{{__('language.addDepartment')}}</h5>
                            <button departments="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-departments-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.code')}}</label>
                                        <input type="text" class="form-control" id="departments_code" name="departments_code" required="">
                                        <div class="invalid-feedback"> {{__('language.codeRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="departments_name_kr" name="departments_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="departments_name_ar" name="departments_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="departments_name_en" name="departments_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.state')}}</label>
                                        <select id="departments_state" name="departments_state" class="form-control" required="">
                                            <option value="1" selected>{{__('language.active')}}</option>
                                            <option value="2"> {{__('language.unActive')}}</option>

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button departments="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button departments="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateDepartmentsModal" tabindex="-1" role="dialog" aria-labelledby="adddepartmentsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatedepartmentsModalLabel">{{__('language.updateDepartment')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-departments-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.code')}}</label>
                                        <input type="text" class="form-control" id="departments_code_update" name="departments_code" required="">
                                        <div class="invalid-feedback"> {{__('language.codeRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="departments_name_kr_update" name="departments_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="departments_name_ar_update" name="departments_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="departments_name_en_update" name="departments_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.state')}}</label>
                                        <select id="departments_state_update" name="departments_state" class="form-control" required="">
                                            <option value="1" selected>{{__('language.active')}}</option>
                                            <option value="2"> {{__('language.unActive')}}</option>

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button departments="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button departments="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
    create_departments_datatable();
    </script>

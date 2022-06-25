@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{__('language.covermentRoleTable')}}</h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addCovermentRolesModal">{{__('language.addCovermentRole')}}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-covermentRoles">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{__('language.number_role')}} </th>
                                                    <th>{{__('language.name')}} </th>
                                                    <th>{{__('language.semester')}} </th>
                                                    <th>{{__('language.mark')}} </th>
                                                    <th>{{__('language.ranges')}} </th>
                                                    <th>{{__('language.year')}} </th>

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
            <div class="modal fade" id="addCovermentRolesModal" tabindex="-1" role="dialog" aria-labelledby="addcovermentRolesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addcovermentRolesModalLabel">{{__('language.addCovermentRole')}}</h5>
                            <button covermentRoles="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-covermentRoles-form">

                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.number_role')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_number" name="covermentRoles_number" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_kr" name="covermentRoles_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_ar" name="covermentRoles_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_en" name="covermentRoles_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.semester')}}</label>
                                        <select id="covermentRoles_semester" name="covermentRoles_semester" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.mark')}}</label>
                                        <input type="number" class="form-control" id="covermentRoles_mark" name="covermentRoles_mark" required="" max="50" min="0">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.ranges')}}</label>
                                        <input type="number" class="form-control" id="covermentRoles_ranges" name="covermentRoles_ranges" required="" max="50" min="0">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.year')}}</label>
                                        <select id="covermentRoles_year" name="covermentRoles_year" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button covermentRoles="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button covermentRoles="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateCovermentRolesModal" tabindex="-1" role="dialog" aria-labelledby="addcovermentRolesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatecovermentRolesModalLabel">{{__('language.updateCovermentRole')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-covermentRoles-form">
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.number_role')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_number_update" name="covermentRoles_number" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_kr_update" name="covermentRoles_name_kr" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_ar_update" name="covermentRoles_name_ar" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.name_en')}}</label>
                                        <input type="text" class="form-control" id="covermentRoles_name_en_update" name="covermentRoles_name_en" required="">
                                        <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.semester')}}</label>
                                        <select id="covermentRoles_semester_update" name="covermentRoles_semester" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.mark')}}</label>
                                        <input type="number" class="form-control" id="covermentRoles_mark_update" name="covermentRoles_mark" required="" min="0" max="50">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{__('language.ranges')}}</label>
                                        <input type="number" class="form-control" id="covermentRoles_ranges_update" name="covermentRoles_ranges" required="" max="50" min="0">
                                        <div class="invalid-feedback"> {{__('language.markRequired')}}</div>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-3" >
                                        <label for="example-multiselect">{{__('language.year')}}</label>
                                        <select id="covermentRoles_year_update" name="covermentRoles_year" class="form-control" required="">

                                        </select>
                                        <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                        <div class="invalid-feedback"> {{__('language.selectOption')}}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button covermentRoles="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('language.close')}}</button>
                            <button covermentRoles="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
    create_covermentRoles_datatable();
    setSelection('#covermentRoles_year', "", '/getYears','year')
    setSelection('#covermentRoles_semester', "", '/getSemestersAllData','semesters')
    </script>

@include('components.header')

<body class="vertical  light   rtl">
<div class="wrapper">
    @include('components.navbar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">{{__('language.studyStatusTable')}}</h2>
                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addStudyStatussModal">{{__('language.addStudyStatus')}}</button>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-studyStatuss">
                                        <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>{{__('language.name')}} </th>
                                            <th>{{__('language.stop')}} </th>

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
        <div class="modal fade" id="addStudyStatussModal" tabindex="-1" role="dialog"
             aria-labelledby="addstudyStatussModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addstudyStatussModalLabel">{{__('language.addStudyStatus')}}</h5>
                        <button studyStatuss="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" id="add-studyStatuss-form">

                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_kr"
                                           name="studyStatuss_name_kr" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_ar"
                                           name="studyStatuss_name_ar" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_en')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_en"
                                           name="studyStatuss_name_en" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%; margin-left: 3%;margin-right: 3%;" >
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="studyStatuss_stop" name="studyStatuss_stop">
                                            <label class="form-check-label" for="gridCheck"> {{__('language.stop')}} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button studyStatuss="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{__('language.close')}}</button>
                        <button studyStatuss="submit" class="btn mb-2 btn-primary">{{__('language.add')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- update -->
        <div class="modal fade" id="updateStudyStatussModal" tabindex="-1" role="dialog"
             aria-labelledby="addstudyStatussModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="updatestudyStatussModalLabel">{{__('language.updateStudyStatus')}}</h5>
                        <button studyStatuss="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" id="update-studyStatuss-form">

                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_kr')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_kr_update"
                                           name="studyStatuss_name_kr" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_ar')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_ar_update"
                                           name="studyStatuss_name_ar" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{__('language.name_en')}}</label>
                                    <input type="text" class="form-control" id="studyStatuss_name_en_update"
                                           name="studyStatuss_name_en" required="">
                                    <div class="invalid-feedback"> {{__('language.nameRequired')}}</div>
                                    <div class="valid-feedback"> {{__('language.correctInfo')}} </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%; margin-left: 3%;margin-right: 3%;" >
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="studyStatuss_stop_update" name="studyStatuss_stop">
                                            <label class="form-check-label" for="gridCheck"> {{__('language.stop')}} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button studyStatuss="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{__('language.close')}}</button>
                        <button studyStatuss="submit" class="btn mb-2 btn-primary">{{__('language.update')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main> <!-- main -->
</div> <!-- .wrapper -->
@include('components.footer')
<script>
    create_studyStatuss_datatable();
</script>

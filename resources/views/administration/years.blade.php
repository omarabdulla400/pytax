@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.yearsTable') }}</h2>
                        <button educationYears="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addEducationYearsModal">{{ __('language.addYears') }}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-educationYears">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>{{ __('language.start') }} </th>
                                                    <th>{{ __('language.end') }} </th>
                                                    <th>{{ __('language.state') }} </th>
                                                  
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
            <div class="modal fade" id="addEducationYearsModal" tabindex="-1" role="dialog"
                aria-labelledby="addeducationYearsModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addeducationYearsModalLabel">{{ __('language.addYears') }}
                            </h5>
                            <button educationYears="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-educationYears-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.start') }}</label>
                                        <input type="number" class="form-control" id="educationYears_start"
                                            name="educationYears_start" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.end') }}</label>
                                        <input type="number" class="form-control" id="educationYears_end"
                                            name="educationYears_end" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3" style="margin-top: 1%;">
                                        <label for="example-multiselect">{{ __('language.state') }}</label>
                                        <select id="educationYears_state" name="educationYears_state"
                                            class="form-control" required="">
                                            <option value="1" selected>{{ __('language.active') }}</option>
                                            <option value="2"> {{ __('language.unActive') }}</option>
                                            <option value="3"> {{ __('language.archive') }}</option>
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button educationYears="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button educationYears="submit"
                                class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateEducationYearsModal" tabindex="-1" role="dialog"
                aria-labelledby="addeducationYearsModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateeducationYearsModalLabel">
                                {{ __('language.updateYears') }}</h5>
                            <button educationYears="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-educationYears-form">
                                <div class="form-row">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.start') }}</label>
                                        <input type="number" class="form-control" id="educationYears_start_update"
                                            name="educationYears_start" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.end') }}</label>
                                        <input type="number" class="form-control" id="educationYears_end_update"
                                            name="educationYears_end" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3" style="margin-top: 1%;">
                                        <label for="example-multiselect">{{ __('language.state') }}</label>
                                        <select id="educationYears_state_update" name="educationYears_state"
                                            class="form-control" required="">
                                            <option value="1">{{ __('language.active') }}</option>
                                            <option value="2"> {{ __('language.unActive') }}</option>
                                            <option value="3"> {{ __('language.archive') }}</option>
                                        </select>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                        <div class="invalid-feedback"> {{ __('language.selectOption') }}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button educationYears="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button educationYears="submit"
                                class="btn mb-2 btn-primary">{{ __('language.update') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('components.footer')
    <script>
     
        create_educationYears_datatable();
    </script>

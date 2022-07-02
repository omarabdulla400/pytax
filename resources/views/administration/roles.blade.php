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
                                            <h5>{{ __('language.rolesTable') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <button type="button" class="btn btn-primary has-ripple"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#addRolesModal">{{ __('language.add') }}<span
                                                                    class="ripple ripple-animate"
                                                                    style="height: 174.078px; width: 174.078px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -67.2185px; left: 16.969px;"></span></button>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="dataTable-roles"
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
                                                                            {{ __('language.name') }}</th>

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
    <div id="addRolesModal" class="modal fade" tabindex="-1" aria-labelledby="addRolesModal1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.addRoles') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="add-roles-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_kr') }}</label>
                                    <input type="text" class="form-control" name="roles_name_kr" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_ar') }}</label>
                                    <input type="text" class="form-control" name="roles_name_ar" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_en') }}</label>
                                    <input type="text" class="form-control" name="roles_name_en" required>
                                </div>
                            </div>

                        </div>

                        @foreach ($roleNames as $item)
                            <div class="form-row" style="margin-top: 3%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{ $item->name_kr }}</label>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%; margin-left: 3%;margin-right: 3%;">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_view_id_{{ $item->id }}"
                                                name="roles_view_id_{{ $item->id }}">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.view') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_add_id_{{ $item->id }}"
                                                name="roles_add_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.add') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_update_id_{{ $item->id }}"
                                                name="roles_update_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.update') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_filter_id_{{ $item->id }}"
                                                name="roles_filter_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.filter') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_extract_id_{{ $item->id }}"
                                                name="roles_extract_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.extract') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_delete_id_{{ $item->id }}"
                                                name="roles_delete_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.delete') }} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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


    <div id="updateRolesModal" class="modal fade" tabindex="-1" aria-labelledby="addRolesModal1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('language.updateRoles') }}</h5>

                </div>
                <div class="modal-body">
                    <form id="update-roles-form" class="needs-validation was-validated">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_kr') }}</label>
                                    <input type="text" class="form-control" name="roles_name_kr" required
                                        id="roles_name_kr_update">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_ar') }}</label>
                                    <input type="text" class="form-control" name="roles_name_ar" required
                                        id="roles_name_ar_update">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <label class="form-label">{{ __('language.name_en') }}</label>
                                    <input type="text" class="form-control" name="roles_name_en" required
                                        id="roles_name_en_update">
                                </div>
                            </div>

                        </div>
                        @foreach ($roleNames as $item)
                            <div class="form-row" style="margin-top: 3%;">
                                <div class="col-md-12 mb-6">
                                    <label for="validationCustom01">{{ $item->name_kr }}</label>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 1%; margin-left: 3%;margin-right: 3%;">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_view_id_{{ $item->id }}_update"
                                                name="roles_view_id_{{ $item->id }}">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.view') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_add_id_{{ $item->id }}_update"
                                                name="roles_add_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.add') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_update_id_{{ $item->id }}_update"
                                                name="roles_update_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.update') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_filter_id_{{ $item->id }}_update"
                                                name="roles_filter_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.filter') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_extract_id_{{ $item->id }}_update"
                                                name="roles_extract_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.extract') }} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="roles_delete_id_{{ $item->id }}_update"
                                                name="roles_delete_id_{{ $item->id }}" value="1">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ __('language.delete') }} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        create_roles_datatable();
    </script>

</body>

</html>

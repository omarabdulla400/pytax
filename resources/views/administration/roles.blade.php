@include('components.header')

<body class="vertical  light   rtl">
    <div class="wrapper">
        @include('components.navbar')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">{{ __('language.rolesTable') }}</h2>
                        <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                            data-target="#addRolesModal">{{ __('language.addRoles') }}</button>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table datatables" id="dataTable-roles">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
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
            </div> <!-- .container-fluid -->
            <div class="modal fade" id="addRolesModal" tabindex="-1" role="dialog"
                aria-labelledby="addrolesModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addrolesModalLabel">{{ __('language.addRoles') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="add-roles-form">

                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="roles_name_kr"
                                            name="roles_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="roles_name_ar"
                                            name="roles_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="roles_name_en"
                                            name="roles_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
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
                            <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button roles="submit" class="btn mb-2 btn-primary">{{ __('language.add') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- update -->
            <div class="modal fade" id="updateRolesModal" tabindex="-1" role="dialog"
                aria-labelledby="addrolesModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updaterolesModalLabel">{{ __('language.updateRoles') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" id="update-roles-form">

                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_kr') }}</label>
                                        <input type="text" class="form-control" id="roles_name_kr_update"
                                            name="roles_name_kr" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_ar') }}</label>
                                        <input type="text" class="form-control" id="roles_name_ar_update"
                                            name="roles_name_ar" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: 1%;">
                                    <div class="col-md-12 mb-6">
                                        <label for="validationCustom01">{{ __('language.name_en') }}</label>
                                        <input type="text" class="form-control" id="roles_name_en_update"
                                            name="roles_name_en" required="">
                                        <div class="invalid-feedback"> {{ __('language.nameRequired') }}</div>
                                        <div class="valid-feedback"> {{ __('language.correctInfo') }} </div>
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
                            <button type="button" class="btn mb-2 btn-secondary"
                                data-dismiss="modal">{{ __('language.close') }}</button>
                            <button roles="submit"
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
        create_roles_datatable();
    </script>

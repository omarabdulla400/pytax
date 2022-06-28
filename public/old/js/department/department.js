var departmentsID = ''
function create_departments_datatable() {
  $('#dataTable-departments').DataTable().destroy()
  $('#dataTable-departments').DataTable({
    lengthMenu: [
      [16, 32, 64, -1],
      [16, 32, 64, 'All'],
    ],
    responsive: true,
    language: {
      search: '_INPUT_',
      searchPlaceholder: 'گەڕان بەناو تۆمارەکان',
      emptyTable: 'زانیاری نەدۆزیەوە',
      sLengthMenu: 'پیشاندان _MENU_ ',
      info: 'پیشاندانی _START_ بۆ _END_ لە _TOTAL_ تۆمار',
      paginate: {
        first: 'یەکەم',
        last: 'کۆتا',
        previous: 'پێشوو',
        next: 'دواتر',
      },
    },
    ajax: {
      url: '/getDepartments',
      method: 'GET',
    },
  })
}
$('#add-departments-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encdepartments: 'multipart/form-data',
    url: '/storeDepartments',
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    add_data_notification(data)
    $('#addDepartmentsModal').modal('hide')
    create_departments_datatable()
  })
})
function departmentsEdit(id) {
  departmentsID = id
  $.ajax({
    url: '/getDepartmentsData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('departments_code_update').value = obj['code']
    document.getElementById('departments_name_kr_update').value = obj['name_kr']
    document.getElementById('departments_name_ar_update').value = obj['name_ar']
    document.getElementById('departments_name_en_update').value = obj['name_en']
    document.getElementById('departments_state_update').value = obj['state']
    $('#updateDepartmentsModal').modal('show')
  })
}
function departmentsRemove(id) {
  Swal.fire({
    title: 'ئایا دڵنیایت',
    text: 'ناتوانێت ئەم زانیاریە بگەڕێنیتەوە!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'بەڵی بیسڕەوە',
    cancelButtonText: 'داختسن',
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/destroyDepartments',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_departments_datatable()
      })
    }
  })
}

$('#update-departments-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-departments-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', departmentsID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/updateDepartments',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateDepartmentsModal').modal('hide')
      update_data_notification(data)
      create_departments_datatable()
    })
  }
})

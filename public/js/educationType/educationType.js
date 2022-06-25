var educationTypesID = ''
function create_educationTypes_datatable() {
  $('#dataTable-educationTypes').DataTable().destroy()
  $('#dataTable-educationTypes').DataTable({
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
      url: '/getEducationTypes',
      method: 'GET',
    },
  })
}
$('#add-educationTypes-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    enceducationTypes: 'multipart/form-data',
    url: '/storeEducationTypes',
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
    $('#addEducationTypesModal').modal('hide')
    create_educationTypes_datatable()
  })
})
function educationTypesEdit(id) {
  educationTypesID = id
  $.ajax({
    url: '/getEducationTypesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('educationTypes_name_kr_update').value = obj['name_kr']
    document.getElementById('educationTypes_name_ar_update').value = obj['name_ar']
    document.getElementById('educationTypes_name_en_update').value = obj['name_en']

    $('#updateEducationTypesModal').modal('show')
  })
}
function educationTypesRemove(id) {
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
        url: '/destroyEducationTypes',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_educationTypes_datatable()
      })
    }
  })
}

$('#update-educationTypes-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-educationTypes-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', educationTypesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      enceducationTypes: 'multipart/form-data',
      url: '/updateEducationTypes',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateEducationTypesModal').modal('hide')
      update_data_notification(data)
      create_educationTypes_datatable()
    })
  }
})

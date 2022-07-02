var educationLevelsID = ''
function create_educationLevels_datatable() {
  $('#dataTable-educationLevels').DataTable().destroy()
  $('#dataTable-educationLevels').DataTable({
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
      url: '/getEducationLevels',
      method: 'GET',
    },
  })
}
$('#add-educationLevels-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    enceducationLevels: 'multipart/form-data',
    url: '/storeEducationLevels',
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
    $('#addEducationLevelsModal').modal('hide')
    create_educationLevels_datatable()
  })
})
function educationLevelsEdit(id) {
  educationLevelsID = id
  $.ajax({
    url: '/getEducationLevelsData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('educationLevels_name_kr_update').value = obj['name_kr']
    document.getElementById('educationLevels_name_ar_update').value = obj['name_ar']
    document.getElementById('educationLevels_name_en_update').value = obj['name_en']

    $('#updateEducationLevelsModal').modal('show')
  })
}
function educationLevelsRemove(id) {
  swal({
    title: 'ئایا دڵنیایت',
    text: 'ناتوانێت ئەم زانیاریە بگەڕێنیتەوە!',
    icon: 'warning',
    showCancelButton: true,
    buttons: ['داختسن', 'بەڵی بیسڕەوە'],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/destroyEducationLevels',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_educationLevels_datatable()
      })
    }
  })
}

$('#update-educationLevels-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-educationLevels-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', educationLevelsID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      enceducationLevels: 'multipart/form-data',
      url: '/updateEducationLevels',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateEducationLevelsModal').modal('hide')
      update_data_notification(data)
      create_educationLevels_datatable()
    })
  }
})

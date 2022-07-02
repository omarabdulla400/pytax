var studyTypesID = ''
function create_studyTypes_datatable() {
  $('#dataTable-studyTypes').DataTable().destroy()
  $('#dataTable-studyTypes').DataTable({
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
      url: '/getStudyTypes',
      method: 'GET',
    },
  })
}
$('#add-studyTypes-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encstudyTypes: 'multipart/form-data',
    url: '/storeStudyTypes',
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
    $('#addStudyTypesModal').modal('hide')
    create_studyTypes_datatable()
  })
})
function studyTypesEdit(id) {
  studyTypesID = id
  $.ajax({
    url: '/getStudyTypesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('studyTypes_name_kr_update').value = obj['name_kr']
    document.getElementById('studyTypes_name_ar_update').value = obj['name_ar']
    document.getElementById('studyTypes_name_en_update').value = obj['name_en']

    $('#updateStudyTypesModal').modal('show')
  })
}
function studyTypesRemove(id) {
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
        url: '/destroyStudyTypes',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_studyTypes_datatable()
      })
    }
  })
}

$('#update-studyTypes-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-studyTypes-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', studyTypesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encstudyTypes: 'multipart/form-data',
      url: '/updateStudyTypes',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateStudyTypesModal').modal('hide')
      update_data_notification(data)
      create_studyTypes_datatable()
    })
  }
})

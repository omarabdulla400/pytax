var semestersExamandactivtiesID = ''
function create_semestersExamandactivties_datatable() {
  $('#dataTable-semestersExamandactivties').DataTable().destroy()
  $('#dataTable-semestersExamandactivties').DataTable({
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
      url: '/getSemestersExamandactivties',
      method: 'GET',
    },
  })
}
$('#add-semestersExamandactivties-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encsemestersExamandactivties: 'multipart/form-data',
    url: '/storeSemestersExamandactivties',
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
    $('#addSemestersExamandactivtiesModal').modal('hide')
    create_semestersExamandactivties_datatable()
  })
})
function semestersExamandactivtiesEdit(id) {
  semestersExamandactivtiesID = id
  $.ajax({
    url: '/getSemestersExamandactivtiesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('semestersExamandactivties_name_kr_update').value = obj['name_kr']
    document.getElementById('semestersExamandactivties_name_ar_update').value = obj['name_ar']
    document.getElementById('semestersExamandactivties_name_en_update').value = obj['name_en']
    setSelection('#semestersExamandactivties_semester_update',  obj['semester'], '/getSemestersData','semesters')
    $('#updateSemestersExamandactivtiesModal').modal('show')
  })
}
function semestersExamandactivtiesRemove(id) {
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
        url: '/destroySemestersExamandactivties',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_semestersExamandactivties_datatable()
      })
    }
  })
}

$('#update-semestersExamandactivties-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-semestersExamandactivties-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', semestersExamandactivtiesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encsemestersExamandactivties: 'multipart/form-data',
      url: '/updateSemestersExamandactivties',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateSemestersExamandactivtiesModal').modal('hide')
      update_data_notification(data)
      create_semestersExamandactivties_datatable()
    })
  }
})

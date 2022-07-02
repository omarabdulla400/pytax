var subjectSemesterExamandactivtyID = ''
function create_subjectSemesterExamandactivty_datatable() {
  $('#dataTable-subjectSemesterExamandactivty').DataTable().destroy()
  $('#dataTable-subjectSemesterExamandactivty').DataTable({
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
      url: '/getSubjectSemesterExamandactivty',
      method: 'GET',
    },
  })
}
$('#add-SubjectSExamActivitiess-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encsubjectSemesterExamandactivty: 'multipart/form-data',
    url: '/storeSubjectSemesterExamandactivty',
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
    $('#addSubjectSemesterExamandactivtyModal').modal('hide')
    create_subjectSemesterExamandactivty_datatable()
  })
})
function subjectSemesterExamandactivtyEdit(id) {
  subjectSemesterExamandactivtyID = id
  $.ajax({
    url: '/getSubjectSemesterExamandactivtyData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('subjectSemesterExamandactivty_name_kr_update').value = obj['name_kr']
    document.getElementById('subjectSemesterExamandactivty_name_ar_update').value = obj['name_ar']
    document.getElementById('subjectSemesterExamandactivty_name_en_update').value = obj['name_en']
    setSelection('#subjectSemesterExamandactivty_semester_update',  obj['semester'], '/getSemestersData','semesters')
    $('#updateSubjectSemesterExamandactivtyModal').modal('show')
  })
}
function subjectSemesterExamandactivtyRemove(id) {
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
        url: '/destroySubjectSemesterExamandactivty',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_subjectSemesterExamandactivty_datatable()
      })
    }
  })
}

$('#update-SubjectSExamActivitiess-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-subjectSemesterExamandactivty-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', subjectSemesterExamandactivtyID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encsubjectSemesterExamandactivty: 'multipart/form-data',
      url: '/updateSubjectSemesterExamandactivty',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateSubjectSemesterExamandactivtyModal').modal('hide')
      update_data_notification(data)
      create_subjectSemesterExamandactivty_datatable()
    })
  }
})

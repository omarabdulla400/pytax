var setSubjectsID = ''
function create_setSubjects_datatable() {
  $('#dataTable-setSubjects').DataTable().destroy()
  $('#dataTable-setSubjects').DataTable({
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
      url: '/getSetSubjects',
      method: 'GET',
    },
  })
}
$('#add-setSubjects-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encsetSubjects: 'multipart/form-data',
    url: '/storeSetSubjects',
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
    $('#addSetSubjectsModal').modal('hide')
    create_setSubjects_datatable()
  })
})
function setSubjectsEdit(id) {
  setSubjectsID = id
  $.ajax({
    url: '/getSetSubjectsData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    setSelection(
      '#setSubjects_teacher_update',
      obj['teacher'],
      '/getTeachersAllData',
      'teacher',
    )

    setSelection(
      '#setSubjects_department_update',
      '',
      '/getDepartmentsAllData',
      'departments',
    )
    setSelection('#setSubjects_stage_update', '', '/getStageAllData', 'stage')
    $('#updateSetSubjectsModal').modal('show')
  })
}
function setSubjectsRemove(id) {
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
        url: '/destroySetSubjects',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_setSubjects_datatable()
      })
    }
  })
}

$('#update-setSubjects-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-setSubjects-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', setSubjectsID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encsetSubjects: 'multipart/form-data',
      url: '/updateSetSubjects',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateSetSubjectsModal').modal('hide')
      update_data_notification(data)
      create_setSubjects_datatable()
    })
  }
})

function changeAndLoadSubjectsAdd() {
  var department = document.getElementById('setSubjects_department').value
  var stage = document.getElementById('setSubjects_stage').value
  if (department != '' && stage != '') {
    setSelectionForSubjectSte(
      '#setSubjects_subject',
      '',
      '/getSubjectsAllDataByDepartmentsAndStages',
      department,
      stage,
    )
  }
}

function changeAndLoadSubjectsUpdate() {
  var department = document.getElementById('setSubjects_department_update')
    .value
  var stage = document.getElementById('setSubjects_stage_update').value
  if (department != '' && stage != '') {
    setSelectionForSubjectSte(
      '#setSubjects_subject_update',
      '',
      '/getSubjectsAllDataByDepartmentsAndStages',
      department,
      stage,
    )
  }
}

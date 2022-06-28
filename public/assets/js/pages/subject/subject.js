var subjectsID = ''
function create_subjects_datatable() {
  $('#dataTable-subjects').DataTable().destroy()
  $('#dataTable-subjects').DataTable({
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
      url: '/getSubjects',
      method: 'GET',
    },
  })
}

function create_subjects_and_departments_datatable() {
  $('#dataTable-subjects-departments').DataTable().destroy()
  $('#dataTable-subjects-departments').DataTable({
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
      url: '/getSubjectsAndDepartments',
      method: 'GET',
    },
  })
}
$('#add-subjects-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var multiSelectDepartments = $(this)
    .find('select[name="subjects_multiSelectDepartments"]')
    .val()
  var data = new FormData(form)
  data.append('multiSelectDepartments', JSON.stringify(multiSelectDepartments))
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encsubjects: 'multipart/form-data',
    url: '/storeSubjects',
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
    $('#addSubjectsModal').modal('hide')
    create_subjects_datatable()
    create_subjects_and_departments_datatable()
    setSelection(
      '#multi-select-subjects',
      '',
      '/getSubjectsAllData',
      'subjects',
    )
  })
})

$('#set-subjects-form').submit(function (event) {
  event.preventDefault()
  var subjectStage_practice = document.getElementById('subjectStage_practice_1')
    .value
  var subjectStage_theory = document.getElementById('subjectStage_theory_1')
    .value
    var subjectStage_educationType = document.getElementById('subjectStage_educationType_1')
    .value
  var multiSelectSubjects = $(this)
    .find('select[name="multiSelectSubjects"]')
    .val()
  var multiSelectDepartments = $(this)
    .find('select[name="multiSelectDepartments"]')
    .val()
  var stage = $(this).find('select[name="subjectStage"]').val()
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    url: '/storeSubjectsAndDepartments',
    data: {
      subjectStage_theory:subjectStage_theory,
      subjectStage_practice: subjectStage_practice,
      multiSelectSubjects: multiSelectSubjects,
      multiSelectDepartments: multiSelectDepartments,
      stage: stage,
      subjectStage_educationType:subjectStage_educationType
    },
    cache: false,
    timeout: 600000,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    add_data_notification(data)

    create_subjects_and_departments_datatable()
  })
})
function subjectsEdit(id) {
  subjectsID = id
  $.ajax({
    url: '/getSubjectsData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('subjects_code_update').value = obj['code']
    document.getElementById('subjects_name_kr_update').value = obj['name_kr']
    document.getElementById('subjects_name_ar_update').value = obj['name_ar']
    document.getElementById('subjects_name_en_update').value = obj['name_en']
    $('#updateSubjectsModal').modal('show')
  })
}
function subjectsRemove(id) {
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
        url: '/destroySubjects',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_subjects_datatable()
        setSelection(
          '#multi-select-subjects',
          '',
          '/getSubjectsAllData',
          'subjects',
        )
      })
    }
  })
}

$('#update-subjects-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-subjects-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', subjectsID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encsubjects: 'multipart/form-data',
      url: '/updateSubjects',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateSubjectsModal').modal('hide')
      update_data_notification(data)
      create_subjects_datatable()
      setSelection(
        '#multi-select-subjects',
        '',
        '/getSubjectsAllData',
        'subjects',
      )
      create_subjects_and_departments_datatable()
    })
  }
})

function subjectsAndDepartmentsRemove(id) {
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
        url: '/destroySubjectsAndDepartmentsController',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        create_subjects_and_departments_datatable()
      })
    }
  })
}

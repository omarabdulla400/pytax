var covermentRolesID = ''
function create_covermentRoles_datatable() {
  $('#dataTable-covermentRoles').DataTable().destroy()
  $('#dataTable-covermentRoles').DataTable({
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
      url: '/getCovermentRoles',
      method: 'GET',
    },
  })
}
$('#add-covermentRoles-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    enccovermentRoles: 'multipart/form-data',
    url: '/storeCovermentRoles',
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
    $('#addCovermentRolesModal').modal('hide')
    create_covermentRoles_datatable()
  })
})
function covermentRolesEdit(id) {
  covermentRolesID = id
  $.ajax({
    url: '/getCovermentRolesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('covermentRoles_mark_update').value = obj['mark']
      document.getElementById('covermentRoles_ranges_update').value = obj['ranges']
    document.getElementById('covermentRoles_number_update').value = obj['number']
    document.getElementById('covermentRoles_name_kr_update').value = obj['name_kr']
    document.getElementById('covermentRoles_name_ar_update').value = obj['name_ar']
    document.getElementById('covermentRoles_name_en_update').value = obj['name_en']
    setSelection('#covermentRoles_semester_update', obj['semester'], '/getSemestersAllData','semesters')
    setSelection('#covermentRoles_year_update',  obj['year'], '/getYears','year')
    $('#updateCovermentRolesModal').modal('show')
  })
}
function covermentRolesRemove(id) {
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
        url: '/destroyCovermentRoles',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_covermentRoles_datatable()
      })
    }
  })
}

$('#update-covermentRoles-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-covermentRoles-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', covermentRolesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      enccovermentRoles: 'multipart/form-data',
      url: '/updateCovermentRoles',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateCovermentRolesModal').modal('hide')
      update_data_notification(data)
      create_covermentRoles_datatable()
    })
  }
})

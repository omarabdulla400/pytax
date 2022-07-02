var roleNamesID = ''
function create_roleNames_datatable() {
  $('#dataTable-roleNames').DataTable().destroy()
  $('#dataTable-roleNames').DataTable({
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
      url: '/getRoleNames',
      method: 'GET',
    },
  })
}
$('#add-roleNames-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encroleNames: 'multipart/form-data',
    url: '/storeRoleNames',
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
    $('#addRoleNamesModal').modal('hide')
    create_roleNames_datatable()
  })
})
function roleNamesEdit(id) {
  roleNamesID = id
  $.ajax({
    url: '/getRoleNamesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('roleNames_name_kr_update').value = obj['name_kr']
    document.getElementById('roleNames_name_ar_update').value = obj['name_ar']
    document.getElementById('roleNames_name_en_update').value = obj['name_en']
    // document.getElementById('roleNames_view_update').checked = obj['viewData']
    // document.getElementById('roleNames_add_update').checked = obj['addData']
    // document.getElementById('roleNames_update_update').checked = obj['updateData']
    // document.getElementById('roleNames_filter_update').checked = obj['filterData']
    // document.getElementById('roleNames_extract_update').checked = obj['extractData']
    // document.getElementById('roleNames_delete_update').checked = obj['deleteData']

    $('#updateRoleNamesModal').modal('show')
  })
}
function roleNamesRemove(id) {
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
        url: '/destroyRoleNames',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_roleNames_datatable()
      })
    }
  })
}

$('#update-roleNames-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-roleNames-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', roleNamesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encroleNames: 'multipart/form-data',
      url: '/updateRoleNames',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateRoleNamesModal').modal('hide')
      update_data_notification(data)
      create_roleNames_datatable()
    })
  }
})

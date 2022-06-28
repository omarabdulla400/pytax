var rolesID = ''
function create_roles_datatable() {
  $('#dataTable-roles').DataTable().destroy()
  $('#dataTable-roles').DataTable({
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
      url: '/getRoles',
      method: 'GET',
    },
  })
}

function rolesRemove(id) {
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
        url: '/destroyRoles',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_roles_datatable()
      })
    }
  })
}

$('#add-roles-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#add-roles-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/storeRole',
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
      $('#addRolesModal').modal('hide')
      create_roles_datatable()
    })
  }
})


function rolesEdit(id) {
  rolesID = id
  $.ajax({
    url: '/getSingleRole',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('role_name_kr_update').value = obj['name_kr']
    document.getElementById('role_name_ar_update').value = obj['name_ar']
    document.getElementById('role_name_en_update').value = obj['name_en']
    $('#updateRolesModal').modal('show')
  })
}


$('#update-roles-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-roles-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', rolesID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encroles: 'multipart/form-data',
      url: '/updateRoles',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateRolesModal').modal('hide')
      update_data_notification(data)
      create_roles_datatable()
    })
  }
})
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
$('#add-roles-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encroles: 'multipart/form-data',
    url: '/storeRoles',
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
})
function rolesEdit(id) {
  rolesID = id
  $.ajax({
    url: '/getRolesData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    var roles = JSON.parse(obj['roles'])
    var roleItems = JSON.parse(obj['roleItems'])
    document.getElementById('roles_name_kr_update').value = roles['name_kr']
    document.getElementById('roles_name_ar_update').value = roles['name_ar']
    document.getElementById('roles_name_en_update').value = roles['name_en']

    roleItems.forEach((element) => {
     
      if (document.getElementById(`roles_view_id_${element['roleName']}_update`)) {
        if(element['viewData'] ==true){
          document.getElementById(
            `roles_view_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
      if (document.getElementById(`roles_add_id_${element['roleName']}_update`)) {
        if(element['addData'] ==true){
          document.getElementById(
            `roles_add_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
      if (document.getElementById(`roles_update_id_${element['roleName']}_update`)) {
        if(element['updateData'] ==true){
          document.getElementById(
            `roles_update_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
      if (document.getElementById(`roles_filter_id_${element['roleName']}_update`)) {
        if(element['filterData'] ==true){
          document.getElementById(
            `roles_filter_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
      if (document.getElementById(`roles_extract_id_${element['roleName']}_update`)) {
        if(element['extractData'] ==true){
          document.getElementById(
            `roles_extract_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
      if (document.getElementById(`roles_delete_id_${element['roleName']}_update`)) {
        if(element['deleteData'] ==true){
          document.getElementById(
            `roles_delete_id_${element['roleName']}_update`,
          ).checked = true
        }
      }
    })

    $('#updateRolesModal').modal('show')
  })
}
function rolesRemove(id) {
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
function stopCheck() {
  alert('sds')
  if (document.getElementById('myCheck').checked) {
    document.getElementById('roles_stop_update').checked = false
  } else {
    document.getElementById('roles_stop_update').checked = true
  }
}

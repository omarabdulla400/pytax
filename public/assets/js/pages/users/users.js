var usersID = ''
var oldPassword = ''
function create_users_datatable() {
  $('#dataTable-users').DataTable().destroy()
  $('#dataTable-users').DataTable({
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
      url: '/getUsers',
      method: 'GET',
    },
  })
}

function usersRemove(id) {
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
        url: '/destroyUsers',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_users_datatable()
      })
    }
  })
}

$('#add-users-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#add-users-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/storeUsers',
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
      $('#addUsersModal').modal('hide')
      create_users_datatable()
    })
  }
})


function usersEdit(id) {
  usersID = id
  $.ajax({
    url: '/getSingleUser',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('user_name_update').value = obj['name']
    document.getElementById('user_phone_update').value = obj['phone']
    document.getElementById('user_email_update').value = obj['email']
    document.getElementById('user_password_update').value = obj['password']
    oldPassword = obj['password']
    document.getElementById('user_customer_update').value = obj['customer']
    document.getElementById('user_roleGroup_update').value = obj['roleGroup']
    $('#updateUsersModal').modal('show')
  })
}


$('#update-users-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-users-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', usersID)
    data.append('user_oldPassword',oldPassword)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encusers: 'multipart/form-data',
      url: '/updateUsers',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateUsersModal').modal('hide')
      update_data_notification(data)
      create_users_datatable()
    })
  }
})
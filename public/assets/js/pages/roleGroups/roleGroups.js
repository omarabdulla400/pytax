var roleGroupsID = ''
function create_roleGroups_datatable() {
  $('#dataTable-roleGroups').DataTable().destroy()
  $('#dataTable-roleGroups').DataTable({
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
      url: '/getRoleGroups',
      method: 'GET',
    },
  })
}

function roleGroupsRemove(id) {
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
        url: '/destroyRoleGroups',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_roleGroups_datatable()
      })
    }
  })
}

$('#add-roleGroups-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#add-roleGroups-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/storeRoleGroups',
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
      $('#addRoleGroupsModal').modal('hide')
      create_roleGroups_datatable()
    })
  }
})


function roleGroupsEdit(id) {
  roleGroupsID = id
  $.ajax({
    url: '/getSingleRoleGroup',
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
    var roles =  JSON.parse(obj['roles'])
    var roleSet =  JSON.parse(obj['roleSet'])

    roles.forEach(element => {
      if( document.getElementById(`roleGroup_id_${element['id']}_update`)){
    
        document.getElementById(`roleGroup_id_${element['id']}_update`).checked= false;
    }
    });
    roleSet.forEach(element => {
      if( document.getElementById(`roleGroup_id_${element['role']}_update`)){
    
        document.getElementById(`roleGroup_id_${element['role']}_update`).checked= true;
    }
    });
    $('#updateRoleGroupsModal').modal('show')
  })
}


$('#update-roleGroups-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-roleGroups-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', roleGroupsID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encroleGroups: 'multipart/form-data',
      url: '/updateRoleGroups',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateRoleGroupsModal').modal('hide')
      update_data_notification(data)
      create_roleGroups_datatable()
    })
  }
})
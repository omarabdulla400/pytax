var customerBlockSchedulesID = ''
var oldDay = ''
function create_customerBlockSchedules_datatable() {
  $('#dataTable-customerBlockSchedules').DataTable().destroy()
  $('#dataTable-customerBlockSchedules').DataTable({
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
      url: '/getCustomerBlockSchedules',
      method: 'GET',
    },
  })
}

function customerBlockSchedulesRemove(id) {
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
        url: '/destroyCustomerBlockSchedules',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_customerBlockSchedules_datatable()
      })
    }
  })
}

$('#add-customerBlockSchedules-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#add-customerBlockSchedules-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/storeCustomerBlockSchedules',
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
      $('#addCustomerBlockSchedulesModal').modal('hide')
      create_customerBlockSchedules_datatable()
    })
  }
})


function customerBlockSchedulesEdit(id) {
  customerBlockSchedulesID = id
  $.ajax({
    url: '/getSingleCustomerBlockSchedule',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    oldDay = obj['day']
    document.getElementById('customerBlockSchedule_customer_update').value = obj['customer']
    document.getElementById('customerBlockSchedule_day_update').value = obj['day']
    document.getElementById('customerBlockSchedule_blockfrom_update').value = obj['blockfrom']
    document.getElementById('customerBlockSchedule_blockto_update').value = obj['blockto']
    $('#updateCustomerBlockSchedulesModal').modal('show')
  })
}


$('#update-customerBlockSchedules-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-customerBlockSchedules-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', customerBlockSchedulesID)
    data.append('customerBlockSchedule_oldDay',oldDay)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      enccustomerBlockSchedules: 'multipart/form-data',
      url: '/updateCustomerBlockSchedules',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateCustomerBlockSchedulesModal').modal('hide')
      update_data_notification(data)
      create_customerBlockSchedules_datatable()
    })
  }
})
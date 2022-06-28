var customersID = ''
function create_customers_datatable() {
  $('#dataTable-customers').DataTable().destroy()
  $('#dataTable-customers').DataTable({
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
      url: '/getCustomers',
      method: 'GET',
    },
  })
}

function customersRemove(id) {
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
        url: '/destroyCustomers',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_customers_datatable()
      })
    }
  })
}

$('#add-customers-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#add-customers-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/storeCustomers',
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
      $('#addCustomersModal').modal('hide')
      create_customers_datatable()
    })
  }
})


function customersEdit(id) {
  customersID = id
  $.ajax({
    url: '/getSingleCustomer',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    document.getElementById('customer_name_kr_update').value = obj['name_kr']
    document.getElementById('customer_name_ar_update').value = obj['name_ar']
    document.getElementById('customer_name_en_update').value = obj['name_en']
    document.getElementById('customer_i_customer_update').value = obj['i_customer']
    $('#updateCustomersModal').modal('show')
  })
}


$('#update-customers-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-customers-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', customersID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      enccustomers: 'multipart/form-data',
      url: '/updateCustomers',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateCustomersModal').modal('hide')
      update_data_notification(data)
      create_customers_datatable()
    })
  }
})
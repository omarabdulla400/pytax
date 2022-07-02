var studyStatussID = ''
function create_studyStatuss_datatable() {
  $('#dataTable-studyStatuss').DataTable().destroy()
  $('#dataTable-studyStatuss').DataTable({
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
      url: '/getStudyStatuss',
      method: 'GET',
    },
  })
}
$('#add-studyStatuss-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  $.ajax({
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    encstudyStatuss: 'multipart/form-data',
    url: '/storeStudyStatuss',
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
    $('#addStudyStatussModal').modal('hide')
    create_studyStatuss_datatable()
  })
})
function studyStatussEdit(id) {
  studyStatussID = id
  $.ajax({
    url: '/getStudyStatussData',
    method: 'GET',
    data: { id: id },
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)

    document.getElementById('studyStatuss_name_kr_update').value = obj['name_kr']
    document.getElementById('studyStatuss_name_ar_update').value = obj['name_ar']
    document.getElementById('studyStatuss_name_en_update').value = obj['name_en']
      if(obj['stop']){
          document.getElementById("studyStatuss_stop_update").checked = true;
      }


    $('#updateStudyStatussModal').modal('show')
  })
}
function studyStatussRemove(id) {
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
        url: '/destroyStudyStatuss',
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_studyStatuss_datatable()
      })
    }
  })
}

$('#update-studyStatuss-form').submit(function (event) {
  event.preventDefault()
  if ($('#update-studyStatuss-form').valid()) {
    var form = $(this)[0]
    var data = new FormData(form)
    data.append('id', studyStatussID)
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encstudyStatuss: 'multipart/form-data',
      url: '/updateStudyStatuss',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      $('#updateStudyStatussModal').modal('hide')
      update_data_notification(data)
      create_studyStatuss_datatable()
    })
  }
})
function stopCheck() {
    alert("sds")
    if(document.getElementById("myCheck").checked ){
        document.getElementById("studyStatuss_stop_update").checked = false;
    }else{
        document.getElementById("studyStatuss_stop_update").checked = true;
    }

}


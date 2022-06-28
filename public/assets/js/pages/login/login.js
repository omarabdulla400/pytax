
$('#login-form').submit(function (event) {
  event.preventDefault()
  var form = $(this)[0]
  var data = new FormData(form)
  if ($('#login-form').valid()) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      encdepartments: 'multipart/form-data',
      url: '/userLogin',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      error: function (data) {
        server_error('Server: ' + data.status)
      },
    }).done(function (data) {
      var obj = JSON.parse(data);
      if(obj['status']==403){
        swal ({
          title: 'ئاگاداری',
          text: 'ئیمیڵ یان پاسۆرد هەڵەیە',
          icon: 'error',
          buttonsStyling: false,
          confirmButtonClass: 'btn btn-success',
        });
      } else {
         localStorage.setItem("portaone_login",true);
         window.location.replace('/');
      }
    })
  }
})


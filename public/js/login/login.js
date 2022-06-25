
function loginUsers(){
      var email = document.getElementById ('login_email').value;
      var password = document.getElementById ('login_password').value;
      if (email === '' || password === '') {
        Swal.fire({
          icon: 'error',
          title: 'ئاگاداری',
          text: 'ئمێڵ یان پاسوەرد بەتاڵە!!'
        });
      } else {
        $.ajax ({
          type: 'GET',
          enctype: 'multipart/form-data',
          url: '/userLogin',
          data: {email: email, password: password},
          timeout: 30000,
        }).done (function (data) {
          var obj = JSON.parse(data);
          if(obj['status']==403){
            Swal.fire({
              icon: 'error',
              title: 'ئاگاداری',
              text: 'ئیمیڵ یان پاسۆرد هەڵەیە'
            });
          } else {
            localStorage.setItem("paytaxt_login",true);
             window.location.replace('/');
          }
        });
      }
}


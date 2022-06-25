$ (document).ready (function () {
    setInterval (function () {
        var path = window.location.pathname;
       var page = path.split("/").pop();
      if (localStorage.getItem ('paytaxt_login') === null && page!='login') {
          window.location.replace ('/login');
      }
    }, 3000);
  });
//   if (localStorage.getItem ('current_user_role') != "Manager") {
//     document.getElementById ('userRoleSeen').style.display =
//       'none';
//   }

//   $("#current_user_image").attr("src",localStorage.getItem ('current_user_image') );

  function logout(){

      $.ajax ({
          type: 'GET',
          enctype: 'multipart/form-data',
          url: '/logout',
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
              window.location.replace ('/login');
          }
      });
  }

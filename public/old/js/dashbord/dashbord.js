// function getDashboardData () {
//     $.ajax ({
//       type: 'GET',
//       url:'/getDashbordData',
//       cache: true,
//       async: true,
//       timeout: 2000,
//       error: function (data) {
//         erorr_notification ('Request Status: ' + data.status);
//       },
//     }).done (function (data) {
//       var obj = JSON.parse(data);
//
//       $ ('#admin_form').html ('');
//       $ ('#admin_form').html (obj["form"]);
//
//       $ ('#admin_type').html ('');
//       $ ('#admin_type').html (obj["type"]);
//
//       $ ('#admin_users').html ('');
//       $ ('#admin_users').html (obj["users"]);
//
//     });
//   }
//

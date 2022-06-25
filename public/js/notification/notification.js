var system_language = 'en';
var align = 'right';
// if (localStorage.getItem ('system_language') === null) {
//   localStorage.setItem ('system_language', 'en');
// } else {
//   system_language = localStorage.getItem ('system_language');
// }
// if (system_language != 'en') {
//   align = 'left';
// }

function erorr_notification (message) {
  
  Swal.fire({
    icon: 'error',
    title: 'ئاگاداری',
    text: message
  });
}
function add_data_notification (message) {
  Swal.fire({
    icon: 'success',
    title: message,
  });
}
function update_data_notification (message) {
  // swal ({
  //   text: message,
  //   type: 'success',
  //   buttonsStyling: false,
  //   confirmButtonClass: 'btn btn-success',
  // });
  Swal.fire({
    icon: 'success',
    title: message,
  });
}
function delete_data_notification (message) {
  Swal.fire({
    icon: 'success',
    title: message,
  });
}
function server_error(message){
  Swal.fire({
    icon: 'error',
    title: message,
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
  });
}
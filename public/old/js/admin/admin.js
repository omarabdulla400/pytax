var oldEmail = "";
var oldPassowrd = "";
var adminID = "";

function create_admin_datatable() {
    $("#dataTable-admin").DataTable().destroy();
    $("#dataTable-admin").DataTable({
        lengthMenu: [
            [16, 32, 64, -1],
            [16, 32, 64, "All"],
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "گەڕان بەناو تۆمارەکان",
            emptyTable: "زانیاری نەدۆزیەوە",
      sLengthMenu: "پیشاندان _MENU_ ",
      info: "پیشاندانی _START_ بۆ _END_ لە _TOTAL_ تۆمار",
      paginate: {
        first: "یەکەم",
        last: "کۆتا",
        previous:"پێشوو",
        next: "دواتر",
      },
        },
        ajax: {
            url: "/getAdmins",
            type: "GET",
        },
    });
}
$("#add-admin-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    var email = document.getElementById("admin_email").value;
    if ($("#add-admin-form").valid()) {
        $.ajax({
            type: "GET",
            enctype: "multipart/form-data",
            url: "/validateEmail",
            data: { email: email },
            timeout: 600000,
            error: function (data) {
                server_error("Server: " + data.status);
            },
        }).done(function (value) {
            if (value == 1) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Email Already Used, Please Use difference Email",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                });
            } else if (value == 0) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    enctype: "multipart/form-data",
                    url: "/storeAdmin",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    error: function (data) {
                        server_error("Server: " + data.status);
                    },
                }).done(function (data) {
                    add_data_notification(data);
                    $("#addAdminModal").modal("hide");
                    create_admin_datatable();
                });
            }
        });
    }
});
function adminEdit(id) {
    adminID = id;
    $.ajax({
        url: "/getAdminData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        if(data !=''){
            var obj = JSON.parse(data);
            oldEmail = obj["email"];
            oldPassowrd = obj["password"];
            document.getElementById("admin_name_update").value = obj["name"];
            document.getElementById("admin_phone_update").value = obj["phone"];
            document.getElementById("admin_email_update").value = obj["email"];
            document.getElementById("admin_password_update").value = obj["password"];
            setSelection('#admin_role_update', obj["role"], '/getRolesAllData', 'educationLevel')
            $("#updateAdminModal").modal("show");
            alert(obj["password"])
        }

    });
}
function adminRemove(id) {
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
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/destroyAdmin",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_admin_datatable();
            });
        }
    });
}

$("#update-admin-form").submit(function (event) {
    event.preventDefault();
    if ($("#update-admin-form").valid()) {
        var form = $(this)[0];
        var data = new FormData(form);
        var email = document.getElementById("admin_email_update").value;
        data.append("id", adminID);
        data.append("oldPassword", oldPassowrd);
        if (oldEmail != email) {
            $.ajax({
                type: "GET",
                enctype: "multipart/form-data",
                url: "/validateEmail",
                data: { email: email },
                timeout: 6000,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (value) {
                if (value == 1) {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Email Already Used, Please Use difference Email",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                    });
                } else if (value == 0) {
                    $.ajax({
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        enctype: "multipart/form-data",
                        url: "/updateAdmin",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        error: function (data) {
                            server_error("Server: " + data.status);
                        },
                    }).done(function (data) {
                        $("#updateAdminModal").modal("hide");
                        update_data_notification(data);
                        create_admin_datatable();
                    });
                }
            });
        } else {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                enctype: "multipart/form-data",
                url: "/updateAdmin",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                $("#updateAdminModal").modal("hide");
                update_data_notification(data);
                create_admin_datatable();
            });
        }
    }
});

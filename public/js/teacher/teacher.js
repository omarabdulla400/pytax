var oldEmail = "";
var oldPassowrd = "";
var teacherID = "";
function create_teacher_datatable() {
    $("#dataTable-teacher").DataTable().destroy();
    $("#dataTable-teacher").DataTable({
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
            url: "/getTeachers",
            type: "GET",
        },
    });
}
$("#add-teacher-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    var email = document.getElementById("teacher_email").value;
    if ($("#add-teacher-form").valid()) {
        $.ajax({
            type: "GET",
            enctype: "multipart/form-data",
            url: "/validateTeacherEmail",
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
                    url: "/storeTeacher",
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
                    $("#addTeacherModal").modal("hide");
                    create_teacher_datatable();
                });
            }
        });
    }
});
function teacherEdit(id) {
    teacherID = id;
    $.ajax({
        url: "/getTeacherData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        oldEmail = obj["email"];
        oldPassowrd = obj["password"];
        document.getElementById("teacher_name_kr_update").value = obj["name_kr"];
        document.getElementById("teacher_name_ar_update").value = obj["name_ar"];
        document.getElementById("teacher_name_en_update").value = obj["name_en"];
        document.getElementById("teacher_phone_update").value = obj["phone"];
        document.getElementById("teacher_email_update").value = obj["email"];
        document.getElementById("teacher_password_update").value = obj["password"];
        document.getElementById("teacher_role_update").value = obj["role"];
        setSelection('#teacher_educationLevel_update', obj["educationlevel"], '/getAllEducationLevel', 'educationLevel')
        setSelection('#teacher_role_update', obj["role"], '/getRolesAllData', 'educationLevel')
        $("#updateTeacherModal").modal("show");
    });
}
function teacherRemove(id) {
    Swal.fire({
        title: "ئایا دڵنیایت",
        text: "ناتوانێت ئەم زانیاریە بگەڕێنیتەوە!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "بەڵی بیسڕەوە",
        cancelButtonText: "داختسن",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/destroyTeacher",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_teacher_datatable();
            });
        }
    });
}

$("#update-teacher-form").submit(function (event) {
    event.preventDefault();
    if ($("#update-teacher-form").valid()) {
        var form = $(this)[0];
        var data = new FormData(form);
        var email = document.getElementById("teacher_email_update").value;
        data.append("id", teacherID);
        data.append("oldPassword", oldPassowrd);
        if (oldEmail != email) {
            $.ajax({
                type: "GET",
                enctype: "multipart/form-data",
                url: "/validateTeacherEmail",
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
                        url: "/updateTeacher",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        error: function (data) {
                            server_error("Server: " + data.status);
                        },
                    }).done(function (data) {
                        $("#updateTeacherModal").modal("hide");
                        update_data_notification(data);
                        create_teacher_datatable();
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
                url: "/updateTeacher",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                $("#updateTeacherModal").modal("hide");
                update_data_notification(data);
                create_teacher_datatable();
            });
        }
    }
});

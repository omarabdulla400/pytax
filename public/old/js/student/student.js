var studentID = "";
function create_student_datatable() {
    $("#dataTable-student").DataTable().destroy();
    $("#dataTable-student").DataTable({
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
            url: "/getStudents",
            type: "GET",
        },
    });
}
$("#add-student-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    if ($("#add-student-form").valid()) {
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enctype: "multipart/form-data",
            url: "/storeStudent",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            error: function (data) {
                server_error("Server: " + data.status);
            },
        }).done(function (data) {
            $("#updateStudentModal").modal("hide");
            add_data_notification(data);
            create_student_datatable();
        });
    }
});
function studentEdit(id) {
    studentID = id;
    $.ajax({
        url: "/getStudentData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);

        document.getElementById("student_code_update").value = obj["code"];
        document.getElementById("student_name_kr_update").value = obj["name_kr"];
        document.getElementById("student_name_ar_update").value = obj["name_ar"];
        document.getElementById("student_name_en_update").value = obj["name_en"];
        document.getElementById("student_phone_update").value = obj["phone"];
        document.getElementById("student_address_update").value = obj["address"];
        document.getElementById("student_gender_update").value = obj["gender"];
        setSelection('#student_department_update', obj["department"], '/getDepartmentsAllData', 'departments')
        setSelection('#student_types_update', obj["study_type"], '/getStudyTypesAllData', 'stage')
        setSelection('#student_stage_update', obj["stage"], '/getStageAllData', 'stage')
        setSelection('#student_statuses_update', obj["study_status"], '/getStudyStatusAllData', 'stage')
        setSelection('#student_year_update', obj['education_years'], '/getYears', 'year')
        $("#updateStudentModal").modal("show");
    });
}
function studentRemove(id) {
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
                url: "/destroyStudent",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_student_datatable();
            });
        }
    });
}

$("#update-student-form").submit(function (event) {
    event.preventDefault();
    if ($("#update-student-form").valid()) {
        var form = $(this)[0];
        var data = new FormData(form);
        data.append('id',studentID);
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enctype: "multipart/form-data",
            url: "/updateStudent",
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
            $("#addStudentModal").modal("hide");
            create_student_datatable();
        });
    }
});

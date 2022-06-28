var educationYearsID = "";
function create_educationYears_datatable() {
    $("#dataTable-educationYears").DataTable().destroy();
    $("#dataTable-educationYears").DataTable({
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
            url: "/getEducationYears",
            method: "GET",
        },
    });
}
$("#add-educationYears-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    $.ajax({
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        enceducationYears: "multipart/form-data",
        url: "/storeEducationYears",
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
        $("#addEducationYearsModal").modal("hide");
        create_educationYears_datatable();
    });
});
function educationYearsEdit(id) {
    educationYearsID = id;
    $.ajax({
        url: "/getEducationYearsData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        document.getElementById("educationYears_start_update").value = obj["start"];
        document.getElementById("educationYears_end_update").value = obj["end"];
        document.getElementById("educationYears_state_update").value = obj["state"];
        $("#updateEducationYearsModal").modal("show");
    });
}
function educationYearsRemove(id) {
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
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/destroyEducationYears",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_educationYears_datatable();
            });
        }
    });
}

$("#update-educationYears-form").submit(function (event) {
    event.preventDefault();
    if ($("#update-educationYears-form").valid()) {
        var form = $(this)[0];
        var data = new FormData(form);
        data.append("id", educationYearsID);
        $.ajax({
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enceducationYears: "multipart/form-data",
            url: "/updateEducationYears",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            error: function (data) {
                server_error("Server: " + data.status);
            },
        }).done(function (data) {
            $("#updateEducationYearsModal").modal("hide");
            update_data_notification(data);
            create_educationYears_datatable();
        });
    }
});

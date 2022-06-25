var typeID = "";
function create_type_datatable() {
    $("#dataTable-type").DataTable().destroy();
    $("#dataTable-type").DataTable({
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
            url: "/getTypes",
            type: "GET",
        },
    });
}
$("#add-type-form").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        enctype: "multipart/form-data",
        url: "/storeType",
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
        $("#addTypeModal").modal("hide");
        create_type_datatable();
    });
});
function typeEdit(id) {
    typeID = id;
    $.ajax({
        url: "/getTypeData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        document.getElementById("type_name_update").value = obj["name"];
        $("#updateTypeModal").modal("show");
    });
}
function typeRemove(id) {
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
                url: "/destroyType",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_type_datatable();
            });
        }
    });
}

$("#update-type-form").submit(function (event) {
    event.preventDefault();
    if ($("#update-type-form").valid()) {
        var form = $(this)[0];
        var data = new FormData(form);
        data.append("id", typeID);
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enctype: "multipart/form-data",
            url: "/updateType",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            error: function (data) {
                server_error("Server: " + data.status);
            },
        }).done(function (data) {
            $("#updateTypeModal").modal("hide");
            update_data_notification(data);
            create_type_datatable();
        });
    }
});

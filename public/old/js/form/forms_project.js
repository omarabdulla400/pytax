var formID = "";
function create_form_datatable() {
    $("#dataTable-form").DataTable().destroy();
    $("#dataTable-form").DataTable({
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
            url: "/getForms",
            form: "GET",
        },
    });
}
$("#add-form-project").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    if ($("#add-form-project").valid()) {
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enctype: "multipart/form-data",
            url: "/storeForm",
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
            $("#addformModal").modal("hide");
            create_form_datatable();
        });
    }
   
});
function formEdit(id) {
    formID = id;
    $.ajax({
        url: "/getformData",
        method: "GET",
        data: { id: id },
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        document.getElementById("form_number_update").value = obj["number"];
        document.getElementById("form_name_update").value = obj["name"];
        document.getElementById("form_sendTo_update").value = obj["sendTo"];
        document.getElementById("form_date_update").value = obj["date"];
        document.getElementById("form_contect_update").value = obj["contect"];
        document.getElementById("form_note_update").value = obj["note"];
        getTypeForEditForms(obj["type"]);
        $("#updateformModal").modal("show");
    });
}
function formRemove(id) {
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
                url: "/destroyform",
                data: { id: id },
                cache: true,
                asyc: true,
                error: function (data) {
                    server_error("Server: " + data.status);
                },
            }).done(function (data) {
                delete_data_notification(data);
                create_form_datatable();
            });
        }
    });
}

function getTypeForAddForms() {
    $("#selectTypeForForm").append(`<option value="" hidden>
  جۆری نوسراو هەڵبژێرە
  </option>`);
    $.ajax({
        url: "/getAllTypeData",
        method: "GET",
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        for (var i = 0; i < obj.length; i++) {
            $("#selectTypeForForm").append(`<option value="${obj[i]["id"]}">
          ${obj[i]["name"]}
     </option>`);
        }
    });
}
getTypeForAddForms();


function getTypeForEditForms(id) {
    $.ajax({
        url: "/getAllTypeData",
        method: "GET",
        cache: true,
        asyc: true,
        error: function (data) {
            server_error("Server: " + data.status);
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        for (var i = 0; i < obj.length; i++) {
            if(obj[i]["id"]===id){
                $("#selectTypeForFormUpdate").append(`<option selected value="${obj[i]["id"]}">
                ${obj[i]["name"]} 
           </option>`);
            }else{
                $("#selectTypeForFormUpdate").append(`<option value="${obj[i]["id"]}">
                ${obj[i]["name"]}
           </option>`);
            }
            
        }
    });
}
$("#update-form-project").submit(function (event) {
    event.preventDefault();
    var form = $(this)[0];
    var data = new FormData(form);
    data.append("id", formID);
    if ($("#update-form-project").valid()) {
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            enctype: "multipart/form-data",
            url: "/updateForm",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            error: function (data) {
                server_error("Server: " + data.status);
            },
        }).done(function (data) {
            $("#updateformModal").modal("hide");
            add_data_notification(data);
            
            create_form_datatable();
        });
    }
   
});
function create_student_show_result__datatable() {
    var department = document.getElementById('showStudentResultSubject_department').value
    var stage = document.getElementById('showStudentResultSubject_stage').value
    var subject = document.getElementById('showStudentResultSubject_subject').value

    $.ajax({
        url: '/getStudentResultShow',
        method: 'GET',
        data: {subject: subject, department: department, stage, stage},
        cache: true,
        asyc: true,
        error: function (data) {
            server_error('Server: ' + data.status)
        },
    }).done(function (data) {
        var obj = JSON.parse(data);
        $('#result_showStudentTable').html(obj["data"]);
        $('#showStudentResult_passedStudent').html(obj["numberOfPassedStudent"]);
        $('#showStudentResult_failedStudent').html(obj["numberOfFailedStudent"]);
        $('#showStudentResult_passedStudentBoy').html(obj["boyResult"]);
        $('#showStudentResult_failedStudentGirl').html(obj["girlResult"]);

    })

}

$('#add-SubjectSExamActivitiess-form').submit(function (event) {
    event.preventDefault()
    var form = $(this)[0]
    var data = new FormData(form)
    $.ajax({
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        encstudentStudentSubjectSemesterExamandactivty: 'multipart/form-data',
        url: '/storeSubjectSemesterExamandactivty',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        error: function (data) {
            server_error('Server: ' + data.status)
        },
    }).done(function (data) {
        add_data_notification(data)
        $('#addSubjectSemesterExamandactivtyModal').modal('hide')
        create_student_show_result__datatable()
    })
})


$('#showStudentResultSubject_subject').on('change', function () {
    create_student_show_result__datatable();
});


function setStudentMarksShow(count) {
    var studentResultList = [];
    var activityList = [];
    var finalList = [];
    var second_semesterList = [];
    var final_resultList = [];
    var subject = document.getElementById('showStudentResultSubject_subject').value
    Swal.fire({
        title: 'ئایا دڵنیایت',
        text: 'ناتوانێت ئەم زانیاریە بگەڕێنیتەوە!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'بەڵی زانیاریەکان بنیرە',
        cancelButtonText: 'داختسن',
    }).then((result) => {
        if (result.isConfirmed) {
            for (var i = 1; i < count; i++) {
                var activity = 0;
                var final = 0;
                var second_semester = 0;
                var final_result = 0;
                if (document.getElementById(i + `_activity_mark`)) {
                    activity = parseInt(document.getElementById(i + `_activity_mark`).value)
                    final = parseInt(document.getElementById(i + `_final_mark`).value)
                    if (document.getElementById(i + `_second_semester`)) {
                        second_semester = parseInt(document.getElementById(i + `_second_semester`).value)
                        final_result = parseInt(document.getElementById(i + `_final_result`).value)
                    }
                }

                var id = document.getElementById(i + `_id`).getAttribute('data-id')
                studentResultList.push(id);
                activityList.push(activity);
                finalList.push(final);
                second_semesterList.push(second_semester);
                final_resultList.push(final_result);
            }
            $.ajax({
                method: 'POST', headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }, url: '/updateStudentResult', data: {
                    studentResultList: JSON.stringify(studentResultList),
                    activityList: JSON.stringify(activityList),
                    finalList: JSON.stringify(finalList),
                    second_semesterList: JSON.stringify(second_semesterList),
                    final_resultList: JSON.stringify(final_resultList),
                    subject: subject
                }, cache: true, asyc: true, error: function (data) {
                    server_error('Server: ' + data.status)
                },
            }).done(function (data) {
                add_data_notification(data)
                create_student_show_result__datatable()
            })
        }
    })

}


function changeAndLoadResultSubjectsShow() {

    var department = document.getElementById('showStudentResultSubject_department').value
    var stage = document.getElementById('showStudentResultSubject_stage').value
    if (department != '' && stage != '') {
        setSelectionForSetResult('#showStudentResultSubject_subject', '', '/getSubjectsAllDataByDepartmentsAndStages', department, stage,)
        create_student_show_result__datatable()
    }
}


function updateResultShow(count) {
    var activity = parseInt(document.getElementById(count + `_activity_mark`).value)
    if (activity > 50) {
        document.getElementById(count + `_activity_mark`).value = 0;
        activity = 0;
    }
    var final = parseInt(document.getElementById(count + `_final_mark`).value)
    if (final > 50) {
        document.getElementById(count + `_final_mark`).value = 0;
        final = 0;
    }
    var sum = activity + final;
    if (sum >= 50) {
        document.getElementById(count + `_second_semester`).value = 0;
        document.getElementById(count + `_final_result`).value = 0
    }
    document.getElementById(count + `_result_mark`).value = activity + final
}


function updateResultShowSecondSemester(count) {
    var activity = parseInt(document.getElementById(count + `_activity_mark`).value)
    if (activity > 50) {
        document.getElementById(count + `_activity_mark`).value = 0;
        activity = 0;
    }
    var second_semester = parseInt(document.getElementById(count + `_second_semester`).value)
    if (second_semester > 50) {
        document.getElementById(count + `_second_semester`).value = 0;
        second_semester = 0;
    }
    var sum = activity + second_semester;
    if (sum <= 50) {
        document.getElementById(count + `_final_result`).value = sum
    } else {
        var round = Math.round((sum - 50) / 2);
        document.getElementById(count + `_final_result`).value = 50 + round
    }
}

function  update_student_show_result__datatable(){
    document.getElementById('showStudentResultSubject_subject').value =0;
    create_student_show_result__datatable();
}

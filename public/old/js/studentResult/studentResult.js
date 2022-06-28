function create_student_result__datatable() {
    var department = document.getElementById('studentResultSubject_department')
        .value
    var stage = document.getElementById('studentResultSubject_stage').value
   var subject = document.getElementById('studentResultSubject_subject').value

  $.ajax({
    url: '/getStudentResultSet',
    method: 'GET',
    data:{subject:subject,department:department,stage,stage},
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    $('#subject_studentTable').html(data);
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
    create_student_result__datatable()
  })
})





$('#studentResultSubject_subject').on('change', function() {

  create_student_result__datatable();
});

function setStudentMarks(count){
  var studentResultList = [];
  var activityList= [];
  var finalList= [];
  var subject = document.getElementById('studentResultSubject_subject').value
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
      for(var  i = 1 ; i<count ; i++) {
          var activity =0;
          var final = 0;
          if (document.getElementById(i + `_activity_mark`)) {
           activity = parseInt(document.getElementById(i + `_activity_mark`).value)
           final = parseInt(document.getElementById(i + `_final_mark`).value)
          }
          var id = document.getElementById(i+`_id`).getAttribute('data-id')
          studentResultList.push(id);
          activityList.push(activity);
          finalList.push(final);
      }
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/storeStudentResult',
        data: { studentResultList: JSON.stringify(studentResultList),activityList:JSON.stringify(activityList),finalList:JSON.stringify(finalList),subject:subject },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        add_data_notification(data)
        create_student_result__datatable()
      })
    }
  })

}



function changeAndLoadResultSubjects() {

    var department = document.getElementById('studentResultSubject_department')
        .value
    var stage = document.getElementById('studentResultSubject_stage').value
    if (department != '' && stage != '') {
        setSelectionForSetResult(
            '#studentResultSubject_subject',
            '',
            '/getSubjectsAllDataByDepartmentsAndStages',
            department,
            stage,
        )
        create_student_result__datatable()
    }
}



function updateResult(count){
    var activity = parseInt(document.getElementById(count+`_activity_mark`).value)
    if(activity >50){
        document.getElementById(count+`_activity_mark`).value = 0;
        activity=0;
    }
    var final = parseInt(document.getElementById(count+`_final_mark`).value)
    if(final >50){
        document.getElementById(count+`_final_mark`).value = 0;
        final = 0;
    }
    document.getElementById(count+`_result_mark`).value = activity+final
}

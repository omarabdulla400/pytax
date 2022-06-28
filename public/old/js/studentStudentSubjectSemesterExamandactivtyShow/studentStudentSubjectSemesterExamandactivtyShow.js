function create_studentStudentSubjectSemesterExamandactivty_show_datatable() {
  var subject = document.getElementById('studentSubjectSExamActivitiessShow_subject').value
  var department = document.getElementById('studentSubjectSExamActivitiessShow_department').value
  

  $.ajax({
    url: '/getStudentSubjectSemesterExamandactivtyShow',
    method: 'GET',
    data:{department:department,subject:subject},
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    $('#subject_studentResultTable_show').html(data);
  })
  
}





$('#studentSubjectSExamActivitiessShow_subject').on('change', function() {
  create_studentStudentSubjectSemesterExamandactivty_show_datatable();
});
$('#studentSubjectSExamActivitiessShow_department').on('change', function() {
  var department = document.getElementById('studentSubjectSExamActivitiessShow_department').value
  setSelectionForSubjectDepartment('#studentSubjectSExamActivitiessShow_subject',"", '/getSubjectsAllDataByDepartments',department )
});

function setStudensMarks(count){
  const studetIdList = [];
  const studetMarkList= [];
  var department = document.getElementById('studentSubjectSExamActivitiessShow_department').value
  var subject = document.getElementById('studentSubjectSExamActivitiessShow_subject').value
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
      for(var  i = 1 ; i<count ; i++){
        var mark = document.getElementById(i+`_mark`).value
        var id = document.getElementById(i+`_id`).getAttribute('data-id')
        studetIdList.push(id);
        studetMarkList.push(mark);
       
      }
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/storeStudentSubjectSemesterExamandactivty',
        data: { studetIdList: JSON.stringify(studetIdList),studetMarkList:JSON.stringify(studetMarkList),department:department,subject:subject },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_studentStudentSubjectSemesterExamandactivty_show_datatable()
      })
    }
  })
  
}

function setStudenMark(count){
  alert('ee');
}
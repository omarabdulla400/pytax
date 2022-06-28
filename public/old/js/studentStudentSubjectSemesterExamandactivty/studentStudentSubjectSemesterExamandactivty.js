function create_studentStudentSubjectSemesterExamandactivty_datatable() {
  var semester = document.getElementById('studentSubjectSExamActivitiess_examActivities').value
  var subject = document.getElementById('studentSubjectSExamActivitiess_subject').value
  // $('#dataTable-studentStudentSubjectSemesterExamandactivty').DataTable().destroy()
  // $('#dataTable-studentStudentSubjectSemesterExamandactivty').DataTable({
  //   lengthMenu: [
  //     [150, 200, 300, -1],
  //     [150, 200, 300, 'All'],
  //   ],
  //   responsive: true,
  //   language: {
  //     search: '_INPUT_',
  //     searchPlaceholder: 'گەڕان بەناو تۆمارەکان',
  //     emptyTable: 'زانیاری نەدۆزیەوە',
  //     sLengthMenu: 'پیشاندان _MENU_ ',
  //     info: 'پیشاندانی _START_ بۆ _END_ لە _TOTAL_ تۆمار',
  //     paginate: {
  //       first: 'یەکەم',
  //       last: 'کۆتا',
  //       previous: 'پێشوو',
  //       next: 'دواتر',
  //     },
  //   },
  //   ajax: {
  //     url: '/getStudentSubjectSemesterExamandactivty',
  //     method: 'GET',
  //     data:{semester:semester,subject:subject}
  //   },
  // })

  $.ajax({
    url: '/getStudentSubjectSemesterExamandactivty',
    method: 'GET',
    data:{semester:semester,subject:subject},
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
    create_studentStudentSubjectSemesterExamandactivty_datatable()
  })
})




$('#studentSubjectSExamActivitiess_examActivities').on('change', function() {
  create_studentStudentSubjectSemesterExamandactivty_datatable();
});
$('#studentSubjectSExamActivitiess_subject').on('change', function() {
  
  create_studentStudentSubjectSemesterExamandactivty_datatable();
});

function setStudensMarks(count){
  const studetIdList = [];
  const studetMarkList= [];
  var semester = document.getElementById('studentSubjectSExamActivitiess_examActivities').value
  var subject = document.getElementById('studentSubjectSExamActivitiess_subject').value
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
        data: { studetIdList: JSON.stringify(studetIdList),studetMarkList:JSON.stringify(studetMarkList),semester:semester,subject:subject },
        cache: true,
        asyc: true,
        error: function (data) {
          server_error('Server: ' + data.status)
        },
      }).done(function (data) {
        delete_data_notification(data)
        create_studentStudentSubjectSemesterExamandactivty_datatable()
      })
    }
  })
  
}

function setStudenMark(count){
  alert('ee');
}
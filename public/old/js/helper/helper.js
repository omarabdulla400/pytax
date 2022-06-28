function setSelection(name, id, route,type) {
  $(name).empty()
  $(name).append(`<option value="" hidden>
                  </option>`)
  $.ajax({
    url: route,
    method: 'get',
    cache: true,
    asyc: true,
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    for (var i = 0; i < obj.length; i++) {
      switch(type){
        case 'year':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['start']} -  ${obj[i]['end']}
                  </option>`)
          } else {
            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['start']} -  ${obj[i]['end']}
                  </option>`)
          }
        break;
        case 'semesters':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {
            $(name).append(`<option value="${obj[i]['name']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'departments':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {
            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'subjects':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'activty':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}  -    ${obj[i]['course']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}  -    ${obj[i]['course']}
                  </option>`)
          }
        break;
        case 'stage':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'teacher':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'educationLevel':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
        case 'educationType':
          if (obj[i]['id'] == id) {
            $(name).append(`<option value="${obj[i]['id']}" selected>
                    ${obj[i]['name_kr']}
                  </option>`)
          } else {

            $(name).append(`<option value="${obj[i]['id']}">
            ${obj[i]['name_kr']}
                  </option>`)
          }
        break;
      }

    }
  })
}




function setSelectionForSubjectSte(name, id, route,department,stage) {
  $(name).empty()
  $(name).append(`<option value="" hidden>
                  </option>`)
  $.ajax({
    url: route,
    method: 'get',
    cache: true,
    asyc: true,
    data:{department:department,stage:stage},
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    for (var i = 0; i < obj.length; i++) {
      if (obj[i]['subjects_and_departmentsID'] == id) {
        $(name).append(`<option value="${obj[i]['subjects_and_departmentsID']}" selected>
        ${obj[i]['name_kr']}
              </option>`)
      } else {
        $(name).append(`<option value="${obj[i]['subjects_and_departmentsID']}">
        ${obj[i]['name_kr']}
              </option>`)
      }
    }
  })
}

function setSelectionForSubjectDepartment(name, id, route,department) {

  $(name).empty()
  $(name).append(`<option value="" hidden>
                  </option>`)
  $.ajax({
    url: route,
    method: 'get',
    cache: true,
    asyc: true,
    data:{department:department},
    error: function (data) {
      server_error('Server: ' + data.status)
    },
  }).done(function (data) {
    var obj = JSON.parse(data)
    for (var i = 0; i < obj.length; i++) {
      if (obj[i]['subjects_and_departmentsID'] == id) {
        $(name).append(`<option value="${obj[i]['id']}" selected>
        ${obj[i]['name_kr']}
              </option>`)
      } else {
        $(name).append(`<option value="${obj[i]['id']}">
        ${obj[i]['name_kr']}
              </option>`)
      }
    }
  })
}


function setSelectionForSetResult(name, id, route,department,stage) {
    $(name).empty()
    $(name).append(`<option value="" hidden>
                  </option>`)
    $.ajax({
        url: route,
        method: 'get',
        cache: true,
        asyc: true,
        data:{department:department,stage:stage},
        error: function (data) {
            server_error('Server: ' + data.status)
        },
    }).done(function (data) {
        var obj = JSON.parse(data)
        for (var i = 0; i < obj.length; i++) {
            if (obj[i]['id'] == id) {
                $(name).append(`<option value="${obj[i]['id']}" selected>
        ${obj[i]['name_kr']}
              </option>`)
            } else {
                $(name).append(`<option value="${obj[i]['id']}">
        ${obj[i]['name_kr']}
              </option>`)
            }
        }
    })
}

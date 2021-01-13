document.querySelector('.add_std_btn').addEventListener('click', function(){
  refreshServer();
})

document.querySelector('.selectMount').addEventListener('change', function(){
  displaymonthlyIncomeDetails(id_ul, this.value);
})

let st_id = new URLSearchParams(window.location.search)
let id_ul = st_id.get('id');
let session_id = st_id.get('session');

if(session_id) showSession();

displayUpcomingSession(id_ul);

function refreshServer(){
  showOwnedClasses();
}


function showAvailableClasses(){
  if(document.querySelector('#search_class'))
    displayAvailableClasses(document.querySelector('#search_class').value, id_ul)
  displayOwnedClasses(id_ul);
}

function addToLibrary (a){
    let cl = a.childNodes[1].value
    addClassToLibrary(id_ul, cl)
}

function removeFromLibrary (a){
    let cl = a.childNodes[1].value
    removeClassFromLibrary(id_ul, cl)
    displayOwnedClasses(id_ul);
    if(document.querySelector('#search_class'))
    displayAvailableClasses(document.querySelector('#search_class').value, id_ul)
    
}

function showOwnedClasses(){
    displayOwnedClasses(id_ul);
}

function showClassSessionTimeAndCost(a) {
    displayClassSessionTimeAndCost(a.value);
}

function showAddSessionClass(){
    displayAddSessionClass(id_ul);
}

function clearSession(){
    document.querySelector('.session_details').remove();
}

function setSession(){
    let a = document.querySelector('#getClasses').value,
    b = document.querySelector('#session_time_add_session').value,
    c = document.querySelector('#hour_cost_add_session').value,
    d = document.querySelector('#paid_add_session').value,
    e = document.querySelector('#date_add_session').value.concat(' ', document.querySelector('#time_add_session').value, ':00');
    addSession(id_ul, a, b, c, d, e);
}

function showSession(){
  displaySession(session_id);
}



function addClassToLibrary(std_id, cls_id){
    const f = 'addClassToLibrary';
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
          displayOwnedClasses(id_ul);
          if(document.querySelector('#search_class'))
            displayAvailableClasses(document.querySelector('#search_class').value, id_ul)
          showAddSessionClass()
          }
    };
    
    xhttp.open("POST", "db/ajax.php/student.POST.ajax.php");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('func='+f+'&student_id='+std_id+'&teacher_class_id='+cls_id);

}

function removeClassFromLibrary(std_id, cls_id){
    const f = 'removeClassFromLibrary';
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          displayOwnedClasses(id_ul);
          if(document.querySelector('#search_class'))
            displayAvailableClasses(document.querySelector('#search_class').value, id_ul)
          showAddSessionClass()
        }
    };
    
    xhttp.open('POST', 'db/ajax.php/student.POST.ajax.php');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('func='+f+'&student_id='+std_id+'&teacher_class_id='+cls_id);

}

function displayOwnedClasses(id){
    const f = 'displayOwnedClasses';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.class_view').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", 'db/ajax.php/student.GET.ajax.php?func='+f+'&student_id='+id, true);
    xhttp.send();
  }

  function displayAvailableClasses(cls, id_ul) {
    const f = 'displayAvailableClasses';
    if(cls == ''){
        document.querySelector('.class_answ').innerHTML = '<span class="class_answ_msg">Search for a class you don`t have</span>';
        return;
    }
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.class_answ').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", 'db/ajax.php/student.GET.ajax.php?func='+f+'&class='+encodeURIComponent(cls)+'&student='+encodeURIComponent(id_ul), true);
    xhttp.send();
  }

  function displayAddSessionClass(id_ul){
    const f = 'displayAddSessionClass';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.add_session').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", 'db/ajax.php/student.GET.ajax.php?func='+f+'&id='+id_ul, true);
    xhttp.send();
  }

  function displayClassSessionTimeAndCost(class_id){
    const f = 'displayClassSessionTimeAndCost';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.session_details').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", 'db/ajax.php/student.GET.ajax.php?func='+f+'&class_id='+class_id, true);
    xhttp.send();
  }
  
  function addSession(id_ul, teacher_class_id, session_time, hour_cost, paid, session_date_sch){
    const f = 'addSession';
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this)
            clearSession()
            displayUpcomingSession(id_ul)
        }
    };
    
    xhttp.open("POST", "db/ajax.php/student.POST.ajax.php");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('func='+f+'&student_id='+id_ul+'&teacher_class_id='+teacher_class_id+'&session_time='+session_time+'&hour_cost='+hour_cost+'&paid='+paid+'&session_date_sch='+session_date_sch);
  }

  function displayUpcomingSession(id_ul){
    const f = 'displayUpcomingSession';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.upcoming_session').innerHTML = this.responseText;
      }
    };
    xhttp.open('GET', 'db/ajax.php/student.GET.ajax.php?func='+f+'&student_id='+id_ul, true);
    xhttp.send();
  }

  function displaymonthlyIncomeDetails(id_ul, month){
    const f = 'displaymonthlyIncomeDetails';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200) {
        document.querySelector('.std_infTXT').innerHTML = this.responseText;
      } else document.querySelector('.std_infTXT').innerHTML = 'error';

    };
    xhttp.open('GET', 'db/ajax.php/student.GET.ajax.php?func='+f+'&student_id='+id_ul+'&month='+month, true);
    xhttp.send();
  }

  function displaySession(session_id){
    const f = 'displaySession';
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200) {
        document.querySelector('#mainContent').innerHTML += this.responseText;
      } 

    };
    xhttp.open('GET', 'db/ajax.php/student.GET.ajax.php?func='+f+'&session_id='+session_id, true);
    xhttp.send();
  }


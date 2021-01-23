let st_id = new URLSearchParams(window.location.search)
let id_ul = st_id.get('id');
let session_id = st_id.get('session');

if(session_id) showSession();
window.addEventListener('load', function(){
  let date = new Date()
  let mnth = date.getMonth() + 1
  displayUpcomingSession()
  displayMonthlyIncomeDetails(mnth)

})

document.querySelector('.add_std_btn').addEventListener('click', function(){
  displayOwnedClasses()
})

document.querySelector('.selectMount').addEventListener('change', function(){
  displayMonthlyIncomeDetails(this.value)
})

//GET method => viewer

function displayMonthlyIncomeDetails(a){
  let load = () => {
    loading(document.querySelector('.std_infTXT'))
  }
  loadDoc('db/viewer/displayMonthlyIncomeDetails.php?student_id='+id_ul+'&month='+a, document.querySelector('.std_infTXT'), load, myfunction)
}

function displayUpcomingSession(){
  let load = () => {
    loading(document.querySelector('.upcoming_session'))
  }
  loadDoc('db/viewer/displayUpcomingSession.php?student_id='+id_ul, document.querySelector('.upcoming_session'), load, myfunction)
}

function displayOwnedClasses(){
  let load = () => {
    loading(document.querySelector('.class_view'))
  }
  loadDoc('db/viewer/displayOwnedClasses.php?student_id='+id_ul, document.querySelector('.class_view'), load, myfunction)
}

function displayAvailableClasses(cls){
  let load = () => {
    loading(document.querySelector('.class_answ'))
  }
  loadDoc('db/viewer/displayAvailableClasses.php?class='+encodeURIComponent(cls.value)+'&student='+encodeURIComponent(id_ul), document.querySelector('.class_answ'), load, myfunction)
}

function displayAddSessionClass(){
  let load = () => {
    loading(document.querySelector('.add_session'))
  }
  loadDoc('db/viewer/displayAddSessionClass.php?id='+id_ul, document.querySelector('.add_session'), load, myfunction)
}

function displayClassSessionTimeAndCost(class_id){
  let load = () => {
    loading(document.querySelector('.session_details'))
  }
  loadDoc('db/viewer/displayClassSessionTimeAndCost.php?class_id='+class_id.value, document.querySelector('.session_details'), load, myfunction)
}
  
function displaySession(session_id){
  let load = () => {
    loading(document.querySelector('.'))
  }
  loadDoc('db/viewer/displaySession.php?session_id='+session_id, document.querySelector('.'), load, myfunction)
}

//POST method => controller

function addSession(){
  let func = () => {
    clearSession()
    displayUpcomingSession(id_ul)
  }
  let a = document.querySelector('#getClasses').value,
  b = document.querySelector('#session_time_add_session').value,
  c = document.querySelector('#hour_cost_add_session').value,
  d = document.querySelector('#paid_add_session').value,
  e = document.querySelector('#date_add_session').value.concat(' ', document.querySelector('#time_add_session').value, ':00');
  postDoc('db/controller/addSession.php', 'student_id='+id_ul+'&teacher_class_id='+a+'&session_time='+b+'&hour_cost='+c+'&paid='+d+'&session_date_sch='+e, func)
}

function addClassToLibrary(a){
  let func = () =>{
    displayOwnedClasses();
    if(document.querySelector('#search_class'))
      displayAvailableClasses(document.querySelector('#search_class'))
      displayAddSessionClass()
  }
  postDoc('db/controller/addClassToLibrary.php', 'student_id='+id_ul+'&teacher_class_id='+a.childNodes[1].value, func)
}

function removeClassFromLibrary(a){
  let func = () => {
    displayOwnedClasses();
    if(document.querySelector('#search_class'))
      displayAvailableClasses(document.querySelector('#search_class'))
      displayAddSessionClass()
  }
  postDoc('db/controller/removeClassFromLibrary.php', 'student_id='+id_ul+'&teacher_class_id='+a.childNodes[1].value, func)
}

function postDoc(url, vars, cFunction){
  let xhttp = new XMLHttpRequest()
  //xhttp.onloadend = loading()
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      cFunction()
    }
  }
  xhttp.open('POST', url)
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send(vars);
}

function loadDoc(url, doc, load, cFunction){
  let xhttp = new XMLHttpRequest()
  xhttp.onloadend = load()
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      doc.innerHTML = this.responseText
      cFunction(this)
    }
  }
  xhttp.open('GET', url, true)
  xhttp.send()
}

function myfunction(xhttp){
}

function loading(a){
  a.innerHTML = '<div class="loader"></div>';
}

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

function clearSession(){
  document.querySelector('.session_details').remove();
}

document.querySelector('.add_std_btn').addEventListener('click', function(){
  displayOwnedClasses()
})

document.querySelector('.selectMount').addEventListener('change', function(){
  displayMonthlyIncomeDetails(this.value)
})

//GET method => viewer

function displayMonthlyIncomeDetails(b){
  let load = () => {
    loading(document.querySelector('.std_infTXT'))
  }
  let func = (a) => {
    document.querySelector('.std_infTXT').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayMonthlyIncomeDetails.php?student_id='+id_ul+'&month='+b, load, func)
}

function displayUpcomingSession(){
  let load = () => {
    loading(document.querySelector('.upcoming_session'))
  }
  let func = (a) => {
    document.querySelector('.upcoming_session').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayUpcomingSession.php?student_id='+id_ul, load, func)
}

function displayOwnedClasses(){
  let load = () => {
    loading(document.querySelector('.class_view'))
  }
  let func = (a) => {
    document.querySelector('.class_view').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayOwnedClasses.php?student_id='+id_ul, load, func)
}

function displayAvailableClasses(cls){
  let load = () => {
    loading(document.querySelector('.class_answ'))
  }
  let func = (a) => {
    document.querySelector('.class_answ').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayAvailableClasses.php?class='+encodeURIComponent(cls.value)+'&student='+encodeURIComponent(id_ul), load, func)
}

function displayAddSessionClass(){
  let load = () => {
    loading(document.querySelector('.add_session'))
  }
  let func = (a) => {
    document.querySelector('.add_session').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayAddSessionClass.php?id='+id_ul, load, func)
}

function displayClassSessionTimeAndCost(class_id){
  let load = () => {
    loading(document.querySelector('.session_details'))
  }
  let func = (a) => {
    document.querySelector('.session_details').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displayClassSessionTimeAndCost.php?class_id='+class_id.value, load, func)
}
  
function displaySession(session_id){
  let load = () => {
    loading(document.querySelector('.'))
  }
  let func = (a) => {
    document.querySelector('.').innerHTML = a.responseText
  }
  loadDoc('db/viewer/student/displaySession.php?session_id='+session_id, load, func)
}

//POST method => controller

function addSession(){
  let load = () => {

  }
  let func = () => {
    clearSession()
    displayUpcomingSession(id_ul)
  }
  let a = document.querySelector('#getClasses').value,
  b = document.querySelector('#session_time_add_session').value,
  c = document.querySelector('#hour_cost_add_session').value,
  d = document.querySelector('#paid_add_session').value,
  e = document.querySelector('#date_add_session').value.concat(' ', document.querySelector('#time_add_session').value, ':00');
  postDoc('db/controller/student/addSession.php', 'student_id='+id_ul+'&teacher_class_id='+a+'&session_time='+b+'&hour_cost='+c+'&paid='+d+'&session_date_sch='+e, load, func)
}

function addClassToLibrary(a){
  let load = () => {

  }
  let func = () =>{
    displayOwnedClasses();
    if(document.querySelector('#search_class'))
      displayAvailableClasses(document.querySelector('#search_class'))
      displayAddSessionClass()
  }
  postDoc('db/controller/student/addClassToLibrary.php', 'student_id='+id_ul+'&teacher_class_id='+a.childNodes[1].value, load, func)
}

function removeClassFromLibrary(a){
  let load = () => {

  }
  let func = () => {
    displayOwnedClasses();
    if(document.querySelector('#search_class'))
      displayAvailableClasses(document.querySelector('#search_class'))
      displayAddSessionClass()
  }
  postDoc('db/controller/student/removeClassFromLibrary.php', 'student_id='+id_ul+'&teacher_class_id='+a.childNodes[1].value, load, func)
}

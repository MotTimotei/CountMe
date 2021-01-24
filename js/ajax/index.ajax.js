let id_ul = '1'//teacher's id => in our case '1'

window.addEventListener('load', function(){
  let date = new Date()
  let mnth = date.getMonth() + 1
  displayAllStudentsUpcomingSessions();
  displaymonthlyIncomeDetailsAll(mnth)

})

document.querySelector('.add_std_btn').addEventListener('click', function(){
  displayTeacherSettings()
})
document.querySelector('.selectMount').addEventListener('change', function(){
  displaymonthlyIncomeDetailsAll(this.value);
})

function clearClassFields(){
  let prgrm_lngs = document.querySelectorAll('.prgrm_lngs')
  prgrm_lngs.forEach(elem => {elem.value = ''})
  document.querySelector('.add___').innerHTML = ''
}


class RemoveClass{
  constructor() {
      this.remove_delete_class = (a) => {
          this.warning(a.children[0].value);
      };
      
      this.warning = (cls) => {
          if (!document.querySelector('.warning_bg')) {
              let a = document.createElement('div');
              a.classList = 'warning_bg';
              a.innerHTML = '<div class="warning_bg2"><span class="warning_msg_">Remove class?</span> <button class="warning_delete" delete="yes" type="button" onclick="(new RemoveClass()).removeCls(this)">YES<input type="hidden"  value="'+cls+'"></button><button class="warning_delete" delete="no" type="button" onclick="(new RemoveClass()).giveUp()">NO</button></div>';
              document.querySelector('.visOFF').appendChild(a);
          }
      };

      this.removeCls = (a) =>{
          removeCls(a.children[0].value);
          this.giveUp();
      }

      this.giveUp = () =>{
          document.querySelector('.warning_bg').remove();
      }

  }
}




//GET method => viewer

function displayTeacherSettings(){
  let load = () => {
    loading(document.querySelector('.stng_tch'))
  }
  let func = (a) => {
    displayAllClasses()
    displayTeacherThemes()
  }
  loadDoc('db/viewer/teacher/displayTeacherSettings.php?id='+id_ul, document.querySelector('.stng_tch'), load, func)
}

function displayTeacherThemes(){
  let load = () => {
    loading(document.querySelector('.themes_stngs'))
  }
  let func = (a) => {

  }
  loadDoc('db/viewer/teacher/displayTeacherThemes.php?id='+id_ul, document.querySelector('.themes_stngs'), load, func)
}

function displayAllStudentsUpcomingSessions(){
  let load = () => {
    loading(document.querySelector('.upcomingSessions'))
  }
  let func = (a) => {

  }
  loadDoc('db/viewer/teacher/displayAllStudentsUpcomingSessions.php', document.querySelector('.upcomingSessions'), load, func)
}

function displaymonthlyIncomeDetailsAll(month){
  let load = () => {
    loading(document.querySelector('.std_infTXT'))
  }
  let func = (a) => {

  }
  loadDoc('db/viewer/teacher/displaymonthlyIncomeDetailsAll.php?month='+month, document.querySelector('.std_infTXT'), load, func)
}

function displayAllClasses(){
  let load = () => {
    loading(document.querySelector('.showclasses'))
  }
  let func = (a) => {

  }
  loadDoc('db/viewer/teacher/displayAllClasses.php?id='+id_ul, document.querySelector('.showclasses'), load, func)
}


//POST method => controller

function addClass(){
  let load = () => {
    loading(document.querySelector('.add___'))
  }
  let func = () =>{
    clearClassFields()
    displayAllClasses()
  }
  let b = document.querySelectorAll('.prgrm_lngs')
  postDoc('db/controller/teacher/addClass.php', 'id='+id_ul+'&name='+encodeURIComponent(b[0].value)+'&time='+b[1].value+'&cost='+b[2].value, load, func)
}

function removeCls(a){
  let load = () => {
    loading(document.querySelector('.showclasses'))
  }
  let func = () => {
    displayAllClasses();
  }
  postDoc('db/controller/teacher/removeClass.php', 'id='+a, load, func)
}

function postDoc(url, vars, load, cFunction){
  let xhttp = new XMLHttpRequest()
  xhttp.onloadend = load()
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


function loading(a){
  a.innerHTML = '<div class="loader"></div>';
}
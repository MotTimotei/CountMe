let id_ul = '1'//teacher's id => in our case '1'

window.addEventListener('load', function(){
  let date = new Date()
  let mnth = date.getMonth() + 1
  displayAllStudentsUpcomingSessions();
  displaymonthlyIncomeDetailsAll(mnth)
  displayAllSessions()

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

function displayAllSessions(){
  let load = () => {
    loading(document.querySelector('.allSessions'))
  }
  let func = (a) => {
    document.querySelector('.allSessions').innerHTML = a.responseText
  }
  loadDoc('db/viewer/teacher/displayAllSessions.php', load, func)
}

function displayTheme(){
  let load = () => {

  }
  let func = (a) => {
    document.getElementsByTagName('html')[0].setAttribute('data-theme', JSON.parse(a.responseText).name)
    document.getElementsByTagName('style')[0].innerHTML = JSON.parse(a.responseText).theme
  }
  
  loadDoc('db/viewer/teacher/displayTheme.php?id='+id_ul, load, func)
}

function displayTeacherSettings(){
  let load = () => {
    loading(document.querySelector('.stng_tch'))
  }
  let func = (a) => {
    document.querySelector('.stng_tch').innerHTML = a.responseText
    displayAllClasses()
    displayTeacherThemes()
  }
  loadDoc('db/viewer/teacher/displayTeacherSettings.php?id='+id_ul, load, func)
}

function displayTeacherThemes(){
  let load = () => {
    loading(document.querySelector('.themes_stngs'))
  }
  let func = (a) => {
    document.querySelector('.themes_stngs').innerHTML = a.responseText
  }
  loadDoc('db/viewer/teacher/displayTeacherThemes.php?id='+id_ul, load, func)
}

function displayAllStudentsUpcomingSessions(){
  let load = () => {
    loading(document.querySelector('.upcomingSessions'))
  }
  let func = (a) => {
    document.querySelector('.upcomingSessions').innerHTML = a.responseText
  }
  loadDoc('db/viewer/teacher/displayAllStudentsUpcomingSessions.php', load, func)
}

function displaymonthlyIncomeDetailsAll(month){
  let load = () => {
    loading(document.querySelector('.std_infTXT'))
  }
  let func = (a) => {
    document.querySelector('.std_infTXT').innerHTML = a.responseText
  }
  loadDoc('db/viewer/teacher/displaymonthlyIncomeDetailsAll.php?month='+month, load, func)
}

function displayAllClasses(){
  let load = () => {
    loading(document.querySelector('.showclasses'))
  }
  let func = (a) => {
    document.querySelector('.showclasses').innerHTML = a.responseText
  }
  loadDoc('db/viewer/teacher/displayAllClasses.php?id='+id_ul, load, func)
}


//POST method => controller

function applyTheme(a){
  let load = () => {
    loading(a.children[0])
    a.children[1].style = 'opacity:.5;'
  }
  let func = (b) => {
    displayTheme()
    document.querySelectorAll('.thm_view').forEach(elem => {
      elem.setAttribute('selected', 'no')
      elem.children[0].innerHTML = ''
      elem.children[1].style = 'opacity:1;'
    })
    a.setAttribute('selected', 'yes')
  }
  let theme_id = a.getAttribute('theme_id')
  if(a.getAttribute('selected') == 'no') 
    postDoc('db/controller/teacher/applyTheme.php', 'id='+id_ul+'&theme_id='+theme_id, load, func)

}

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
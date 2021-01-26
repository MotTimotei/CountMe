let id_ul = '1'//teacher's id => in our case '1'

window.addEventListener('load', function(){
    displayStudents()
})

//GET method => viewer

function displayStudents(){
    let load = () => {
        loading(document.querySelector('.displ_std'))
    }
    let func = (a) => {
        document.querySelector('.displ_std').innerHTML = a.responseText
    }
    loadDoc('db/viewer/students/displayStudents.php', load, func)
  }

//POST method => controller
/*
function addStudent(a){
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
  */
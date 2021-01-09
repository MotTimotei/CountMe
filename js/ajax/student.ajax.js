let cls = document.querySelector('#search_class')
let st_id = new URLSearchParams(window.location.search)
let id_ul = st_id.get('id');

let add_std_btn = document.querySelector('.add_std_btn').onclick = showOwnedClasses();
cls.addEventListener('keyup', function(){
    displayAvailableClasses(cls.value, id_ul);
    displayOwnedClasses(id_ul);

})

function addToLibrary (a){
    let cl = a.childNodes[1].value
    addClassToLibrary(id_ul, cl)
    displayOwnedClasses(id_ul);
    displayAvailableClasses(cls.value, id_ul)
}

function removeFromLibrary (a){
    let cl = a.childNodes[1].value
    removeClassFromLibrary(id_ul, cl)
    displayOwnedClasses(id_ul);
    displayAvailableClasses(cls.value, id_ul)
    
}

function showOwnedClasses(){
    displayOwnedClasses(id_ul);
}



function addClassToLibrary(std_id, cls_id){
    const f = 'addClassToLibrary';
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            //
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
            //
        }
    };
    
    xhttp.open('GET', 'db/ajax.php/student.GET.ajax.php?func='+f+'&student_id='+std_id+'&teacher_class_id='+cls_id);
    xhttp.send();

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
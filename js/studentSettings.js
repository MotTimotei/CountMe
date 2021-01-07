let cls = document.querySelector('#search_class')
let st_id = new URLSearchParams(window.location.search)
let id_ul = st_id.get('id');

cls.addEventListener('keyup', function(){
    displayAvailableClasses(cls.value, id_ul);

})

function addToLibrary (a){
    let cl = a.childNodes[1].childNodes[1].value
    addClassToLibrary(id_ul, cl)
    displayAvailableClasses(cls.value, id_ul)
}

function removeFromLibrary (a){
    let cl = a.childNodes[1].childNodes[1].value
    addClassToLibrary(id_ul, cl)
    displayAvailableClasses(cls.value, id_ul)
}




function displayAvailableClasses(cls, id_ul) {
    console.log(id_ul)
    let f = 'displayAvailableClasses';
    if(cls == ''){
        document.querySelector('.class_answ').innerHTML = '<span class="class_answ_msg">Search for a class you don`t have</span>';
        return;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.class_answ').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "db/student.GET.ajax.php?func="+f+"&class="+encodeURIComponent(cls)+"&student="+encodeURIComponent(id_ul), true);
    xhttp.send();
  }

function addClassToLibrary(std_id, cls_id){
    const f = 'displayAvailableClasses';
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
        }
    };
    
    xhttp.open("POST", "db/student.POST.ajax.php");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('student_id='+std_id+'&teacher_class_id='+cls_id);

}

function removeClassFromLibrary(std_id, cls_id){
    const f = 'displayAvailableClasses';
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
        }
    };
    
    xhttp.open("GET", "db/student.GET.ajax.php");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('student_id='+std_id+'&teacher_class_id='+cls_id);

}

function removeClassDB(a){
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhttp.open("GET", "db/deleteClass.ajax.php?id="+a, true);
    xhttp.send('delete=true&id='+a);
}
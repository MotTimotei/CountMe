displayAllStudentsUpcomingSessions();
function _displayAllClasses(){
  displayAllClasses(a);
}

function addClass(a, b, c, d){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          displayAllClasses('1');
        }
    };
    
    xhttp.open('POST', 'db/addClass.ajax.php');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id='+a+'&name='+encodeURIComponent(b)+'&time='+c+'&cost='+d);

}

function displayAllClasses(a){
    let xhttp;  
    if (a == '') {
        document.querySelector('.showclasses').innerHTML = '';
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.showclasses').innerHTML = this.responseText;
      }
    };
    xhttp.open('GET', 'db/displayClasses.ajax.php?id='+a, true);
    xhttp.send();
}

function removeClassDB(a){
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        displayAllClasses('1');
      }
    };
    xhttp.open('GET', 'db/deleteClass.ajax.php?id='+a, true);
    xhttp.send('delete=true&id='+a);
}

function displayAllStudentsUpcomingSessions(){
  const f = 'displayAllStudentsUpcomingSessions';
  let xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector('.upcomingSessions').innerHTML = this.responseText;
    }
  };
  xhttp.open('GET', 'db/ajax.php/teacher.GET.ajax.php?func='+f, true);
  xhttp.send();
}
function addClass(a, b, c, d){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log('id='+a+'&name='+b+'&time='+c+'&cost='+d);
        }
    };
    
    xhttp.open("POST", "db/addClass.ajax.php");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id='+a+'&name='+encodeURIComponent(b)+'&time='+c+'&cost='+d);

}

function displayAllClasses(a){
    let xhttp;
    if (a == "") {
        document.querySelector('.showclasses').innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.showclasses').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "db/displayClasses.ajax.php?id="+a, true);
    xhttp.send();
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
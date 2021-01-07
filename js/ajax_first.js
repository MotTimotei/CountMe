function showCustomer(str) {
    var xhttp;
    if (str == "") {
        document.querySelector('.getStudents__').innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.getStudents__').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "db/classes/ajaxFirst.class.php?q="+str, true);
    xhttp.send();
  }
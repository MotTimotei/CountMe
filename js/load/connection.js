
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
  
  function loadDoc(url, load, cFunction){
    let xhttp = new XMLHttpRequest()
    xhttp.onloadend = load()
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        cFunction(this)
      }
    }
    xhttp.open('GET', url, true)
    xhttp.send()
  }
  
  
  function loading(a, b){
    a.innerHTML = '<div class="'+b+'"></div>';
  }

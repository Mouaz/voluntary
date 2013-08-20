function logIn(){
	var e;
  if (window.XMLHttpRequest) {
    e = new XMLHttpRequest
  } else {
    e = new ActiveXObject("Microsoft.XMLHTTP")
  }
  e.onreadystatechange = function () {
    if (e.readyState == 4 && e.status == 200) {
      var text = e.responseText;
    	document.getElementById("wrong").innerHTML = text;
    }
  };
  e.open("GET", "login.php?username=" + document.getElementById("username").value +
  						            "&password=" + document.getElementById("password").value, true);
  e.send();
}
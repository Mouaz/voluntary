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
      if (text == "found") {
        document.getElementById("wrong").innerHTML = "yes";
      } else if (text == "wrong") {
        alert("Wrong username or password.");
        //document.getElementById("wrong").innerHTML = "Wrong username or password.";
      };
    }
  };
  e.open("GET", "http://192.168.1.102:8888/voluntary/service/login.php?username=" + document.getElementById("username").value +
  						            "&password=" + document.getElementById("password").value, true);
  e.send();
}
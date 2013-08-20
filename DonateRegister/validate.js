function validate_username() {
  var e;
  if (window.XMLHttpRequest) {
    e = new XMLHttpRequest
  } else {
    e = new ActiveXObject("Microsoft.XMLHTTP")
  }
  e.onreadystatechange = function () {
    if (e.readyState == 4 && e.status == 200) {
      var problems = e.responseText;

      if (problems.indexOf("usernameok") != -1) {
        document.getElementById("req_username").innerHTML = "OK";
      } else if (problems.indexOf("taken_username") != -1) {
        document.getElementById("req_username").innerHTML = "Username already taken";
      }
    }
  };
  e.open("GET", "validate_username.php?username=" + document.getElementById("username").value, true);
  e.send();
}

function validate_email(){
  var e;
  if (window.XMLHttpRequest) {
    e = new XMLHttpRequest
  } else {
    e = new ActiveXObject("Microsoft.XMLHTTP")
  }
  e.onreadystatechange = function () {
    if (e.readyState == 4 && e.status == 200) {
      var problems = e.responseText;
      if (problems.indexOf("emailok") != -1) {
        document.getElementById("req_email").innerHTML = "OK";
      } else if (problems.indexOf("taken_email") != -1) {
        document.getElementById("req_email").innerHTML = "Email already taken";
      }
    }
  }
  e.open("GET", "validate_email.php?email=" + document.getElementById("email").value, true);
  e.send();
}

function check_pass(){
  pass1 = document.getElementById("pass1").value;
  pass2 = document.getElementById("pass2").value;
  if (pass1 != pass2) {
    document.getElementById("req_pass2").innerHTML = "Passwords don't match";
  } else {
    document.getElementById("req_pass2").innerHTML = "";
  }
}

function validate_all(){
  if (document.getElementById("req_pass2").innerHTML == "Passwords don't match"
    || document.getElementById("req_email").innerHTML == "Email already taken") {
    return false;
  };
}
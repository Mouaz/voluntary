function accepting(user_id,case_id) {
	now = document.getElementById(user_id).innerHTML;
		var e;
		if (window.XMLHttpRequest) {
	    	e = new XMLHttpRequest
		} else {
	    	e = new ActiveXObject("Microsoft.XMLHTTP")
		}
		e.onreadystatechange = function () {
			if (e.readyState == 4 && e.status == 200) {
		    	var myResponse = e.responseText;
			    //if (myResponse == "done") {
			    	document.getElementById(user_id).innerHTML = myResponse;
			    //}
			}
		}
		e.open("GET", "accept.php?user_id=" + user_id + "&case_id=" + case_id + "&now=" + now, true);
		e.send();

}
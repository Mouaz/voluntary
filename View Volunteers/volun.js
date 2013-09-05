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
			    if (myResponse == "Updated") {
			    	
			    	var Collection = document.getElementsByName("accept"); 
			    	for (var i = Collection.length - 1; i >= 0; i--) {
			    		Collection[i].innerHTML = "";
			    	};
			    	document.getElementById(user_id).innerHTML = "Accepted";
			    } else if (myResponse == "Already Accepted") {
			    	document.getElementById(user_id).innerHTML = "Accepted";
			    };

			    
			}
		}
		e.open("GET", "accept.php?user_id=" + user_id + "&case_id=" + case_id + "&now=" + now, true);
		e.send();

}
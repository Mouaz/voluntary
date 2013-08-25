function deletion(id){
	if(confirm('Are you sure you want to delete this case?')) {
		var e;
		if (window.XMLHttpRequest) {
	    	e = new XMLHttpRequest
		} else {
	    	e = new ActiveXObject("Microsoft.XMLHTTP")
		}
		e.onreadystatechange = function () {
			if (e.readyState == 4 && e.status == 200) {
		    	var myResponse = e.responseText;
			    if (myResponse == "done") {
			    	document.getElementById(id).innerHTML = "";
			    }
			}
		}
		e.open("GET", "delete.php?id=" + id, true);
		e.send();

	}
}
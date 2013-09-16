var ip = "192.168.1.107:8888";


function homey() {
$(document).ready(function(){
			$.getJSON('http://'+ip+'/voluntary/service/get_all_cases.php',function(data){
		var cases = data.items;
		$.each(cases, function(index, one_case) {
		$('#all-cases').append('<li><a>'+one_case.title+'</a></li>'+
	'<div class="text" style="margin-left:5% ;">'+one_case.description+'</div><button  onclick="change_current_case('+one_case.case_id+')" style="position:relative ; left:35%;background-color:orange;color:brown;"> open</button>');
		
		});
		var myselect = $('#all-cases');
		myselect.listview("refresh");
		//$('#content').slideToggle();
	//var myselecto = $('#content');
	//myselecto.div("refresh");
	});
		$.ajax({
	url: 'http://'+ip+'/voluntary/service/number_notifications.php',

	success: function(response){
	$('#noti-button').html('Notifications ('+response+')');		
	},
	error: function(){
	            alert('error!');
	        }
	});
		
	});	
		
}

function change_current_case(case_id){
			$.ajax({
	url: 'http://'+ip+'/voluntary/service/change_current_case.php?case_id='+case_id,

	success: function(response){
	window.location.replace("CaseDetails.html");			
	},
	error: function(){
	            alert('error!');
	        }
	});
		}

function notification (){
	$(document).ready(function(){
					$.getJSON('http://'+ip+'/voluntary/service/get_all_notifications.php',function(data){
				var notifications = data.items;
				$.each(notifications, function(index, notification) {
				var htm = '<div class="text" style="margin-left:5% ;">'+notification.ntf_text+'<br><br><small align="right">'+(notification.time).toString('MM/dd/yyyy')+'</small></div>';
					$('#all').append("<li id=\""+notification.id+"\">"+htm+"</li>");
					$.ajax({
			url: 'http://'+ip+'/voluntary/service/read_notifications.php?notification_id='+notification.id,
			
			success: function(response){
			},
			error: function(){
                        alert('error!');
                    }
			});
					//$('<tr ><div class="text" style="margin-left:5% ;">'+notification.ntf_text+'</div></tr>').appendTo('#all-notifications');
					//$('#'+notification.id).append(htm);
					//$('#'+notification.id).hide().fadeIn('fast');
					//$('#content').addClass("box");
				  //alert(htm);
				});
			});

			});	
}

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
        window.location.href = "home.html";
      } else if (text == "wrong") {
        alert("Wrong username or password.");
      };
    }
  };
  e.open("GET", "http://"+ip+"/voluntary/service/login.php?username=" + document.getElementById("username").value +
  						            "&password=" + document.getElementById("password").value, true);
  e.send();
}

function casedetails(){
	$(document).ready(function(){
			
					$.getJSON('http://'+ip+'/voluntary/service/case_details.php',function(data){
				var one_case = data.items;
				//$.each(cases, function(index, one_case) {
				//alert(one_case);
				$('#title').text(one_case.title);
				$('#details').html('<font size="4">'+one_case.description+'</font>');
				$('#image').html('<img src="http://'+ip+'/voluntary/'+one_case.image+'"'+' style="position:relative  ; bottom:2%; left:80%; width:100% ; height:100%">');
				if(one_case.closed==0){
				$('#closed').text('opened');
				}else{
				$('#closed').text('closed');
				}
				$.ajax({
			url: 'http://'+ip+'/voluntary/service/is_case_requested.php?case_id='+one_case.case_id,
			
			success: function(response){
				if(response==1){
					case_request(one_case.case_id);
				}else{
					case_cancel_request(one_case.case_id);
				}
			},
			error: function(){
                        alert('error!');
                    }
			});
			});

			});	
			
}

function case_request(case_id){
				  $.ajax({
			url: 'http://'+ip+'/voluntary/service/user_request_case.php?case_id='+case_id+'&status=0',
			
			success: function(response){
			var id = "#vol";
			$(id).html('<button type="button" class="button2" style="display:inline; ; position:absolute; top:62%; left: 5%;" onClick="case_cancel_request('+case_id+')">Unvolunteer</button>');
			},
			error: function(){
                        alert('error!');
                    }
			});
	
		
			return false;
			}
function case_cancel_request(case_id){
	  $.ajax({
url: 'http://'+ip+'/voluntary/service/user_request_case.php?case_id='+case_id+'&status=1',

success: function(response){
var id = "#vol";
$(id).html('<button type="button" class="button2" style="display:inline; ; position:absolute; top:62%; left: 5%;" onClick="case_request('+case_id+')">Volunteer</button>');
},
error: function(){
            alert('error!');
        }
});


return false;
}

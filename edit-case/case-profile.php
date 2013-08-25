<!DOCTYPE html>
<html>
<head>
<title>Demo Beautiful Registration Form with HTML5 and CSS3</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="http://localhost/voluntary" target="_blank">Home</a>
                <span class="right">
                    <a >
                        <strong>X</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				<h1><span></span> Edit a case profile</h1>
            </header>       
      <div  class="form">
    		<form id="contactform"> 
    			<p class="contact"><label for="name">Title</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="email">Description</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">Location</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
        
  
            <select class="select-style gender" name="gender">
            <option value="select">status</option>
            <option value="m">Closed</option>
            <option value="f">Opened</option>
            </select><br><br>
            
<label>Image:</label>
		<input id ="upload"type="file" name="image" accept="image/*">
		</br>            <input class="buttom" name="submit" id="submit" tabindex="5" value="Update" type="submit"> 	 
   </form> 
</div>      
</div>

</body>
</html>

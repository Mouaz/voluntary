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
      <div  class="form" >
    		<form id="contactform" action='update-case.php?case_id=<?php echo (int)$_GET['case_id'] ?>' method="post" enctype="multipart/form-data"> 
			<?php
			if(isset($_GET['success'])){
				echo "case successfully updated<br><br><br>";
				}
			require '../service/models/cases.php';

				$case_data = get_case_data($_GET['case_id'],'title','description','location','closed','image');
				//print_r($case_data);
				//$_POST['case_id']=$_GET['case_id'];
				
				
			?>
				<p class="contact"><label for="case_id">Case no:</label></p> 
    			<input id="case_id" name="case_id" disabled="disabled" value="<?php echo $_GET['case_id']?>" required="" type="text">
				
    			<p class="contact"><label for="name">Title</label></p> 
    			<input id="title" name="title" value="<?php echo $case_data['title']?>" required="" type="text"> 
    			 
    			<p class="contact"><label for="email">Description</label></p> 
    			<input id="description" name="description" value="<?php echo $case_data['description']?>" required="" type="text"> 
                
                <p class="contact"><label for="username">Location</label></p> 
    			<input id="location" name="location" value="<?php echo $case_data['location']?>" required="" tabindex="2" type="text"> 
    			 
        
  
            <select class="select-style gender" name="closed" id="closed">
            <option value="select">status</option>
            <option value="1" <?php if($case_data['closed']==1) echo "selected='selected'" ?>>Closed</option>
            <option value="0" <?php if($case_data['closed']==0) echo "selected='selected'" ?>>Opened</option>
            </select><br><br>
            
<label>Image:</label>
<br><br>
<?php echo "<img src='../".$case_data["image"]."' / height='250'>"; ?><br><br>
		<input id ="image" type="file" name="image" accept="image/*">
		</br>            <input class="buttom" name="submit" id="submit" tabindex="5" value="Update" action='update-case.php' method="post" type="submit"> 	 
   </form> 
</div>      
</div>

</body>
</html>

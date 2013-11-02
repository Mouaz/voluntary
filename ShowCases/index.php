<?php
  include '../service/actions/general.php';
  include '../service/init.php';
  $rep_id = $_SESSION["rep_id"];

  $getNgoId = mysql_query("SELECT ngo_id FROM ngo_rep WHERE ngo_rep_id = ".$rep_id) or die(mysql_error());
  $result = mysql_fetch_array($getNgoId);
  $ngo_id = $result["ngo_id"];

  $getCases = mysql_query("SELECT * FROM cases WHERE ngo_id = ".$ngo_id) or die(mysql_error());
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Needed Files/assets/ico/favicon.png">

    <title>Show Case Details</title>
    <script type="text/javascript" src="../Needed Files/assets/js/jquery.js"></script>
    <script type="text/javascript" src="../Needed Files/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="../Needed Files/dist/js/bootstrap.js" ></script>
    <script type="text/javascript" src="../Needed Files/dist/js/bootstrap.min.js" ></script>
    <script src="../Needed Files/assets/js/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="cases.js"></script>

   
  

    <!-- Bootstrap core CSS -->
    <link href="../Needed Files/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Needed Files/signin.css" rel="stylesheet">

   
  </head>


  <body >

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../Needed Files/logo_com_trns.png" width="60px" height="50px" class="brand"/>

              <a class="navbar-brand" style="color:white">Volunteer Match Making</a>  

        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">


           
            <li ><a href="tickets.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li ><a href="../AddCase/"><span class="glyphicon glyphicon-pencil "></span>Add Case</a></li>
            <li ><a  href="#addAdmin" ><span class="glyphicon glyphicon-user " ></span>Add Admin </a></li>
            <li ><a  href="#addRep" ><span class="glyphicon glyphicon-plus " ></span>Add Representative </a></li>
            <li  class="active"><a href="#showCase"><span class="glyphicon glyphicon-th-list"></span>Show Cases</a></li>
            <li ><a href="#viewVolun"><span class="glyphicon glyphicon-link"></span>view volunteers</a></li>


           </ul>

        </div> 

      </div>
    </div>
    
    

  <!-- /*********       table code           ***********/-->
      <div class="container container1" style="position:fixed ; top:0px;height:100%;width:90% ;left:10% ;" >

  <div class="box" style="position:absolute ; top:8%; left:1%;width:98% ; height:90% ;opacity:1;filter: alpha(opacity=50);overflow:auto;overflow-x: hidden;">




<?php while ($cases = mysql_fetch_array($getCases)) { ?>
  <?php 
    if ($cases["closed"] == 1) {
      $nameResult = mysql_query("SELECT user_name FROM user WHERE user_id = ".$cases["accepted_id"]) or die(mysql_error());
      $nameArray = mysql_fetch_array($nameResult);
      $closed = "Closed </br> Accepted: ".$nameArray["user_name"];
    } 
      else $closed = "Opened"; 
  ?>
  <div <?php echo "id=".$cases["case_id"]; ?> >

    <?php 
        $appliedResult = mysql_query("SELECT * FROM user_case WHERE case_id = ".$cases["case_id"]) or die(mysql_error());
        $applied = mysql_num_rows($appliedResult); 
      ?>
    <table  >

      <tr >
       
             <h2 style="color:orange;padding-left:1%;text-decoration: italic"> <?php echo $cases["title"]; ?> </h2>      
        
      </tr>
       </tr>

      <img  <?php echo "src='../".$cases["image"]."' style='position:relative ; left:40%;' width='300px'"; ?> >
      <tr >
      <tr >
       <h5 style="color:orange ; padding-left:1.5%;">Description</h5>
        <div class="text" style="margin-left:5% ;width:78%"> <?php echo $cases["description"]; ?> </div>
     
       <h5 style="color:orange;padding-left:1.5%;">Location : <h5 style="position: relative ; top:-4%;left:7%;"> <?php echo $cases["location"]; ?> </h5></h5>
      
      </tr>

      <tr >
        <h5 style="color:orange ; padding-left:1.5%;" > Status :<h5 style="position: relative ; top:-4%;left:7%"> <?php echo $closed; ?> <h5></h5>
       
        
      </tr>
       <tr >
        <h5 style="color:orange ; padding-left:1.5%;">Applicants Number : <a> <?php echo "<a href='../View Volunteers/?id=".$cases["case_id"]."'>" .$applied."</a>"; ?> </a></h5>
       
        <br>
     
    </tr>
    
      <tr>

      <th> <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;position:relative ; left:10%"  ><span class=" glyphicon glyphicon-trash" <?php echo "onclick='deletion(".$cases["case_id"].");'";?> > delete</span></button></th></th>
      <th> <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;position:relative ; left:120%"  ><span class=" glyphicon glyphicon-remove"> Close</span></button></th></th>

      </tr>

    </table>
    <br>
   <hr class="style-seven">
  </div>

  
   
  <?php } ?>

   
  <!--
   <table   >

    <tr >
     
           <h2 style="color:orange;padding-left:1%;text-decoration: italic">Case Title </h2>      
      
    </tr>
     </tr>
    <img src="../Needed Files/logo_comp.png" style="position:relative ; left:40%;">
    <tr >
    <tr >
     <h5 style="color:orange ; padding-left:1.5%;">Description</h5>
      <div class="text" style="margin-left:5% ;width:78%">My name is Sarah , I am testing this div for limited space  what if it was a bit longer what if it was a bit samller what if what if what if what if what if what if what if what if what if what if what if
      </div>
   
     <h5 style="color:orange;padding-left:1.5%;">Location : <h5 style="position: relative ; top:-4%;left:8%;">location test is working</h5></h5>
    
    </tr>

    <tr >
      <h5 style="color:orange ; padding-left:1.5%;" > Status :<h5 style="position: relative ; top:-4%;left:7%">Status<h5></h5>
     
      
    </tr>
     <tr >
      <h5 style="color:orange ; padding-left:1.5%;">Applicants Number : <a>42</a></h5>
     
      <br>
   
  </tr>
  
    <tr>

    <th> <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;position:relative ; left:10%"  ><span class=" glyphicon glyphicon-trash"> delete</span></button></th></th>
    <th> <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;position:relative ; left:120%"  ><span class=" glyphicon glyphicon-remove"> Close</span></button></th></th>

    </tr>

   

  </table>
-->


</div>


        
          
      
  <!--  <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:100%;padding-left:1%;"  ><span class=" glyphicon glyphicon-trash"> delete</span></button></th>


    <th><button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:100%;position:relative ; left:100%; padding-left:1%"><span class=" glyphicon glyphicon-remove"> Close</span></button></th>-->
         
  




    </div> <!-- /container -->

   <div >
     <image  style= "position:fixed ; bottom:0px ; right:0px" src="../Needed Files/logo_transparent.png"   width="23%" height="40%">
    </div>


 




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>

</html>

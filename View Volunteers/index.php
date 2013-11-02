<?php
  include '../service/actions/general.php';
  include '../service/init.php';
  $case_id = $_GET["id"];
  $result = mysql_query("SELECT u.user_id, user_name, email, birth_date, image, job_description, phone_number 
          FROM user u,user_case uc WHERE u.user_id = uc.user_id AND case_id = ".$case_id) or die(mysql_error());

  $accResult = mysql_query("SELECT accepted_id FROM cases WHERE case_id = ".$case_id);
  $accRow = mysql_fetch_row($accResult);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Needed Files/assets/ico/favicon.png">

    <title>Show volunteers Details</title>
    <script type="text/javascript" src="../Needed Files/assets/js/jquery.js"></script>
    <script type="text/javascript" src="../Needed Files/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="../Needed Files/assets/js/jquery-validation-1.11.1.js"></script>
    <script type="text/javascript" src="../Needed Files/dist/js/bootstrap.js" ></script>
    <script type="text/javascript" src="../Needed Files/dist/js/bootstrap.min.js" ></script>
    <script src="volun.js" ></script>

   
  

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
            <li ><a href="#addCase"><span class="glyphicon glyphicon-pencil "></span>Add Case</a></li>
            <li ><a  href="#addAdmin" ><span class="glyphicon glyphicon-user " ></span>Add Admin </a></li>
            <li ><a  href="#addRep" ><span class="glyphicon glyphicon-plus " ></span>Add Representative </a></li>
            <li  ><a href="#showCase"><span class="glyphicon glyphicon-th-list"></span>Show Cases</a></li>
            <li  class="active"> <a href="#viewVolun"><span class="glyphicon glyphicon-link"></span>view volunteers</a></li>


           </ul>

        </div> 

      </div>
    </div>
    
    

  <!-- /*********       table code           ***********/-->
      <div class="container container1" style="position:fixed ; top:0px;height:100%;width:90% ;left:10% ; overflow:auto;" >

  <div class="box" style="position:absolute ; top:8%; left:1%;width:98% ; height:90% ;opacity:1;filter: alpha(opacity=50);overflow:auto;">

    <?php while ($users = mysql_fetch_array($result)) { ?>
    <table  >
      <tr >
       <legend style="color:orange"> <?php echo $users["user_name"]; ?> </legend>      
      </tr>
      <tr>

        <?php 
        if ($users["image"] == "")
          echo " <img src='../Needed Files/logo_comp.png' style='position:relative ; left:1%;' height='300px'>";
        else
          echo " <img src='".$users["image"]."'>";
        ?>

    </tr>
      <tr >
       <li style="color:orange">Job Description</li>
        <div class="text" style="margin-left:5% ;">
          <?php echo $users["job_description"]; ?> 
        </div>
      </tr>

      <tr >
        <li style="color:orange" >Age</li>
        <div class="text" style="margin-left:5% ;">
          <?php echo $users["birth_date"]; ?>
        </div>
      </tr>

      <tr >
        <li style="color:orange" >Phone</li>
        <div class="text" style="margin-left:5% ;">
          <?php echo $users["phone_number"]; ?>
        </div>
      </tr>

       <tr >
        <li style="color:orange">Mail</li>
        <div class="text" style="margin-left:5% ;">
          <?php echo $users["email"]; ?>
        </div>
        <br>
      <th >
        <div >
          <button name='accept' <?php echo "id=".$users['user_id']." onclick='accepting(".$users["user_id"].",".$case_id.");'";?> type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;"  >
           <!-- <span class=" glyphicon glyphicon-ok" >-->
      
              <?php 
              if ($accRow[0] == 0)
                echo "Accept Volunteer";
              else if ($accRow[0] == $users["user_id"])
                echo "Accepted";
              ?>

          </button>
        </div>
    </th>
    </table>
    <br>
  <?php } ?>


 <!--<table  >

    <tr >
     
           <legend style="color:orange">Volunteer name </legend>      
      
    </tr>
    <tr>
    <img src="../Needed Files/logo_comp.png" style="position:relative ; left:1%;">
  </tr>
    <tr >
     <li style="color:orange">Job</li>
      <div class="text" style="margin-left:5% ;">My name is Sarah , I am testing this div for limited space 
      </div>
    </tr>

    <tr >
      <li style="color:orange" >Other thing</li>
      <div class="text" style="margin-left:5% ;">His age
      </div>
      
    </tr>
     <tr >
      <li style="color:orange">His mail</li>
      <div class="text" style="margin-left:5% ;"><a>mail@yahoo.com</a>
      </div>
      <br>
    <th >
    <button type="submit" class=" btn3 btn-lg btn-warning btn-block " style="width:200%;padding-left:1%;"  ><span class=" glyphicon glyphicon-trash"> delete</span></button></th>
         

   

  </table> -->


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
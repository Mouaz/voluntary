
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Needed Files/assets/ico/favicon.png">

    <title>Add Case</title>
    <script src="../Needed Files/assets/js/jquery.js"></script>
    <script src="../Needed Files/assets/js/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
  

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
            <li class="active" ><a href="#addCase"><span class="glyphicon glyphicon-pencil "></span>Add Case</a></li>
            <li ><a  href="#addAdmin" ><span class="glyphicon glyphicon-user " ></span>Add Admin </a></li>
            <li ><a  href="#addRep" ><span class="glyphicon glyphicon-plus " ></span>Add Representative </a></li>
            <li><a href="#showCase"><span class="glyphicon glyphicon-th-list"></span>Show Cases</a></li>
            <li><a href="#viewVolun"><span class="glyphicon glyphicon-link"></span>view volunteers</a></li>
           </ul>

        </div><!--/.nav-collapse -->     


      </div>
    </div>
    
    

    <div class="container container1" style="position:fixed ; top:0px;height:100%;width:90% ;left:10%" >

      <form class="form-inline" id ="addCase" method="post" action="Case.php" enctype="multipart/form-data" style="position:relative ; top:5%;left:0% ; width:100%; height:100%">
         
  
       <fieldset style="position:relative ; width:100% ; height:100% ; right:0%; top:5%;">
           <legend style="color:orange">Add Case</legend> 
          <div class="control-group">  
          
            <label class="control-label" for="input01"> Title</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge form-control" name="title" id="title" required style="width:30%">  
            </div>  
          </div>  
            <br>
            <div class="control-group">  
             <label class="control-label" for="textarea">Description</label>  
                <div class="controls">  
                  <textarea class="input-xlarge form-control" rows="5" name="desc" id="desc" required style="width:50%" ></textarea>  
               </div>  
            </div>  
            <br>
            <div class="control-group">  
            <label class="control-label" for="input01"> Location</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge form-control" name="loc" id="loc" style="width:30%">  
            </div>  
            <br>
            <div class="control-group">  
            <label class="control-label" for="fileInput">Upload Image</label>  
            <div class="controls">  
              <input id="upload" type="file" name="image" accept="image/*" class="input-file" style="color:orange">  
            </div>  
          </div>  


           <br>
             <button type="submit" class=" btn2 btn-lg btn-warning btn-block"> Add </button>

        </fieldset>


        
      </form>



    </div> <!-- /container -->

   <div >
     <image  style= "position:fixed ; bottom:0px ; right:0px" src="../Needed Files/logo_transparent.png"   width="23%" height="40%">
    <div>
 




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>

</html>

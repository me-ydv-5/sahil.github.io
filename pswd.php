<?php
  include('session.php');
  $site = $_SESSION['mychoice'].".php";
?>


<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">

	<link rel="icon" type="image/x-icon" href="favicon.ico" >
	
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type='text/javascript'>

    
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Time Table</title>
</head>

<body style="background-color: rgba(200, 220, 225, 0.9);">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  


<!--***************************************************************************-->

<!--***************************************************************************--> 
    
    <div class="navbar-fixed">
    <nav class="nav-extended" style="background-color: #000000">
    <div class="nav-wrapper">
       <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li style="margin-right: 20px;"><i class="material-icons left ">account_circle</i><?php echo $_SESSION['name']; ?></li>
      <li><i class="material-icons left ">picture_in_picture</i><?php echo $_SESSION['id']; ?></li>
       </ul>   

      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<!-- <li><a class="dropdown-button" href="#!" data-activates="notifications">Notifications<i class="material-icons right">arrow_drop_down</i></a></li> -->
        <li><a href=<?php echo $site ?> ><i class="material-icons left">home</i>Home</a></li>
        <li class="active"><a href="pswd.php"><i class="material-icons left">security</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

    </div>
  	</nav>    	

    </div>


      <div class="container">
      <div class="row">
      <div class="col l6 pull-l2" style="margin-top: 30px;">
      <h3 style="text-align: center;">Change Password</h3>
      <p style="text-align: center;">Toggle below switch on if you want to change password</p>
      
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="switch">
      <label style="margin-left: 180px;">
      Off
      <input type="checkbox" name="pass">
      <span class="lever"></span>
      On
      </label>
      </div>

      <div class="input-field">
      <input id="old" type="password" class="validate" name="old">
      <label for="password">Old Password</label>
      </div>
      <div class="input-field">
      <input id="new" type="password" class="validate" name="new">
      <label for="password">New Password</label>
      </div>
      <div class="input-field">
      <input id="renew" type="password" class="validate" name="renew">
      <label for="password">Re-Enter New Password</label>
      </div>
      
      </div>

      <div class="col l6 push-l2" style="margin-top: 30px;">
      <h3 style="text-align: center;">Change Profile Pic</h3>
      <p style="text-align: center;">Toggle below switch on if you want to change profile pic</p>
      <div class="switch">
      <label style="margin-left: 180px;">
      Off
      <input disabled type="checkbox" name="pic" >
      <span class="lever"></span>
      On
      </label>
      </div>
      </div>

      <div class="col l12">
      <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-left: 370px;margin-top: 70px;">Submit
      <i class="material-icons right">send</i>
      </button>
      </div>

      </form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") 
  {

  
  if (!isset($_POST['pass']) && !isset($_POST['pic'])) {
      echo "<script>window.alert('Please toggle the particular buttons')</script>";
            }          
  if (isset($_POST['pass'])){


                if (($_POST['old'] == "") || ($_POST['new'] == "") || ($_POST['renew'] == "" )) {
                echo "<script>window.alert('Please enter all the fields')</script>";
                  
               }
               
               else{
               $old = mysqli_real_escape_string($db,$_POST['old']);
               $new = mysqli_real_escape_string($db,$_POST['new']);
               $renew = mysqli_real_escape_string($db,$_POST['renew']);
             
               
              
               
              
              $ses_sql = mysqli_query($db,"SELECT pswd FROM ".$_SESSION['mychoice']." WHERE id = $user_check ;");
              $row2=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

              if ($row2['pswd'] == $old && $new == $renew && strlen($new) < 8 || strlen($new) >20 ) {
                echo "<script>window.alert('Password should be 8-20 characters long')</script>";
              }

              elseif ($row2['pswd'] == $old && $new == $renew &&  (strlen($new) > 7 && strlen($new) < 21 )){
                mysqli_query($db,"UPDATE ".$_SESSION['mychoice']." set pswd = '$new' where id = $user_check;");
                echo "<script>window.alert('Password Change Successful!')</script>";
              }
              else{
                echo "<script>window.alert('Please check the respective inputs again.')</script>";
              }
      
            
                 }                 


 }
        
        

// // // if(isset($_POST['pic'])){
//     $imagename=$_FILES["myimage"]["name"]; 

// //Get the content of the image and then add slashes to it 
// $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

// //Insert the image name and image content in image_table
// $insert_image="UPDATE ".$_SESSION['mychoice']."_main set  pic =".$imagename." where id = ".$user_check.";" ;

// mysqli_query($db,$insert_image);
              // if (($_POST['profile'] == "")) {
              //     echo "<script>window.alert('Please give your photo')</script>";
                  
              //  }
              // else{
              //    $pic = mysqli_real_escape_string($db,$_POST['profile']);
              //    $ses_sql1 = mysqli_query($db,"UPDATE ".$_SESSION['mychoice']."_main SET pic= ".$pic." ;");
              //    $row3=mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);





              // }
            // }
            

  }
    

?>            





    


      </div>

      </div>

      


</body>
</html>



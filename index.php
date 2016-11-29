<?php  

               include("config.php");
               session_start();

               if($_SERVER["REQUEST_METHOD"] == "POST") {
                // username and password sent from form 
      
               $myusername = mysqli_real_escape_string($db,$_POST['username']);
               $mypassword = mysqli_real_escape_string($db,$_POST['password']);
                 if (!isset($_POST['chooseone'])) {
                  echo "please select one option from teacher's/parent's login";
                  die();
               }
               $mychoice = mysqli_real_escape_string($db,$_POST['chooseone']) ;

               $sql = "SELECT id FROM $mychoice WHERE id = '$myusername' and BINARY pswd = '$mypassword';";
               
               $result = mysqli_query($db,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               // $active = $row['active'];
      
               $count = mysqli_num_rows($result);
      
               // If result matched $myusername and $mypassword, table row must be 1 row
    
               	if($count == 1) {
            		$_SESSION['login_user'] = $myusername;
               		$_SESSION['mychoice'] = $mychoice;
              		if ($myusername==11111) {
                  		header("location: principal.php");
             	}
              		else
               			header("location: ".$mychoice.".php");
               }
               else {
               echo "<script>window.alert('Your Username or Password is invalid')</script>";
               }
               }

?>


<!DOCTYPE html>
<html lang="en-US">

<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="favicon.ico" >
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.light_blue-indigo.min.css" />
	<!-- <link rel="stylesheet" type="text/css" href="material.min.css"> -->
	<title>Welcome : Log In</title>
</head>
	
<body>

	<div id="background"></div>


	<div class="jumbotron text-center" style="padding: 0px;">
	<h1 style="font-weight: 900%;"><strong>Taksh-Shila School,IIT Mandi</strong></h1> 
  	<p>A center of ehtical, moral and basic learning for the future of the country</p>
	</div>
	

  
<div class="container">
  <div class="row">
    <div class="col-sm-8">
       
   		<table class="mdl-data-table mdl-js-data-table" style="background-color: rgba(200, 220, 225, 0.9);">
   		
  		<thead style="background-color: rgba(225, 225, 225, 0.9);">
  		<tr >
      	<th class="date mdl-data-table__cell--non-numeric" style="text-align: center;font-weight: bolder;position: center" ><h5>Date</h5></th>
      	<th class="notification" style="text-align: center;font-weight: bolder;"><h5>Announcements</h5></th>
      	</tr>
      	</thead>
   
  		<tbody>

<?php
               $sql1 = "SELECT * FROM global_notif ORDER BY date DESC;";
               $result = mysqli_query($db,$sql1);

              if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    		  while($row = mysqli_fetch_assoc($result)) {
        		echo "<tr>".'<td class="date" style="text-align:center;">'.$row['date']."</td>".'<td class="notification" style="text-align:center;">'. $row['notification'] . "</td>"."</tr>";
    		  }
			  } 
			  else {
    		  echo "No recent Notifications";
			  }
              


?>	
  		</tbody>
  			
		</table>
	

   	<br><br><br>
   

    </div>
    
    <form action="" method="post">
    
    <div class="col-sm-4" >
    	<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp" style="background-color: rgba(200, 220, 225, 0.9);">
    	<div class="mdl-card__title" style="align-self: center;font-weight: bolder;font-size: 20px;">
    	Log In 
    	</div>
    	
    	
    	
    	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin: 0 auto;" >
    	<input class="mdl-textfield__input" type="text" id="username" pattern="[0-9]*" name="username" >
    	<label class="mdl-textfield__label" for="username" >Username</label>
    	<span class="mdl-textfield__error">Only numerics, please!</span>
  		</div>
		
    	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin: 0 auto;">
    	<input class="mdl-textfield__input" type="password" id="password" name="password">
		<label class="mdl-textfield__label" for="password">Password</label>
  		</div>
	
		<div style="display: inline; margin: 0 auto;margin-top: 20px;margin-bottom: 20px;">
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="parents" >
 			<input class="mdl-radio__button" id="parents" name="chooseone" type="radio" value="login_stu">
 	 		<span class="mdl-radio__label">Parent's Login</span>
			</label>
	
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="teachers" style="margin-bottom: 20px">
 	 		<input class="mdl-radio__button" id="teachers" name="chooseone" type="radio" value="login_tchr">
  			<span class="mdl-radio__label">Teacher's Login</span>
			</label>

		</div>
		
		<div class="button" style="margin: 0 auto;margin-bottom: 30px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " >
	  		Log In
			</button>	

		</div>    		

    

		


    	</div>
      
    </div>    	

    </form>

  </div>
  <div class="row">
  	<div class="col-sm-12">
  		<blockquote>
    	<p><h5><strong>Education is the most powerful weapon which you can use to change the world.</strong></h5></p>
    	<footer>Nelson Mandela</footer>
  		</blockquote>
  	</div>
  </div>
    </div>



</body>


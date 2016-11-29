<?php
  include('session.php');


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
    
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Time Table</title>
</head>

<body style="background-color: rgba(200, 220, 225, 0.9);">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  


<!--***************************************************************************-->
<ul id="slide-out" class="side-nav" >
    <li><div class="userView">
      <div class="background" style="height: 150px;">
        <img src="images/galaxy.png">
      </div>

      <span class="white-text name"><?php echo $_SESSION['name']; ?></span></a>
      <span class="white-text email"><?php echo $_SESSION['id']; ?></span></a>
    </div></li>
    <div style="padding-top: 40px;">
    <li class="active"><a href="timetable.php" ><i class="material-icons">schedule</i>Time Table</a></li>
    <li><a href="marks.php"><i class="material-icons">assignment</i>Marks</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Others</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">account_balance_wallet</i>Fee Calculator</a></li>
    <li><a class="waves-effect" href="pswd.php" style="height: 100px;display: inline-block;"><i class=" material-icons" style="margin-top: 25px;">security</i>Change Password and Profile Pic</a></li> 
    </div>
    
  </ul>
  

<!--***************************************************************************--> 
  <ul id="notifications" class="dropdown-content" style="width: auto;margin-top: 70px; ">
    <?php
               $sql1 = "SELECT * FROM notif where id = ".$user_check." ORDER BY date DESC;";
               $result1 = mysqli_query($db,$sql1);

              if (mysqli_num_rows($result1) > 0) {
          // output data of each row
          while($row1 = mysqli_fetch_assoc($result1)) {
            echo "<li>".'<a href="#!" >'.$row1['notifications']."</li>";
            echo "<li class='divider'></li>";
          }
        } 
        else {
          echo '<li>'."No recent Notifications".'</li>';
          echo "<li class='divider'></li>";
        }
              


?>
  <!--   <li><a href="#!" style="width: auto;">one is a test case</a></li>
    <li class="divider"></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li> -->
  </ul>
    
    <div class="navbar-fixed">
    <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" data-activates="slide-out" class="button-collapse show-on-large">Menu<i class="material-icons left">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a class="dropdown-button" href="#!" data-activates="notifications">Notifications<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="welcome.php" ><i class="material-icons left">account_circle</i>Home</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

    </div>
  	</nav>    	

    </div>


      <div class="container">
      <div class="row">
      <h1 style="text-align: center;">Time Table</h1>
      <div class="col l12 pull-l2 " style="margin-left: 180px;margin-top: 20px;">
      <table border="2" cellspacing="10" align="center" class="bordered striped" >
        <thead>
          <tr >
              <th data-field="id"><strong>Day</strong></th>
              <th data-field="id"><strong>Period 1</strong></th>
              <th data-field="id"><strong>Period 2</strong></th>
              <th data-field="id"><strong>Period 3</strong></th>
              <th data-field="id"><strong>Period 4</strong></th>
              <th data-field="id"><strong>Period 5</strong></th>
              <th data-field="id"><strong>Period 6</strong></th>                            
          </tr>
        </thead>

        <tbody>



        </tbody>
      </table>
      </div>
      </div>
      </div>

      


</body>
</html>



<?php
  include('session.php');
   
   $sql = "SELECT * FROM ".$_SESSION['mychoice']."_main WHERE id = ".$user_check.";";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $_SESSION['name'] = $row['name'];
   $_SESSION['id'] = $row['id'];
   $_SESSION['class'] = $row['class'];

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">

	<link rel="icon" type="image/x-icon" href="favicon.ico" >
	

  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Welcome</title>
</head>


<body style="background-color: rgba(200, 220, 225, 0.9);">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>


<!--***************************************************************************-->

  <ul id="notifications" class="dropdown-content" style="margin-top: 70px; ">
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
          echo '<li>'.'<a href="#!" >'."No recent Notifications".'</li>';
          echo "<li class='divider'></li>";
        }
              
?>
  </ul>
<!--***************************************************************************-->
    
    <div class="navbar-fixed">
    <nav class="nav-extended">
    <div class="nav-wrapper">
       <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li style="margin-right: 20px;"><i class="material-icons left ">account_circle</i><?php echo $row['name']; ?></li>
      <li><i class="material-icons left ">picture_in_picture</i><?php echo $row['id']; ?></li>
       </ul>   
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a class="dropdown-button" href="#!" data-activates="notifications">Notifications<i class="material-icons right">arrow_drop_down</i></a></li>
        <li class="active"><a href="login_stu.php" ><i class="material-icons left">home</i>Home</a></li>
        <li><a href="pswd.php"><i class="material-icons left">security</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

    </div>
  	</nav>    	
    </div>
<!--***************************************************************************-->


    <div class="row">
      <div class="col m8" style="margin-left: 200px;">
        <ul class="tabs">
          <li class="tab col m2" style="width: 220px;"><a href="#test0"><i class="material-icons">account_circle</i>Dashboard</a></li>
          <li class="tab col m2" style="width: 220px;"><a href="#test1"><i class="material-icons">schedule</i>Time Table</a></li>
          <li class="tab col m2" style="width: 220px;"><a href="#test2"><i class="material-icons">assignment</i>Marks</a></li>
          <li class="tab col m2" style="width: 222px;"><a href="#test3"><i class="material-icons">account_balance_wallet</i>Feedback</a></li>
        </ul>
      </div>

<!--***************************************************************************-->


<div id="test0" class="col s12">
  
    <div class="container">
      <div class="row">
      <div class="col l8 pull-l1" style="text-align: left;">
        <br><br><h1>Welcome <strong><?php echo $row['name']; ?></strong></h1>
        <h5>Class <strong><?php echo $row['class']; ?></strong></h5>
        <br>
        




      </div>
      <div class="col l4 push-l1">
      
      <?php
      if ($row['pic']=='') {
        echo "<img src='images/account.png' style='margin-top: 70px;width:300px;height:380px;' class='z-depth-4'>";
      }
      else echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" 
      style="margin-top: 70px;width:300px;height:380px;" class="z-depth-5"/>';

      ?> 
      </div>       
      </div>
      </div>

</div>

<!--***************************************************************************-->

<div id="test1" class="col s12">
      <div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;">Time Table</h1>
      <div class="col l12 pull-l2 " style="margin-left: 180px;">
      <table class="bordered striped" >
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
<?php 
   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." ORDER BY sno ASC;";
   $result = mysqli_query($db,$sql1);   

    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>".
            '<td>'.$row['day']."</td>".
            '<td>'. $row['pd1'] . "</td>".
            '<td>'. $row['pd2'] . "</td>".
            '<td>'. $row['pd3'] . "</td>".
            '<td>'. $row['pd4'] . "</td>".
            '<td>'. $row['pd5'] . "</td>".
            '<td>'. $row['pd6'] . "</td>".
            "</tr>";
          }

?> 


        </tbody>
      </table>
      </div>
      </div>
      </div>
</div>

<!--***************************************************************************-->


<div id="test2" class="col s12">

      <div class="container">
      <div class="row">
      <h1 style="text-align: center;">Marks</h1>
      <div class="col l12 pull-l2 " style="margin-left: 180px;">

      <table  class="bordered striped" style="margin-top: 10px:">
        <thead>
          <tr >
              
              <th data-field="id"><strong>Subject</strong></th>
              <th data-field="id"><strong>Mid term 1</strong></th>
              <th data-field="id"><strong>Mid term 2</strong></th>
              <th data-field="id"><strong>Final</strong></th>                            
          </tr>
        </thead>

        <tbody>
<?php 
   $sql1 = "SELECT * FROM english where id = ".$_SESSION['id'].";";
   $result = mysqli_query($db,$sql1);
   $row = mysqli_fetch_assoc($result);   
   echo     "<tr>".
            '<td>'."English"."</td>".
            '<td>'. $row['mid1'] . "</td>".
            '<td>'. $row['mid2'] . "</td>".
            '<td>'. $row['final'] . "</td>".
            "</tr>";

   $sql1 = "SELECT * FROM hindi where id = ".$_SESSION['id'].";";
   $result = mysqli_query($db,$sql1);
   $row = mysqli_fetch_assoc($result);   
   echo     "<tr>".
            '<td>'."Hindi"."</td>".
            '<td>'. $row['mid1'] . "</td>".
            '<td>'. $row['mid2'] . "</td>".
            '<td>'. $row['final'] . "</td>".
            "</tr>";

   $sql1 = "SELECT * FROM maths where id = ".$_SESSION['id'].";";
   $result = mysqli_query($db,$sql1);
   $row = mysqli_fetch_assoc($result);   
   echo     "<tr>".
            '<td>'."Maths"."</td>".
            '<td>'. $row['mid1'] . "</td>".
            '<td>'. $row['mid2'] . "</td>".
            '<td>'. $row['final'] . "</td>".
            "</tr>";

   $sql1 = "SELECT * FROM science where id = ".$_SESSION['id'].";";
   $result = mysqli_query($db,$sql1);
   $row = mysqli_fetch_assoc($result);   
   echo     "<tr>".
            '<td>'."Science"."</td>".
            '<td>'. $row['mid1'] . "</td>".
            '<td>'. $row['mid2'] . "</td>".
            '<td>'. $row['final'] . "</td>".
            "</tr>";

   $sql1 = "SELECT * FROM social where id = ".$_SESSION['id'].";";
   $result = mysqli_query($db,$sql1);
   $row = mysqli_fetch_assoc($result);   
   echo     "<tr>".
            '<td>'."Social"."</td>".
            '<td>'. $row['mid1'] . "</td>".
            '<td>'. $row['mid2'] . "</td>".
            '<td>'. $row['final'] . "</td>".
            "</tr>";

?>
        </tbody>
      </table>
        
      </div>
      </div>
      </div>  



</div>

<!--***************************************************************************-->

<div id="test3" class="col s12" style="margin-left: 220px;">
<br><br><br><br>
<h5>&nbsp;&nbsp;Got some Query/Suggestion? Send your message to class teacher</h5>
        
        <form action="" method="POST">
        <div class="row">
        
        <div class="input-field col l12">
        <textarea id="feed" class="materialize-textarea" name="feed" style="width: 800px;"></textarea>
        <label for="feed">Write your feedback here</label>
                <br><br>
        </div>


        <p>
        <input type="checkbox" id="sender" name="sender" />
        <label for="sender" style="margin-left: 10px;">Also send a copy to Principal</label>
        </p>
        <br>
        <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-left: 10px;">Submit
        <i class="material-icons right">send</i>
        </button>
        
        </div>
        </form>

      <?php

         if($_SERVER["REQUEST_METHOD"] == "POST") {

            $feedback = mysqli_real_escape_string($db,$_POST['feed']);
          
          if ($_POST['feed'] == "") {
               echo "<script>window.alert('Give inputs')</script>";
              
            }

          else{
              
              $query = "INSERT INTO feed(id,feedback,date) VALUES ('$user_check', '".$feedback."', CURRENT_DATE);";
              $conclue = mysqli_query($db,$query);

              if (isset($_POST['sender'])) {
                $query = "INSERT INTO feed_principal(id,feedback,date) VALUES ('$user_check', '".$feedback."', CURRENT_DATE);";
                $conclue = mysqli_query($db,$query);
              }
            }
          } 
      ?>
</div>

    

</div>
</body>
</html>



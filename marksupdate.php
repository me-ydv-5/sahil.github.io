<?php
  include('session.php');
?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $e1 = mysqli_real_escape_string($db,$_POST['e1']);
    $e2 = mysqli_real_escape_string($db,$_POST['e2']);
    $e3 = mysqli_real_escape_string($db,$_POST['e3']);
    $sql = "UPDATE english SET mid1= $e1,mid2= $e2,final= $e3 WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sql);
    
    $m1 = mysqli_real_escape_string($db,$_POST['m1']);
    $m2 = mysqli_real_escape_string($db,$_POST['m2']);
    $m3 = mysqli_real_escape_string($db,$_POST['m3']);
    $sq2 = "UPDATE maths SET mid1= $m1,mid2=$m2,final=$m3 WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sq2);
      
    $h1 = mysqli_real_escape_string($db,$_POST['h1']);
    $h2 = mysqli_real_escape_string($db,$_POST['h2']);
    $h3 = mysqli_real_escape_string($db,$_POST['h3']);
    $sq3 = "UPDATE hindi SET mid1= $h1,mid2= $h2,final= $h3 WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sq3); 

    $s1 = mysqli_real_escape_string($db,$_POST['s1']);
    $s2 = mysqli_real_escape_string($db,$_POST['s2']);
    $s3 = mysqli_real_escape_string($db,$_POST['s3']);
    $sq4 = "UPDATE science SET mid1=$s1,mid2=$s2,final=$s3 WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sq4);

    $ss1 = mysqli_real_escape_string($db,$_POST['ss1']);
    $ss2 = mysqli_real_escape_string($db,$_POST['ss2']);
    $ss3 = mysqli_real_escape_string($db,$_POST['ss3']);
    $sq5 = "UPDATE social SET mid1= $ss1,mid2= $ss2,final= $ss3 WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sq5);

    $rank = mysqli_real_escape_string($db,$_POST['rank']);
    $sq6 = "UPDATE login_stu_main SET rank= $rank WHERE id= '".$_SESSION['stu_id']."';";
    $result1 = mysqli_query($db,$sq6);

    header("location:login_tchr.php");

  }

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

	<title>Welcome</title>
</head>


<body style="background-color: #ffcdd2 ">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>





<!--***************************************************************************-->

<!--***************************************************************************--> 
    <div class="navbar-fixed">
    <nav class="nav-extended" style="background-color: #ff6f00">
    <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Update Marks</a>
     <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li style="margin-right: 20px;">Student - &nbsp;<?php echo $_SESSION['stu_name']; ?></li>
      <li>Student ID- &nbsp;<?php echo $_SESSION['stu_id']; ?></li>
       </ul>   
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="login_tchr.php" ><i class="material-icons left">account_circle</i>Home</a></li>
        <li><a href="pswd.php"><i class="material-icons left">security</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

    </div>
  	</nav>    	

    </div>
<div class="col l12 ">
<?php 
   $sql1 = "SELECT * FROM english where id = ".$_SESSION['stu_id'].";";
   $result = mysqli_query($db,$sql1);
   $row1 = mysqli_fetch_assoc($result);
   
   $sql2 = "SELECT * FROM hindi where id = ".$_SESSION['stu_id'].";";
   $result2 = mysqli_query($db,$sql2);
   $row2 = mysqli_fetch_assoc($result2);
   
   $sql3 = "SELECT * FROM maths where id = ".$_SESSION['stu_id'].";";
   $result3 = mysqli_query($db,$sql3);
   $row3 = mysqli_fetch_assoc($result3);
   
   $sql4 = "SELECT * FROM science where id = ".$_SESSION['stu_id'].";";
   $result4 = mysqli_query($db,$sql4);
   $row4 = mysqli_fetch_assoc($result4);
   
   $sql5 = "SELECT * FROM social where id = ".$_SESSION['stu_id'].";";
   $result5 = mysqli_query($db,$sql5);
   $row5 = mysqli_fetch_assoc($result5);
?>

<form action="" method="POST">

      <table class="centered bordered striped" >
        <thead>
          <tr >
              <th data-field="id" style="text-align: center;width:200px;"><strong><h5>Subject</h5></strong></th>
              <th data-field="id" style="text-align: center;width:200px;padding-right: 120px;"><strong><h5>Mid Term 1</h5></strong></th>
              <th data-field="id" style="text-align: center;width:200px;padding-right: 120px;"><strong><h5>Mid Term 2</h5></strong></th>
              <th data-field="id" style="text-align: center;width:200px;padding-right: 120px;"><strong><h5>Final Term</h5></strong></th>                            
          </tr>
        </thead>

        <tbody>

<tr>
<td><h5>English</h5></td>
<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row1['mid1'] ?> id='e1' type='text' class='validate' name='e1'>
<label class="active" for="e1">English Marks Mid Term 1</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row1['mid2'] ?> id='e2' type='text' class='validate' name='e2'>
<label class="active" for="e2">English Marks Mid Term 2</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row1['final'] ?> id='e3' type='text' class='validate' name='e3'>
<label class="active" for="e3">English Final Term</label>
</div></td>
</tr>


<tr>
<td><h5>Hindi</h5></td>
<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row2['mid1'] ?> id='h1' type='text' class='validate' name='h1'>
<label class="active" for="h1">Hindi Marks Mid Term 1</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row2['mid2'] ?> id='h2' type='text' class='validate' name='h2'>
<label class="active" for="h2">Hindi Marks Mid Term 2</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row2['final'] ?> id='h3' type='text' class='validate' name='h3'>
<label class="active" for="h3">Hindi Final Term</label>
</div></td>
</tr>



<tr>
<td><h5>Maths</h5></td>
<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row3['mid1'] ?> id='m1' type='text' class='validate' name='m1'>
<label class="active" for="m1">Maths Marks Mid Term 1</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row3['mid2'] ?> id='m2' type='text' class='validate' name='m2'>
<label class="active" for="m2">Maths Marks Mid Term 2</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row3['final'] ?> id='m3' type='text' class='validate' name='m3'>
<label class="active" for="m3">Maths Final Term</label>
</div></td>
</tr>


<tr>
<td><h5>Science</h5></td>
<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row4['mid1'] ?> id='s1' type='text' class='validate' name='s1'>
<label class="active" for="s1">Science Marks Mid Term 1</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row4['mid2'] ?> id='s2' type='text' class='validate' name='s2'>
<label class="active" for="s2">Science Marks Mid Term 2</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row4['final'] ?> id='s3' type='text' class='validate' name='s3'>
<label class="active" for="s3">Science Final Term</label>
</div></td>
</tr>


<tr>
<td><h5>Social</h5></td>
<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row5['mid1'] ?> id='ss1' type='text' class='validate' name='ss1'>
<label class="active" for="ss1">Social Marks Mid Term 1</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row5['mid2'] ?> id='ss2' type='text' class='validate' name='ss2'>
<label class="active" for="ss2">Social Marks Mid Term 2</label>
</div></td>

<td><div class="input-field col s1" style="width:200px;padding-left:30px;"><input value=<?php echo $row5['final'] ?> id='ss3' type='text' class='validate' name='ss3'>
<label class="active" for="ss3">Social Final Term</label>
</div></td>
</tr>

    </tbody>

      </table>


<!--   <div class="input-field">
   <h5> Student's Class Rank</h5>
      <input id="rank" type="text" class="validate" name="rank" style="margin-left: 350px;width: 200px;">
      <label for="rank" style="margin-left: 350px;">Enter Rank</label>
    </div>   -->




  <div style="text-align: center;margin-top: 40px;">
  <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-bottom: 20px;" >UPDATE MARKS
  <i class="material-icons right">send</i>
  </button>    
  </form>
    

  </div>

  

  
 

</body>
</html>



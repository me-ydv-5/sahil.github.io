<?php
  include('session.php');
   
   $sql = "SELECT * FROM ".$_SESSION['mychoice']."_main WHERE id = ".$user_check.";";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $_SESSION['name'] = $row['name'];
   $_SESSION['id'] = $row['id'];
   $_SESSION['class'] = $row['class'];


?>
<?php 


if($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['update'] == "") {
        echo "<script>window.alert('Please enter the ID first')</script>";
    }
    else{
      $update = mysqli_real_escape_string($db,$_POST['update']);
      $sql = "SELECT name from login_stu_main where id=".$_POST['update'].";";
      $result3 = mysqli_query($db,$sql);
      $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result3);
    
      if($count == 1) {
        $_SESSION['stu_name'] = $row3['name'];
        $_SESSION['stu_id'] = $_POST['update'];
        header("location: marksupdate.php");
    }
      else{
        echo "<script>window.alert('Something went wrong! Please try again')</script>";
      }
}
}

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


<body style="background-color: #ffcdd2 ">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>





<!--***************************************************************************-->

<!--***************************************************************************--> 
    <div class="navbar-fixed" >
    <nav class="nav-extended" style="background-color: #ff6f00">
    <div class="nav-wrapper" >
     <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li style="margin-right: 20px;"><i class="material-icons left ">account_circle</i><?php echo $row['name']; ?></li>
      <li><i class="material-icons left ">perm_identity</i><?php echo $row['id']; ?></li>
      <li style="margin-left: 15px;"><i class="material-icons left ">picture_in_picture</i>Class Teacher&nbsp;&nbsp;<?php echo $row['class']; ?></li>
       </ul>   
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <!-- <li class="active"><a href="login_tchr.php" ><i class="material-icons left">account_circle</i>Home</a></li> -->
        <li><a href="pswd.php"><i class="material-icons left">security</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Time Table</a></li>
        <li class="tab"><a href="#test2">Update Marks</a></li>
        <li class="tab"><a href="#test3">Messages</a></li>
        <li class="tab"><a href="#test4">Students List</a></li>
      </ul>

    </div>
  	</nav>    	

    </div>

<div id="test1" class="col s12">
  
<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 60px;">Time Table</h1>
      <div class="col l12 pull-l2 " >


<form action="settime.php" method="POST">

      <table class="centered bordered striped" style="margin-left: 80px;" >
        <thead>
          <tr >
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Day</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 1</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 2</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 3</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 4</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 5</h5></strong></th>
              <th data-field="id" style="text-align: center;width:150px;"><strong><h5>Period 6</h5></strong></th>                            
          </tr>
        </thead>

        <tbody>
<?php 
   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 1 ;";
   $result = mysqli_query($db,$sql1);
   $row1 = mysqli_fetch_assoc($result);

   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 2 ;";
   $result = mysqli_query($db,$sql1);
   $row2 = mysqli_fetch_assoc($result);

   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 3 ;";
   $result = mysqli_query($db,$sql1);
   $row3 = mysqli_fetch_assoc($result);

   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 4 ;";
   $result = mysqli_query($db,$sql1);
   $row4 = mysqli_fetch_assoc($result);

   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 5 ;";
   $result = mysqli_query($db,$sql1);
   $row5 = mysqli_fetch_assoc($result);

   $sql1 = "SELECT * FROM tt_".$_SESSION['class']." where sno = 6 ;";
   $result = mysqli_query($db,$sql1);
   $row6 = mysqli_fetch_assoc($result);
?>


<tr>

<td><h5><?php echo $row1['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd1'] ?> id='d1' type='text' class='validate' name='d1'>
<label class="active" for="d1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd2'] ?> id='d2' type='text' class='validate' name='d2'>
<label class="active" for="d2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd3'] ?> id='d3' type='text' class='validate' name='d3'>
<label class="active" for="d3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd4'] ?> id='d4' type='text' class='validate' name='d4'>
<label class="active" for="d4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd5'] ?> id='d5' type='text' class='validate' name='d5'>
<label class="active" for="d5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row1['pd6'] ?> id='d6' type='text' class='validate' name='d6'>
<label class="active" for="d6">Period 6</label>
</div></td>

</tr>

<tr>

<td><h5><?php echo $row2['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd1'] ?> id='e1' type='text' class='validate' name='e1'>
<label class="active" for="e1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd2'] ?> id='e2' type='text' class='validate' name='e2'>
<label class="active" for="e2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd3'] ?> id='e3' type='text' class='validate' name='e3'>
<label class="active" for="e3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd4'] ?> id='e4' type='text' class='validate' name='e4'>
<label class="active" for="e4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd5'] ?> id='e5' type='text' class='validate' name='e5'>
<label class="active" for="e5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row2['pd6'] ?> id='e6' type='text' class='validate' name='e6'>
<label class="active" for="e6">Period 6</label>
</div></td>

</tr>

<tr>

<td><h5><?php echo $row3['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd1'] ?> id='f1' type='text' class='validate' name='f1'>
<label class="active" for="f1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd2'] ?> id='f2' type='text' class='validate' name='f2'>
<label class="active" for="f2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd3'] ?> id='f3' type='text' class='validate' name='f3'>
<label class="active" for="f3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd4'] ?> id='f4' type='text' class='validate' name='f4'>
<label class="active" for="f4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd5'] ?> id='f5' type='text' class='validate' name='f5'>
<label class="active" for="f5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row3['pd6'] ?> id='f6' type='text' class='validate' name='f6'>
<label class="active" for="f6">Period 6</label>
</div></td>

</tr>

<tr>

<td><h5><?php echo $row4['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd1'] ?> id='g1' type='text' class='validate' name='g1'>
<label class="active" for="g1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd2'] ?> id='g2' type='text' class='validate' name='g2'>
<label class="active" for="g2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd3'] ?> id='g3' type='text' class='validate' name='g3'>
<label class="active" for="g3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd4'] ?> id='g4' type='text' class='validate' name='g4'>
<label class="active" for="g4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd5'] ?> id='g5' type='text' class='validate' name='g5'>
<label class="active" for="g5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row4['pd6'] ?> id='g6' type='text' class='validate' name='g6'>
<label class="active" for="g6">Period 6</label>
</div></td>

</tr>

<tr>

<td><h5><?php echo $row5['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd1'] ?> id='h1' type='text' class='validate' name='h1'>
<label class="active" for="h1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd2'] ?> id='h2' type='text' class='validate' name='h2'>
<label class="active" for="h2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd3'] ?> id='h3' type='text' class='validate' name='h3'>
<label class="active" for="h3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd4'] ?> id='h4' type='text' class='validate' name='h4'>
<label class="active" for="h4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd5'] ?> id='h5' type='text' class='validate' name='h5'>
<label class="active" for="h5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row5['pd6'] ?> id='h6' type='text' class='validate' name='h6'>
<label class="active" for="h6">Period 6</label>
</div></td>

</tr>

<tr>

<td><h5><?php echo $row6['day'] ?></h5></td>
<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd1'] ?> id='i1' type='text' class='validate' name='i1'>
<label class="active" for="i1">Period 1</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd2'] ?> id='i2' type='text' class='validate' name='i2'>
<label class="active" for="i2">Period 2</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd3'] ?> id='i3' type='text' class='validate' name='i3'>
<label class="active" for="i3">Period 3</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd4'] ?> id='i4' type='text' class='validate' name='i4'>
<label class="active" for="i4">Period 4</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd5'] ?> id='i5' type='text' class='validate' name='i5'>
<label class="active" for="i5">Period 5</label>
</div></td>

<td><div class="input-field col s1" style="width:150px;padding-left:30px;"><input value=<?php echo $row6['pd6'] ?> id='i6' type='text' class='validate' name='i6'>
<label class="active" for="i6">Period 6</label>
</div></td>

</tr>

</tbody>
</table>



<div style="text-align: center;margin-top: 40px;">
<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-bottom: 20px;" >UPDATE Time Table
<i class="material-icons right">send</i>
</button>
</div> 
        </form>
        </div>

</div>
</div>
</div>




<div id="test2" class="col s12" style="margin-left: 30px;"><br><br><br>
<h3 >Give the id of the student for whom you wish to update the marks:</h3>
       
        <form action="" method="POST">
         <div class="input-field col s6">
          <input id="update" type="text" class="validate" name="update" style="width: 150px;">
          <label for="update">ID</label>
        </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>         
        </form>

</div>
  



<div id="test3" class="col s12"><br><br><br>

<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 10px;">Messages</h1>
      <div class="col l12 pull-l2 " style="margin-left: 180px;">
      <table class="responsive-table bordered striped" >
        <thead>
          <tr >
              <th data-field="id" style="text-align: center;"><strong>Date</strong></th>
              <th data-field="id" style="text-align: center;"><strong>ID</strong></th>
              <th data-field="id" style="text-align: center;"><strong>Name</strong></th>
              <th data-field="id" style="text-align: center;"><strong>Feedback</strong></th>                            
          </tr>
        </thead>

        <tbody>
<?php 
   $sql1 = "SELECT * FROM feed WHERE id LIKE '".$_SESSION['class']."%' or id =11111 ORDER BY date DESC;";
   $result = mysqli_query($db,$sql1);   

    while($row = mysqli_fetch_assoc($result)) {
      $sql2 = "SELECT name FROM login_stu_main WHERE id = ".$row['id'].";";
      $result2 = mysqli_query($db,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC); 
            echo "<tr>".
            '<td style="text-align: center;">'.$row['date']."</td>".
            '<td style="text-align: center;">'.$row['id']."</td>".
            '<td style="text-align: center;">'. $row2['name'] . "</td>".
            '<td>'. $row['feedback'] . "</td>".
            "</tr>";
          }

?> 
        </tbody>
      </table>
      </div>
      </div>
      </div>
   </div>


<div id="test4" class="col s12">
<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 80px;">Class Student's List</h1>
      <div class="col l6 pull-l2">
      <table class="responsive-table bordered striped" >
        <thead>
          <tr >
              <th data-field="id" style="text-align: center;"><strong>ID</strong></th>
              <th data-field="id" style="text-align: center;"><strong>Name</strong></th>                   
          </tr>
        </thead>

        <tbody>
<?php 
   $sql1 = "SELECT * FROM login_stu_main WHERE id LIKE '".$_SESSION['class']."%' order by id asc;";
   $result = mysqli_query($db,$sql1);   

    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>".
            '<td style="text-align: center;">'.$row['id']."</td>".
            '<td style="text-align: center;">'.$row['name']."</td>".
            "</tr>";
          }

?> 
        </tbody>
      </table>
      </div>
<form action="checker.php" method="POST">
    <div class="col l6">
     <h5>Send Message:</h5>

     <div class="input-field col s6">

      <input id="roll" type="text" class="validate" name="roll" style="margin-top: 37px;">
      <label for="roll">Enter ID</label>

    </div>

    <div class="input-field col s6">
      <textarea id="message" class="materialize-textarea" name="message"></textarea>
      <label for="message">Enter message</label>
    </div>

    <p>
    <input type="checkbox" id="sender" name="sender" />
    <label for="sender" style="margin-left: 10px;">To Principal</label>
    </p>

    <p>
    <input type="checkbox" id="stud" name="stud" onclick="return confirm('Are you sure to send this message to ALL students?')" />
    <label for="stud" style="margin-left: 10px;">To All students</label>
    </p>


    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-bottom: 20px;" >Send Message
    <i class="material-icons right">send</i>
    </button>  

    </div>    
</form>



      </div>
      </div>   





</div>






</body>
</html>



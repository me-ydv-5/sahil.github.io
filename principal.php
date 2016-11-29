<?php
  include('session.php');
   $sql = "SELECT * FROM login_tchr_main WHERE id = ".$user_check.";";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $_SESSION['name'] = $row['name'];
   $_SESSION['id'] = $row['id'];
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


<body style="background-color: #aed581 ">
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>





<!--***************************************************************************-->

    <div class="navbar-fixed" >
    <nav class="nav-extended" style="background-color: #388e3c ">
    <div class="nav-wrapper" >
     <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li style="margin-right: 20px;"><i class="material-icons left ">account_circle</i><?php echo $_SESSION['name']; ?></li>
      <li><i class="material-icons left ">picture_in_picture</i><?php echo $row['id']; ?></li>
      <!-- <li style="margin-left: 15px;"><i class="material-icons left ">picture_in_picture</i>Class Teacher&nbsp;&nbsp;<?php echo $row['class']; ?></li> -->
       </ul>   
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <!-- <li class="active"><a href="login_tchr.php" ><i class="material-icons left">account_circle</i>Home</a></li> -->
        <li><a href="pswd.php"><i class="material-icons left">security</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>

      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Teachers</a></li>
        <li class="tab"><a href="#test2">Students</a></li>
        <li class="tab"><a href="#test3">Messages</a></li>
        <li class="tab"><a href="#test4">Global NOtifications</a></li>
        <li class="tab"><a href="#test5">Add Student/Teacher</a></li>
        <li class="tab"><a href="#test6">Delete Student/Teacher</a></li>  
      </ul>

    </div>
   </nav>      

    </div>
<!--***************************************************************************--> 
<div id="test1" class="col s12">
<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 80px;">Teacher's List</h1>
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
   $sql1 = "SELECT * FROM login_tchr_main order by id asc;";
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
<form action="tchr_sender.php" method="POST">
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
    <input type="checkbox" id="stud" name="stud" onclick="return confirm('Are you sure to send this message to ALL students?')" />
    <label for="stud" style="margin-left: 10px;">To All Teachers</label>
    </p>


    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-bottom: 20px;" >Send Message
    <i class="material-icons right">send</i>
    </button>  

    </div>    
</form>



      </div>
      </div>     


</div>

<!--***************************************************************************--> 

<div id="test2" class="col s12">
<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 80px;">School Student's List</h1>
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
   $sql1 = "SELECT * FROM login_stu_main order by id asc;";
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
<form action="stu_sender.php" method="POST">
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
<!--***************************************************************************--> 


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
              <th data-field="id" style="text-align: center;"><strong>Message</strong></th>                            
          </tr>
        </thead>

        <tbody>
<?php 
   $sql1 = "SELECT * FROM feed_principal ORDER BY date DESC;";
   $result = mysqli_query($db,$sql1);   

    while($row = mysqli_fetch_assoc($result)) {
      $sql2 = "SELECT name FROM login_stu_main WHERE id = ".$row['id'].";";
      $result2 = mysqli_query($db,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      
      if ($row2['name'] =='') {
      
      $sql3 = "SELECT name FROM login_tchr_main WHERE id = ".$row['id'].";";
      $result3 = mysqli_query($db,$sql3);
      $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);  

      echo "<tr>".
      '<td style="text-align: center;">'.$row['date']."</td>".
      '<td style="text-align: center;">'.$row['id']."</td>".
      '<td style="text-align: center;">'. $row3['name'] . "</td>".
      '<td>'. $row['feedback'] . "</td>".
      "</tr>"; 
       
    }
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
<!--***************************************************************************--> 

<div id="test4" class="col s12"><br><br><br>

<div class="container">
      <div class="row">
      <h1 style="text-align: center;margin-bottom: 10px;margin-top: 10px;">Global Announcements</h1>
      <div class="col l6 pull-l2 " style="margin-left: 80px;">
 
     
<form action="" method="POST">
<div class="col l6" >
  <h4>Send a new announcement</h4>
  <br>
  <div class="input-field col s6">
      <textarea id="message" class="materialize-textarea" name="message" style="width: 400px;"></textarea>
      <label for="message">Enter Announcement</label>
    </div>
   
    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-bottom: 20px;" >Send
    <i class="material-icons right">send</i>
    </button>
</div>
      </form>
<?php 

  if($_SERVER["REQUEST_METHOD"] == "POST") {

        if($_POST['message']==''){
      echo "<script>window.alert('Please fill the message')</script>";
    }

    else{
         $message = mysqli_real_escape_string($db,$_POST['message']); 
         $sql ="insert into global_notif (date,notification) values (CURRENT_DATE,'$message');";
         $query = mysqli_query($db,$sql);
       }
     }

?>



      </div>
      </div>
      </div>
   



 </div>

<!--***************************************************************************--> 
<form method="POST" action="add.php">
<div id="test5" class="col s12" ><br><br><br>
<h1>Add student/teacher</h1>
        <div class="input-field col s6" style="width: 200px;margin-left: 100px;">
          <input id="name" type="text" class="validate" name="name" >
          <label for="name">Name</label>
        </div>
        <div class="input-field col s6" style="width: 200px;margin-left: 100px;">
          <input id="id" type="text" class="validate" name="id" width="200px;">
          <label for="id">id</label>
        </div>
        <div class="input-field col s6" style="width: 200px;margin-left: 100px;">
          <input id="class" type="text" class="validate" name="class" width="200px;">
          <label for="class">class</label>
        </div>

         <p style="margin-left: 100px;">
      <input name="chooseone" type="radio" id="login_stu" style="margin-left: 100px;" />
      <label for="login_stu">Student</label>
    </p>
    <p style="margin-left: 100px;">
      <input name="chooseone" type="radio" id="login_tchr" style="margin-left: 100px;" />
      <label for="login_tchr">Teacher</label>
    </p>

              <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 100px;">Submit
          <i class="material-icons right">send</i>
        </button> 

</div>
</form>
<!--***************************************************************************--> 
<form method="POST" action="remove.php">
  

<div id="test6" class="col s12"><br><br>
<h1>Remove student/teacher</h1>
        <div class="input-field col s6" style="width: 200px;margin-left: 100px;">
          <input id="last_name" type="text" class="validate" name="last_name" width="200px;">
          <label for="last_name">id</label>
        </div>

         <p style="margin-left: 100px;">
      <input name="group1" type="radio" id="login_stu"  />
      <label for="login_stu">Student</label>
    </p>
    <p style="margin-left: 100px;" >
      <input name="group1" type="radio" id="login_tchr" >
      <label for="login_tchr">Teacher</label>
    </p>
              <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 100px;">Submit
          <i class="material-icons right">send</i>
        </button> 


</div>
</form>
    </body>

    </html>

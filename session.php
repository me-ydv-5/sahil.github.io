<?php
   include('config.php');

   session_start();
   
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT id FROM ".$_SESSION['mychoice']." WHERE id = '$user_check';";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   $login_session = $row['id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>

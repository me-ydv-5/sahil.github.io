<?php
    
  include('session.php');
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
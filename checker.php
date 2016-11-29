<?php 
  include('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(($_POST['roll']=='' && !isset($_POST['sender']) && !isset($_POST['stud'])) || $_POST['message']==''){
      echo "<script>window.alert('Please give required inputs')</script>";
       die('<a  href="login_tchr.php">Go Back</a>');

    
    }

    else{
         $roll = mysqli_real_escape_string($db,$_POST['roll']);       
         $message = mysqli_real_escape_string($db,$_POST['message']);

         if ($roll != '' ) 
         {
               $sql = "SELECT * from login_stu where id=$roll;";
               $result = mysqli_query($db,$sql);
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               $count =mysqli_num_rows($result);
         
              if($count == 1) {

                          if (isset($_POST['stud'])) {
                            $sql = "SELECT * FROM login_stu where id like '".$_SESSION['class']."%' ;";
                            $result = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              $query = "INSERT INTO notif(id,feedback,date) VALUES ('".$row['id']."', $message, CURRENT_DATE);";
                              $conclue = mysqli_query($db,$query); 
                            }
                          if (isset($_POST['sender'])) {
                            $query = "INSERT INTO feed_principal(id,feedback,date) VALUES ('".$_SESSION['id']."', $message, CURRENT_DATE);";
                            $conclue = mysqli_query($db,$query);
                          }


                          echo "Message Sent Successfully";
                          die('<a  href="login_tchr.php">Go Back</a>');
                          }

                      $query = "INSERT INTO notif(id,notifications,date) VALUES ('$roll', '$message', CURRENT_DATE);";
                      $conclue = mysqli_query($db,$query);

                      if (isset($_POST['sender'])) {
                        $query = "INSERT INTO feed_principal(id,feedback,date) VALUES ('".$_SESSION['id']."', $message, CURRENT_DATE);";
                        $conclue = mysqli_query($db,$query);
                      }
                   }
            
            else {
                    echo "No such student exists!";
                    die('<a  href="login_tchr.php">Go Back</a>');
            }
        }




    if (isset($_POST['sender'])) {
            $query = "INSERT INTO feed_principal(id,feedback,date) VALUES ('".$_SESSION['id']."', '$message', CURRENT_DATE);";
            $conclue = mysqli_query($db,$query);
      }

    if (isset($_POST['stud'])) {
      $sql = "SELECT * FROM login_stu where id like '".$_SESSION['class']."%' ;";
      $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $query = "INSERT INTO notif(id,feedback,date) VALUES ('".$row['id']."', $message, CURRENT_DATE);";
        $conclue = mysqli_query($db,$query); 
      }

    }

    echo "Message Sent Successfully";
     die('<a  href="login_tchr.php">Go Back</a>');
  }

}


?>
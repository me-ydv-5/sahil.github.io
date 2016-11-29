<?php 
  include('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(($_POST['roll']=='' && !isset($_POST['stud'])) || $_POST['message']==''){
      echo "<script>window.alert('Please give required inputs')</script>";
       die('<a  href="principal.php">Go Back</a>');

    
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
                            $sql = "SELECT * FROM login_stu ;";
                            $result = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              $query = "INSERT INTO notif(id,notifications,date) VALUES ('".$row['id']."', '$message', CURRENT_DATE);";
                              $conclue = mysqli_query($db,$query); 
                            }

                          
                          die('Message Sent Successfully to all students(1)<a  href="principal.php">Go Back</a>');
                          }

                      $query = "INSERT INTO notif(id,notifications,date) VALUES ('$roll', '$message', CURRENT_DATE);";
                      $conclue = mysqli_query($db,$query);

      
                      die('Message Sent Successfully<a  href="principal.php">Go Back</a>');
                   }
            
            else {
                    
                    die('No such student exists<a  href="principal.php">Go Back</a>');
            }
        }


    if (isset($_POST['stud'])) {
      $sql = "SELECT * FROM login_stu ;";
      $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $query = "INSERT INTO notif(id,notifications,date) VALUES ('".$row['id']."', '$message', CURRENT_DATE);";
        $conclue = mysqli_query($db,$query); 
      }

    }

    echo "Message Sent Successfully to all students.(2)";
     die('<a  href="principal.php">Go Back</a>');
  }

}


?>
<?php
    include('session.php');


  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $d1 = mysqli_real_escape_string($db,$_POST['d1']);
    $d2 = mysqli_real_escape_string($db,$_POST['d2']);
    $d3 = mysqli_real_escape_string($db,$_POST['d3']);
    $d4 = mysqli_real_escape_string($db,$_POST['d4']);
    $d5 = mysqli_real_escape_string($db,$_POST['d5']);
    $d6 = mysqli_real_escape_string($db,$_POST['d6']);
    $sql = "UPDATE tt_".$_SESSION['class']." set pd1='$d1', pd2='$d2', pd3='$d3', pd4='$d4', pd5='$d5', pd6='$d6' where sno = 1 ;";
    $result1 = mysqli_query($db,$sql);
    
    $e1 = mysqli_real_escape_string($db,$_POST['e1']);
    $e2 = mysqli_real_escape_string($db,$_POST['e2']);
    $e3 = mysqli_real_escape_string($db,$_POST['e3']);
    $e4 = mysqli_real_escape_string($db,$_POST['e4']);
    $e5 = mysqli_real_escape_string($db,$_POST['e5']);
    $e6 = mysqli_real_escape_string($db,$_POST['e6']);
    $sq2 = "UPDATE tt_".$_SESSION['class']." set pd1='$e1', pd2='$e2', pd3='$e3', pd4='$e4', pd5='$e5', pd6='$e6' where sno = 2 ;";
    $result1 = mysqli_query($db,$sq2);
      
    $g1 = mysqli_real_escape_string($db,$_POST['g1']);
    $g2 = mysqli_real_escape_string($db,$_POST['g2']);
    $g3 = mysqli_real_escape_string($db,$_POST['g3']);
    $g4 = mysqli_real_escape_string($db,$_POST['g4']);
    $g5 = mysqli_real_escape_string($db,$_POST['g5']);
    $g6 = mysqli_real_escape_string($db,$_POST['g6']);
    $sq3= "UPDATE tt_".$_SESSION['class']." set pd1='$g1', pd2='$g2', pd3='$g3', pd4='$g4', pd5='$g5', pd6='$g6' where sno = 4 ;";
    $result1 = mysqli_query($db,$sq3); 

    $h1 = mysqli_real_escape_string($db,$_POST['h1']);
    $h2 = mysqli_real_escape_string($db,$_POST['h2']);
    $h3 = mysqli_real_escape_string($db,$_POST['h3']);
    $h4 = mysqli_real_escape_string($db,$_POST['h4']);
    $h5 = mysqli_real_escape_string($db,$_POST['h5']);
    $h6 = mysqli_real_escape_string($db,$_POST['h6']);
    $sq4 = "UPDATE tt_".$_SESSION['class']." set pd1='$h1', pd2='$h2', pd3='$h3',  pd4='$h4',  pd5='$h5',  pd6='$h6' where sno = 5 ;";
    $result1 = mysqli_query($db,$sq4);

    $i1 = mysqli_real_escape_string($db,$_POST['i1']);
    $i2 = mysqli_real_escape_string($db,$_POST['i2']);
    $i3 = mysqli_real_escape_string($db,$_POST['i3']);
    $i4 = mysqli_real_escape_string($db,$_POST['i4']);
    $i5 = mysqli_real_escape_string($db,$_POST['i5']);
    $i6 = mysqli_real_escape_string($db,$_POST['i6']);
    $sql = "UPDATE tt_".$_SESSION['class']." set  pd1='$i1',  pd2='$i2',  pd3='$i3',  pd4='$i4',  pd5='$i5',  pd6='$i6' where sno = 6 ;";
    $result1 = mysqli_query($db,$sql);


    $f1 = mysqli_real_escape_string($db,$_POST['f1']);
    $f2 = mysqli_real_escape_string($db,$_POST['f2']);
    $f3 = mysqli_real_escape_string($db,$_POST['f3']);
    $f4 = mysqli_real_escape_string($db,$_POST['f4']);
    $f5 = mysqli_real_escape_string($db,$_POST['f5']);
    $f6 = mysqli_real_escape_string($db,$_POST['f6']);
    $sq5 = "UPDATE tt_".$_SESSION['class']." set  pd1='$f1',  pd2='$f2',  pd3='$f3',  pd4='$f4',  pd5='$f5',  pd6='$f6' where sno = 3 ;";
    $result1 = mysqli_query($db,$sq5);

    // $rank = mysqli_real_escape_string($db,$_POST['rank']);
    // $sq6 = "UPDATE login_stu_main SET rank= $rank WHERE id= '".$_SESSION['stu_id']."';";
    // $result1 = mysqli_query($db,$sq6);

    header("location:login_tchr.php");

  }

?>
<?php
include('../libs/db.php');
echo "\n";

session_start();

if(isset($_POST['username'])) {
   $username = stripslashes($_REQUEST['username']);
   $username = mysqli_real_escape_string($conn, $username);
   $passwd = stripslashes($_REQUEST['passwd']);
   $passwd = mysqli_real_escape_string($conn, $passwd); 

   $query = "SELECT * FROM user WHERE username='$username' AND passwd='".md5($passwd)."'";

   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   if(mysqli_num_rows($result)==1){
       $row = mysqli_fetch_array($result);

       $_SESSION['u_id'] = $row['u_id'];
       $_SESSION['user'] = $row['username'];
       $_SESSION['userlevel'] =  $row['userlevel'];
   
     if($_SESSION['userlevel'] == 'a'){
        header("Location: admin/main/index.php");
     }
     if($_SESSION['userlevel'] == 'm'){
        header("Location: user/index.php");
     }

   }else{
    echo "<script type='text/javascript'>";
    echo  "alert('Password is incorrect');";
        echo "window.location='login.php';";
    echo "</script>";
   }
   

}
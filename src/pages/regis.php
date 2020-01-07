<?php
include('../libs/db.php');
echo "\n";

if(isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $passwd = stripslashes($_REQUEST['passwd']);
    $passwd = mysqli_real_escape_string($conn, $passwd);
    $confirm = stripslashes($_REQUEST['confirm']);
    $confirm = mysqli_real_escape_string($conn, $confirm);

    if($passwd !== $confirm){
        echo "<script type='text/javascript'>";
        echo  "alert('Conform password no match!');";
        echo "window.location='login.php';";
        echo "</script>";
    }else{
    $query = "INSERT INTO user (username, email, passwd, userlevel)
               VALUES ('$username', '$email', '".md5($passwd)."', 'm')";

    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo "<script type='text/javascript'>";
        echo  "alert('ลงทะเบียนสำเร็จแล้ว กรุณาล็อคอินเพื่อเข้าใช้งาน');";
        echo "window.location='login.php';";
        echo "</script>";
     } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     }}
     $conn->close();
     
     
    
}
?>
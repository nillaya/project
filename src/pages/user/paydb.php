<?php
include('libs/db.php');
echo "\n";

if(isset($_POST["save"])){

    $qry = mysqli_query($conn,"insert into payment values('','".$_POST["pay_date"]."',
                                                              '".$_POST["pay_amount"]."',
                                                              '".$_POST["sale_id"]."',
                                                              '".$_POST["status_pay"]."',
                                                             '".$_FILES["pay_bill"]["name"]."')") or die("Cannot query with database");
                                                            
         if($qry){
        $target_dir = "pic/";
        $target_file = $target_dir . basename($_FILES["pay_bill"]["name"]);      
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $m='คุณได้ทำการการชำระเรียบร้อยแล้ว';


        if(move_uploaded_file($_FILES["pay_bill"]["tmp_name"],$target_file)){
           
                echo "<script type='text/javascript'> 
                alert(' $m'); 
                window.location.replace(\"index.php\")
                </script>";
        }
        else{
            "Upload failed";
        }
    }
}
?>
<?php
include('../../../libs/db.php');
echo "\n";

if(isset($_POST["save"])){
    $qry = mysqli_query($conn,"insert into product values('','".$_POST["p_name"]."',
                                                             '".$_POST["partner_id"]."',
                                                             '".$_POST["p_price"]."',
                                                             '".$_POST["p_size"]."',
                                                             '".$_POST["p_qt"]."', 
                                                             '".$_POST["p_detail"]."',
                                                             '".$_FILES["p_image"]["name"]."')") or die("Cannot query with database");
                                                            
         if($qry){
        $target_dir = "../../pic/";
        $target_file = $target_dir . basename($_FILES["p_image"]["name"]);      
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES["p_image"]["tmp_name"],$target_file)){
            echo header('Location:product.php');
        }
        else{
            "Upload failed";
        }
    }
}
?>
<?php
include('../../../libs/db.php');
echo "\n";
 
$sql = "INSERT INTO booth (booth_date, booth_location) 
                            VALUES  (
                                    '".$_POST["booth_date"]."',
                                    '".$_POST["booth_location"]."'
                                    )
                        ";
                mysqli_query($conn, $sql);





$number = count($_POST["p_id"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["p_id"][$i] != ''))
		{
            
			$sql = "INSERT INTO  boot_d(p_id,p_qty,booth_id )
              VALUES
               (   '".mysqli_real_escape_string($conn, $_POST["p_id"][$i])."',
				           '".mysqli_real_escape_string($conn, $_POST["p_qty"][$i])."',
                   '".mysqli_real_escape_string($conn, $_POST["booth_id"])."')";
                    
            mysqli_query($conn, $sql);
            
            // $sql2 = "UPDATE   material
            //          SET      mat_qty = mat_qty + '".$_POST["omd_qty"][$i]."'
            //         WHERE material.material_id ='".$_POST["material_id"][$i]."'  ";
            //  mysqli_query($conn, $sql2);
          
		}
    }
   echo " บันทึกข้อมูลเรียบร้อยแล้ว";
 //  header('Location:order_m.php';
    
}
else
{
	echo "Please Enter Name";
}
?>
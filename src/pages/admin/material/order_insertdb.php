<?php
include('../../../libs/db.php');
echo "\n";
 
$sql = "INSERT INTO order_m (om_date,sup_id ) 
                            VALUES  (
                                    '".$_POST["om_date"]."',
                                    '".$_POST["sup_id"]."'
                                    )
                        ";
                mysqli_query($conn, $sql);

$number = count($_POST["material_id"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["material_id"][$i] != ''))
		{
            
			$sql = "INSERT INTO  order_md (material_id, omd_qty,omd_price,om_id ) VALUES
               ( 
                   '".mysqli_real_escape_string($conn, $_POST["material_id"][$i])."',
				           '".mysqli_real_escape_string($conn, $_POST["omd_qty"][$i])."',
                   '".mysqli_real_escape_string($conn, $_POST["omd_price"][$i])."',
                   '".mysqli_real_escape_string($conn, $_POST["om_id"])."')";
                    
            mysqli_query($conn, $sql);
            
            $sql2 = "UPDATE   material
                     SET      mat_qty = mat_qty + '".$_POST["omd_qty"][$i]."'
                    WHERE material.material_id ='".$_POST["material_id"][$i]."'  ";
             mysqli_query($conn, $sql2);
          
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
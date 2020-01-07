<?php
include('../../../libs/db.php');
echo "\n";
 
$sql = "INSERT INTO generate (p_id,mem_id,generate_date,generate_qty) VALUES 
                                   (
                                    '".$_POST["p_id"]."',
                                    '".$_POST["mem_id"]."',
                                    '".$_POST["generate_date"]."',
                                    '".$_POST["generate_qty"]."'
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
            
			$sql = "INSERT INTO  generate_detail (generate_id, m_qty,material_id) VALUES
               ( 
                   '".mysqli_real_escape_string($conn, $_POST["generate_id"])."',
				           '".mysqli_real_escape_string($conn, $_POST["m_qty"][$i])."',
                   '".mysqli_real_escape_string($conn, $_POST["material_id"][$i])."')";
                    
            mysqli_query($conn, $sql);

		}
 }
   echo " บันทึกข้อมูลเรียบร้อยแล้ว";
}
else
{
	echo "Please Enter Name";
}
?>

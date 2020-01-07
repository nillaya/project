<?php

//fetch_single_data.php

include('../../../libs/db.php');

if(isset($_POST["cus_id"]))
{
 $query = "
 SELECT * FROM member WHERE cus_id = '".$_POST["cus_id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>

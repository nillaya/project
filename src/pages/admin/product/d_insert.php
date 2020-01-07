<?php
include('../../../libs/db.php');
echo "\n";

$product = $_REQUEST['p_id'];
$qty = $_REQUEST['d_qty'];



$sql = "INSERT INTO damage (p_id, d_qty )
VALUES ('$product', '$qty')";

 
$sql2 = "UPDATE   product
SET      p_qt = p_qt - '".$_POST["d_qty"]."'
WHERE product.p_id ='".$_POST["p_id"]."'  ";
mysqli_query($conn, $sql2);


if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
 header('Location:damage.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
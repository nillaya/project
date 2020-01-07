<?php
include('libs/db.php');

//	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();  
	
/*	
	echo "<pre>";
	print_r($_SESSION);
	echo "<hr>";
	print_r($_POST);
	echo "</pre>";
*/	 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>

<?php
   


//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

$name = $_POST["cus_name"];
$address = $_POST["cus_address"];
$tel = $_POST["cus_tel"];
$mail = $_POST["email"];
$shipping = $_POST["shipping"];



	// $name = $_POST["name"]; 
	// $address = $_POST["address"];
	// $email = $_POST["email"];
	// $phone = $_POST["phone"];
	//$p_qty = $_POST["$p_qty"];
	// $total = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$c_id = $_SESSION['u_id'];
	$total = $_SESSION['all'];
	
	$sum = $total+($_SESSION['qty'] * 50);   //บวกค่าส่ง50บาทต่อคู่
	
	//-----------------------------------------------------------------------------------------------------------
	
	mysqli_query($conn, "BEGIN"); 
	$sql =  " UPDATE  customer  SET email='$mail' , cus_name='$name' , cus_tel='$tel' , cus_address='$address'  WHERE cus_id = $c_id";	
	$query	= mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

	//-----------------------------------------------------------------------------------------------------------

	//บันทึกการสั่งซื้อลงใน sale
	$sql1 = "INSERT  INTO sale VALUES
	(NULL,  
	'$order_date',
	'$c_id',
	'$sum')";
	
	$query1	= mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error($conn));
	$sale_id = mysqli_insert_id($conn);
 
   //-----------------------------------------------------------------------------------------------------------

	$sql2 = "INSERT  INTO shipping (sale_id,shipping) VALUES ('$sale_id', '$shipping' )";
	$query2	= mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($conn));

	//-----------------------------------------------------------------------------------------------------------

 
	// $sql2 = "SELECT MAX(sale_id) AS sale_id FROM sale  WHERE phone='$phone'";
	// $query2	= mysql_db_query($database_condb, $sql2);
	// $row = mysql_fetch_array($query2);
	// $order_id = $row['order_id'];

	//-----------------------------------------------------------------------------------------------------------	
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM product where p_id=$p_id";
		$query3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$price = $row3['p_price'] ;
		
		
		$sql4	= "INSERT INTO  sale_detail values
		(null, 
		'$sale_id', 
		'$p_id',
		'$price',  
		'$p_qty')";
		$query4	= mysqli_query($conn, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $p_id)
		{	
			unset($_SESSION['shopping_cart']);
		}
		header('Location:payment.php?sale_id='.$sale_id.'');
		mysqli_close($conn);
		
		
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

	//-----------------------------------------------------------------------------------------------------------
?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	// window.location ='index.php';
</script>


 
</body>
</html>
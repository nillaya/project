<!DOCTYPE html>
<html lang="en">
<?php
include('libs/db.php');
error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
    $p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
        unset($_SESSION['shopping_cart'][$p_id]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="index.php"</script>';
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
    }
    
    if($act=='Cancel-Cart'){
		unset($_SESSION['shopping_cart']);	
	}
	?>

<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/jquery.min.js"></script>
    <script src="libs/popper.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <link href="libs/font-awesome.min.css">
    <link href="libs/style.css" rel="stylesheet">
    <style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }
    </style>
</head>

<body>
    <!------------------------ nav------------------->
    <?php 
     include('bar/nav.php');
      include('libs/db.php');
     ?>
    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:40px;margin-right:40px;">
        <div class="row">
            <div class="col-md-2">
                <?php include('bar/si.php'); ?>
            </div>


            <div class="col-md-10">
                <div class="content-box-large">
                    <!-- content -->
                    <div class="container">


                        <div class="table-responsive">
                            <div class="panel-body">
                                <form id="frmcart" name="frmcart" method="post" action="?act=update">
                                    <table width="100%" border="0" align="center" class="table table-hover">
                                        <tr>
                                            <td height="40" colspan="7" align="center" bgcolor="#CCCCCC">
                                                <h4><strong><b>ตะกร้าสินค้า</span></strong></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" bgcolor="#EAEAEA" width="10%"><strong>No.</strong></td>
                                            <td align="center" bgcolor="#EAEAEA" width="20%"><strong>สินค้า</strong>
                                            </td>
                                            <td align="center" bgcolor="#EAEAEA" width="15%"><strong>ราคา</strong></td>
                                            <td align="center" bgcolor="#EAEAEA" width="10%"><strong>Size</strong></td>
                                            <td align="center" bgcolor="#EAEAEA" width="20%"><strong>จำนวน</strong></td>
                                            <td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
                                            <td align="center" bgcolor="#EAEAEA" width="15%"><strong>ลบ</strong></td>
                                        </tr>
                                        <?php
$total=0; $i=0;
if(!empty($_SESSION['shopping_cart']))
{
include('libs/db.php');
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	{
		$sql = "select * from product where p_id=$p_id";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query))
		{
		 
		$sum = $row['p_price'] * $p_qty;
        $total += $sum;
        $_SESSION['total']=$total ; //เพิ่มใหม่
		echo "<tr>";
		echo "<td align='center' >";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td  align='center' >"." " . $row["p_name"] . "</td>";
        echo "<td  align='center' >" . number_format($row["p_price"],2) . "</td>";
        
        echo "<td  align='center' >"." " . $row["p_size"]  . " </td>";
        
		echo "<td  align='center'>";  
		echo "<input type='text' name='amount[$p_id]' value='$p_qty' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
                                        <tr>
                                            <td></td>
                                            <td colspan="7" align="right">
                                           
                                                    
                                            <a href="cart.php?act=Cancel-Cart" class="btn btn-warning"> ยกเลิกตะกร้าสินค้า </a>
                                              
                                             <!-- คำนวณใหม่ -->
                                             <button name="button" id="button" class="btn btn-primary"
                                                    href='ca.php?p_id=$p_id&act=update'>คำนวณใหม่ </button> 

                                            <button type="button" name="Submit2" 
                                                    onclick="window.location='confirm.php';" class="btn btn-success">
                                                    <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อสินค้า
                                                </button>
  
                                            </td>
                                            
                                     
                                        </tr>
                                        
                                            
                                </form>
                                <p align="left"> <a href="index.php" class="btn btn-info">กลับไปเลือกสินค้า</a> </p>
                                
                            </div>
                        </div>
                    </div>
                </div>



                <!-- <div class="jumbotron text-center" style="margin-bottom:0">
                <p>Footer</p>
            </div> -->




</body>

</html>
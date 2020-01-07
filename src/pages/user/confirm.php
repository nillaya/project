<?php 

// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   
$c_id = $_SESSION['u_id'];
// print_r($c_id);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/jquery.min.js"></script>
    <script src="libs/popper.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <link href="libs/font-awesome.min.css">
    <link href="libs/style.css" rel="stylesheet">
    <link href="libs/style1.css" rel="stylesheet">
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
                    <br><br>
                    <p align="left"> <a href="cart.php" class="btn btn-info">กลับหน้าตะกร้าสินค้า</a>
                        <!-- <p><a href="cart.php">กลับหน้าตะกร้าสินค้า</a> &nbsp;</p> -->
                        <button class="btn btn-info" onClick="window.print()"> print </button></p>
                    <br>
                    <table id="customer">
                        <tr>
                            <td width="1500" height="70" colspan="6" align="center" bgcolor="#fff">
                                <h4><strong>สั่งซื้อสินค้า</strong></h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#EAEAEA" width="10%">ลำดับ</td>
                            <td align="center" bgcolor="#EAEAEA">สินค้า</td>
                            <td align="center" bgcolor="#EAEAEA">ราคา</td>
                            <td align="center" bgcolor="#EAEAEA" width="10%">Size</td>
                            <td align="center" bgcolor="#EAEAEA" width="15%">จำนวน</td>
                            <td align="center" bgcolor="#EAEAEA" width="15%">รวม/รายการ</td>
                        </tr>

                        <?php  
include('libs/db.php');
$total=0; $i=0;
foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
{
    $sql = "select * from product where p_id=$p_id";
    $query = mysqli_query($conn, $sql);
    $row	= mysqli_fetch_array($query);
    $sum	= $row['p_price']*$p_qty;
    $total	+= $sum;
    $_SESSION['all'] = $total ;
    $_SESSION['qty'] = $p_qty;
echo "<tr>";
echo "<td align='center'>";
echo  $i += 1;
echo "</td>";
echo "<td>" . $row["p_name"] . "</td>";
echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
echo "<td align='right'>" . $row["p_size"] . "</td>";
echo "<td align='right'>$p_qty</td>";
echo "<td align='right'>".number_format($sum,2)."</td>";
echo "</tr>";
}
echo "<tr bgcolor='#EAEAEA'>";
echo "<td  align='right' colspan='5'><b>รวม</b></td>";
echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
echo "</tr>";

?>
                    </table>
                    <br><br>
                    <!-- <div class="form-group">
          <div class="col-sm-12"x>
          <p  align="center" > <a href="saveorder.php" class="btn btn-success">ยืนยันสั่งซื้อ</a> 
         
          </div>
 </div> -->
                    <br> <br><br>
                    <?php 
$sql1 = "SELECT * FROM customer where cus_id = $c_id";
$result1 = $conn->query($sql1);
$row1 = mysqli_fetch_assoc($result1);

?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <h4 align="center" style="color:gray">
                                    <span class="glyphicon glyphicon-shopping-cart"> </span>
                                    Confirm order </h4>
                                <form name="formlogin" action="saveorder.php" method="POST" id="login"
                                    class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="cus_name" class="form-control" required
                                                placeholder="ชื่อ-สกุล" value="<?php echo $row1['cus_name']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea name="cus_address" class="form-control" rows="3" required
                                                placeholder="ที่อยู่ในการส่งสินค้า"><?php echo $row1['cus_address']?></textarea>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="cus_tel" class="form-control" required
                                                placeholder="เบอร์โทรศัพท์" value="<?php echo $row1['cus_tel']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="email" name="email" class="form-control" required
                                                placeholder="อีเมลล์" value="<?php echo $row1['email']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            **ค่าส่ง50บาท/คู่ทุกรูปแบบ
                                            <select type="text" class="form-control" name="shipping" list="list1"
                                                placeholder="เลือกช่องทางการส่ง">
                                                <option disabled > -------เลือกช่องทางการส่ง-------</option>
                                                <option value="Thailand Post-EMS">Thailand Post</option>
                                                <option value="Kerry Express">Kerry Express</option>
                                                <option value="Ninja Van">Ninja Van</option>
                                                <option value="J&T Express">J&T Express</option>
                                                <option value="Flash Express">Flash Express</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-12" align="center">
                                            <button type="submit" class="btn btn-primary" id="btn">
                                                ยืนยันสั่งซื้อ </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </div>




</body>

</html>
<?php
include('../../../libs/db.php');
echo "\n";

$sale_id = $_REQUEST['sale_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
</head>
<style>
</style>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php
// $ID = $_REQUEST['txtID'];
// $sql = "SELECT * FROM order_m  ";
// $result = $conn->query($sql);
// $row = mysqli_fetch_array($result);
?>



    <div class="row">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="order_m.php">จัดการขาย</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดการขาย</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->


                <div class="panel-heading">

                    <h2 align="center">รายละเอียดการขาย</h2>

                </div>
                <!---------------------------------------------- sql -->
                <?php  
                                       
                                       $sql = "SELECT * FROM sale 
                                       INNER JOIN customer on sale.c_id= customer.cus_id
                                       INNER JOIN payment on sale.sale_id = payment.sale_id
                                       INNER JOIN shipping on shipping.sale_id = sale.sale_id
                                       WHERE sale.sale_id = '$sale_id' ";
                                       $result = $conn->query($sql);
                                       $row = mysqli_fetch_assoc($result); 
                                       ?>
                <!---------------------------------------------- sql -->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">



                            <table width="80%" cellspacing="1" bgcolor="#CCCCCC">
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">รหัสการขาย :</td>
                                        <td><?php echo $sale_id ?></td>
                                    </tr>
                                    <tr>
                                        <td>วันที่ขาย</td>
                                        <td><?php echo $row['sale_date'];?></td>
                                    <tr>
                                        <td>ราคารวม :</td>
                                       <td> <?php echo $row['sale_total'];?>

                                      <?php if($row['status_pay'] == 'ยืนยันการชำระเงิน'){
                                           echo "<button class='btn btn-info btn-sm'><i class='glyphicon glyphicon-ok-sign'></i><h7> " . $row["status_pay"]."</h7></button>";
                                        }else{
                                            echo $row['status_pay'];
                                        }  ?>
                                    
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>ข้อมูลลูกค้า:</td>
                                        <td><?php echo $row['cus_name']?>&nbsp; &nbsp;&nbsp; เบอร์โทร:  <?php echo $row['cus_tel']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ที่อยู่จัดส่ง:</td>
                                        <td><?php echo $row['cus_address']?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>สถานะการจัดส่ง:</td>
                                        <?php if($row['status_shipping'] == 'รอดำเนินการ'){ ?>
                                        <td>ยังไม่จัดส่ง <?php echo"<a href='shipping.php?ID=$sale_id' class='btn btn-warning btn-sm'>อัพเดตการส่ง </a>";?> </td>
                                        <?php }else{
                                        echo "<td>". $row['status_shipping']." &nbsp; (".     $row['tracking'] . ")</td>";
                                        } ?>
                                        
                                       
                                        </td> 
                                    </tr> 
                                </tbody>
                            </table>

                            <br><br>

                            <table class="table" >

                                <tr >
                                 
                                        <th width="20%" bgcolor="#B0C4DE" >รหัสสินค้า</th>
                                        <th bgcolor="#B0C4DE">สินค้า</th>
                                        <th bgcolor="#B0C4DE">จำนวน</th>
                                        <th bgcolor="#B0C4DE">ราคา</th>
                                        <th bgcolor="#B0C4DE">รวม/รายการ</th>
                                        
                                    </tr>
                                </thead>
                        

                           
                                    <?php
                                    $sum=0; $total=0;
                                 $sql2 = "SELECT * FROM sale_detail 
                                         INNER JOIN product on product.p_id = sale_detail.p_id
                                         WHERE sale_detail.sale_id = $sale_id";
                                         $query2 = mysqli_query($conn,$sql2);                               
                                while($row1=mysqli_fetch_assoc($query2))
                                        { 
                                        ?>
                                    <tbody>
                                        <tr>
                                            <td ><?php echo $row1['p_id']?></td>
                                            <td><?php echo $row1['p_name']?> ไซส์ <?php echo $row1['p_size']?></td>
                                            <td><?php echo $row1['sd_qty']?> คู่</td>
                                            <td><?php echo $row1['sd_price']?></td>
                                            <?php $sum = $row1['sd_qty']*$row1['sd_price']; ?>
                                            <td><?php echo $sum ?></td>

                                           
                                        </tr>
                                    </tbody>
                                    <?php  } ?>
                                </table>
                            </section>








                        </div>
                    </div>


                </div>
                <div class="panel-body">
                    
<hr>
                    <a href="sale.php"><button class="button button-n1"
                            style="vertical-align:middle"><span>กลับ</span> </button></a>
                </div>
            </div>
        </div>

        <div class="panel-body">

        </div>
    </div>
    </div>
    <div class="col-md-6">

        <div class="row">

        </div>
    </div>
    </div>



    </div>
    </div>
    </div>
    </div>



    <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 <a href='#'>Website</a>
            </div>

        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../../assets/jquery/jquery.js"></script>
    <script src="../../../../assets/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../../../js/custom.js"></script>
</body>

</html>
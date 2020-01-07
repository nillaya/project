<?php 
include('libs/db.php');
// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   

$c_id = $_REQUEST['id'];

$sql =" SELECT * FROM customer WHERE cus_id = $c_id  ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    <style>ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        /* content: "/\00a0"; */
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    table {
        /* border-collapse: collapse; */
        border: 0px;
    }
    </style>

</head>

<body>
    <!------------------------ nav------------------->
    <?php 
     include('bar/nav.php');
      include('libs/db.php');
     ?>

    <?php


//$p_id = $_REQUEST['p_id'];
// $sql = "SELECT * FROM customer  ";
// $result = $conn->query($sql);
// $row = mysqli_fetch_assoc($result);
?>
    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:200px;">

        <div class="row">

            <div class="col-md-10">

                <ul class="breadcrumb">

                    <!-- <button type="submit" class="btn btn-outline-info" formaction="index.php">กลับไปหน้าแรก</button> -->

                </ul>
                <div class="content-box-large">
                    <br><br>

                    <div class="container" style="margin-left:40px;margin-right:40px;">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <h4 align="center" style="color:gray">
                                            <span class="glyphicon glyphicon-shopping-cart"> </span>
                                            Confirm order </h4>
                                        <form name="formlogin" action="profile_update.php?ID=<?php echo $c_id; ?>" method="POST" id="login"
                                            class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" name="cus_name" class="form-control" required
                                                        placeholder="ชื่อ-สกุล"
                                                        value="<?php echo $row['cus_name']?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <textarea name="cus_address" class="form-control" rows="3" required
                                                        placeholder="ที่อยู่ในการส่งสินค้า">
                                                         <?php echo $row['cus_address']?>
                                                          </textarea>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" name="cus_tel" class="form-control" required
                                                        placeholder="เบอร์โทรศัพท์" value="<?php echo $row['cus_tel']?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="email" name="email" class="form-control" required
                                                        placeholder="อีเมล์" value="<?php echo $row['email']?>" />
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-sm-12" align="center">
                                                    <button type="submit" class="btn btn-primary" id="btn">
                                                            บันทึก </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>





                        </div>
                        <!-- card -->
                    </div>
                </div>

                <!-- card -->
                <br><br>
                <!-- <?php echo "<a href='cart.php?p_id=&act=add' class='btn btn-warning'>หยิบใส่ตะกร้า</a> " ?> -->

            </div>


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
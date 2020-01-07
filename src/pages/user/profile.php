<?php 

// error_reporting( error_reporting() & ~E_NOTICE );
session_start();   
$c_id = $_SESSION['u_id'];
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
        border: 0px ;
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
$sql = "SELECT * FROM customer WHERE cus_id = $c_id   ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:40px;margin-right:40px;">

        <div class="row">
            <div class="col-md-2">
                <?php include('bar/si.php'); ?>
            </div>

            <div class="col-md-10">

                <ul class="breadcrumb">
                    
                    <!-- <button type="submit" class="btn btn-outline-info" formaction="index.php">กลับไปหน้าแรก</button> -->

                </ul>
                <div class="content-box-large">
                    <br><br>
                    <div class="container" style="margin-left:40px;margin-right:40px;">
                    <div align="left"> <a href="index.php" class="btn btn-info" formaction="index.php">กลับไปหน้าแรก</a> &nbsp;&nbsp;
                       <a href="profile_edit.php?id=<?php echo $row['cus_id']?>" class="btn btn-danger" >แก้ไขข้อมูล</a></div><br><br>
                        <div class="row" >
                
                            <div class="card bg-light text-dark" >
                                <div class="card-body">
                                <h3 class="card-title" ><b>Profile</b></h3>
                                    <br>
                            
                            <table width="1000px" > 
                                <tr align="left">
                                    <th width="15%">username :</th>
                                    <td><?php echo $row['username'] ?> </td>
                                </tr>
                                <tr align="left">
                                    <th>email :</th>
                                    <td><?php echo $row['email'] ?> </td>
                                </tr>
                                <tr align="left">
                                    <th  >ชื่อ-สกุล :</th>
                                    <td><?php echo $row['cus_name'] ?> </td>
                                </tr>
                                <tr align="left">
                                    <th  >เบอร์โทร :</th>
                                    <td><?php echo $row['cus_tel'] ?> </td>
                                </tr>
                                <tr align="left">
                                    <th>ที่อยู่ :</th>
                                    <td><?php echo $row['cus_address'] ?> </td>
                                </tr>


                            </table>





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
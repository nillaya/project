<?php
  include('libs/db.php');
session_start();
if($_SESSION['u_id'] == "")
{
    echo "Please Login!";
    exit();
}

if($_SESSION['userlevel'] != "m")
{
    echo "This page for User only!";
    exit();
}	

$strSQL = "SELECT * FROM customer WHERE cus_id = '".$_SESSION['u_id']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

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
      
     ?>
    <!------------------------         nav     ------------------->
    <div class="page-content" style="margin-top:40px;margin-left:40px;margin-right:40px;">
        <div class="row">
            <div class="col-md-2">
                <?php include('bar/si.php'); ?>
            </div>
            <div class="col-md-10">
                <div class="row">


                    <?php  
$query = "SELECT * FROM product where p_qt > 0 AND product.partner_id = 2";  
$result = mysqli_query($conn, $query);  
if(mysqli_num_rows($result) > 0)  

{  
     while($row = mysqli_fetch_array($result))  
     {  
?>

                    <!-- style="width:100%" -->

                    <div class="col-3">
                        <div align="center" class="card">
                            <br>
                            <form method="post" action="cart.php?action=add&id=<?php echo $row["p_id"]; ?>">
                                <img src="../pic/<?= $row["p_image"]?>" width="200px" hight="200px"
                                    alt="Image">

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["p_name"]; ?></h5>
                                    <h6 class="text-danger">ราคา <?php echo $row["p_price"]; ?>฿</h6>
                                   
                                    <p class="card-text"> Size : <?php echo $row['p_size']; ?> จำนวน
                                        <?php echo $row['p_qt']; ?> คู่
                                    </p>
                                   
                                    <h6><a href="detail.php?p_id=<?php echo $row['p_id']?>"> <span
                                                class="badge badge-pill badge-secondary">รายละเอียด</span></a></h6>
                                    <br>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row['p_name'];?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row['p_price'];?>" />

                                    <!-- <form>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="inputPassword2" class="sr-only">Password</label> 
                                                <input type="number" class="form-control" id="number"
                                                    placeholder="number"  value="1">
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary mb-2">submit</button>
                                            </div>
                                        </div>
                                    </form> -->
                                    <form>
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="number" name="quantity" min=1 class="form-control" value="1" />
                                            </div>
                                            <div class="col">
                                                <!-- <input type="submit" name="add" class="btn btn-success"
                                                    value="Add to Cart" /> -->
                                                <?php echo "<a href='cart.php?p_id=$row[p_id]&act=add' class='btn btn-success' >  Add to Cart </a>"; ?>

                                            </div>
                                         
                                        </div>
                                        
                                    </form>
                                </div>
                            </form>
                        </div>
                        <br>
                        <br> <br> <br>
                    </div>


                    <?php
}
} 
?>

                </div>
            </div>
        </div>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <p>Footer</p>
        </div>




</body>

</html>
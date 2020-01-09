<?php

include('../../../libs/db.php');
echo "\n";

$ID = $_REQUEST['txtID'];
$sql = "SELECT * FROM generate where generate_id = '$ID' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
 
 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tlejourn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <!-- Bootstrap  -->
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../../../../css/styles.css" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>



    <div class="row">
        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-title">
                        <div align="center">
                            <h3>สถานะการผลิต</h3>
                        </div>
                    </div>
                    <hr>


                <form name="update" action="status_update.php?ID=<?php echo $ID; ?>" class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <h5 class="col-sm-2 control-label">สถานะ</h5>
                    <div class="col-sm-8">
                        <select type="text" class="form-control"  name="status" list="list1" placeholder=""  value="<?php echo $row['status'];?>">
                            <option value="กำลังผลิต">กำลังผลิต</option>
                            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
                            </option>

                        </select>
                    </div>
                   

                </div>
<br>
<br>
               
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div align="center">
                            <!-- <a href="status.php?ID=<?php echo $ID; ?>" class='btn btn-success' >  Update </a> -->
                            <button type="submit" class="btn btn-success" name="submit" >Update</button> 
                           <button type="submit" class="btn btn-warning " formaction="generate.php">Cancle</button> 
                        </div>
                    </div>
                </div>

                </form>

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
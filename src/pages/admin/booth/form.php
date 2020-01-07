<?php
//$config = include( __DIR__.'../../../../libs/config.php');
//$app = include(__DIR__ . '../../../libs/app.php');
//$db = include(__DIR__ . '../../../src/libs/db.php');
//$app['pageName'] = (isset($_GET['r'])) ? $_GET['r'] : 'main';
//$app['pageFile'] = __DIR__ . '/src/pages/' . $app['pageName'] . '.php';
include('../../../libs/db.php');
session_start();
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

<body>
    <!-- header -->
    <?php  include('../../../../bar/head.php');?>
    <!-- sidbar -->
    <?php  include('../../../../bar/side.php');  ?>

    <?php 
                $booth_id = 0;
                $result = $conn->query("SELECT * FROM  booth");
                $sql  = "SELECT * FROM  booth ";
                $query = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_array($query)) {
                  $booth_id = $result['booth_id'];
                }
                $booth_id += 1;
               ?>



    <div class="row">
        <div class="col-md-9">
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>เพิ่มข้อมูลออกบูธ</h3>
                        </div>

                        <div class="panel-options">
                            <a href="form_cus.php"><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form  name="add_name" id="add_name" class="form-horizontal" role="form">

                        <div class="form-group">
                                <h5 class="col-sm-2 control-label">รหัสการออกบูธ</h5>
                                <div class="col-sm-8">
                                    <input type="text" name="booth_id" class="form-control"
                                        value=" <?php echo $booth_id; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">วันที่</h5>
                                <div class="col-sm-5">
                                    <input type="date" name="booth_date" value="<?php echo date("Y-m-d") ?>" class="form-control" placeholder="วันที่">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">สถานที่</h5>
                                <div class="col-sm-8">
                                    <input type="text" name="booth_location" class="form-control" placeholder="สถานที่">
                                </div>
                            </div><br>



                            <?php
									$mysqli = NEW mysqli('localhost','root','','project_db');
									mysqli_set_charset($mysqli, "utf8");
									$result = $mysqli->query("SELECT * FROM product");
									?>

                            <!-- ================================================== dyinamic ==== -->

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <th class="text-center">
                                        สินค้าออกบูธ
                                    </th>
                                    <th class="text-center">
                                        จำนวน
                                    </th>

                                    <tr>
                                        <td><input type="text" name="p_id[]" placeholder="Enter your product"
                                                class="form-control name_list" list='list2' />
                                            <?php $sql1 = "SELECT * FROM product";
                                            $result = $mysqli->query($sql1); ?>
                                            <datalist id='list2'>
                                                <?php while($row = mysqli_fetch_assoc($result)) {?>

                                                <option value="<?php echo $row["p_id"]?> | <?php echo $row["p_name"]?>">
                                                </option>

                                                <?php } ?>
                                            </datalist>

                                        </td>
                                        <td><input type="number" name="p_qty[]" id="amount" placeholder="Enter number"
                                                class="form-control name_list" /></td>

                                               
                                        <td><button type="button" name="add" id="add" class="btn btn-success"><span><i
                                                        class="glyphicon glyphicon-plus"></i></span></button></td>
                                    </tr>
                                </table>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <div align="center">
                                        <input type="button" name="submit" id="submit" class="btn btn-primary"
                                            value="Submit" />
                                        <button type="submit" class="btn btn-warning "
                                            formaction="booth.php">Cancle</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
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

    <!-- jQuery necessary for Bootstrap's JavaScript plugins -->
    <script src="../../../../assets/jquery/jquery.js"></script>
    <script src="../../../../assets/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../../../js/custom.js"></script>
</body>
<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><input type="text" name="p_id[]" list="list2" class="form-control name_list " /></td><td><input type="number" name="p_qty[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i +
            '" <a class="btn btn-danger btn_remove" href="#"><i class="glyphicon glyphicon-remove"></i></a></td></tr>'
        );

    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "boot_insertdb.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
</script>
</html>


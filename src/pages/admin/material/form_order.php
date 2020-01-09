<?php   include('../../../libs/db.php'); ?>
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
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main">Home</a></li>
                    <li class="breadcrumb-item"><a href="order_m.php">ข้อมูลการสั่งซื้อวัตถุดิบ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">การสั่งซื้อวัตถุดิบ</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <!-- <div class="panel-heading"> -->
                        <div class="panel-title">
                            <div align="center">
                                <h3>การสั่งซื้อวัตถุดิบ</h3>
                            </div>
                        </div>
                        
                    <hr><br>  
                    <div class="panel-body">
                        <form name="add_name" id="add_name" class="form-horizontal" role="form">
                            <!-- <========id=========================  -->
                            <?php 
                $om_id = 0;
                $result = $conn->query("SELECT * FROM  order_m");
                $sql  = "SELECT * FROM  order_m ";
                $query = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_array($query)) {
                  $om_id = $result['om_id'];
                }
                $om_id += 1;
               ?>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">รหัสการสั่งซื้อ</h5>
                                <div class="col-sm-8">
                                    <input type="text" name="om_id" class="form-control"
                                        value=" <?php echo $om_id; ?>" />
                                </div>
                            </div>

                            <!-- <=========================id=========================  -->
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">วันที่</h5>
                                <div class="col-sm-8">
                                    <input type="date" name="om_date" class="form-control" placeholder="วันที่">
                                </div>
                            </div>


                            <?php
									$mysqli = NEW mysqli('localhost','root','','project_db');
									mysqli_set_charset($mysqli, "utf8");
									$result = $mysqli->query("SELECT * FROM supplier");
									?>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">ซัพพลายเออร์</h5>
                                <div class="col-sm-8">
                                    <input autocomplete="off" type="text" name="sup_id" class="form-control"
                                        list='list1' placeholder="ซัพพลายเออร์">
                                    <?php $sql = "SELECT * FROM supplier"; $result = $mysqli->query($sql); ?>
                                    <datalist id='list1'>
                                        <?php while($row = mysqli_fetch_assoc($result)) {?>

                                        <option value="<?php echo $row["sup_id"]?> | <?php echo $row["sup_name"]?>">

                                        </option>

                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <br>
                            <!-- ================================================== dyinamic ==== -->

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <th class="text-center">
                                        ชื่อวัตถุดิบ
                                    </th>
                                    <th class="text-center">
                                        จำนวน
                                    </th>
                                    <th class="text-center">
                                        ราคา
                                    </th>

                                    <tr>
                                        <td><input type="text" name="material_id[]" placeholder="Enter your Name"
                                                class="form-control name_list" list='list2' />
                                            <?php $sql1 = "SELECT * FROM material";
                                            $result = $mysqli->query($sql1); ?>
                                            <datalist id='list2'>
                                                <?php while($row = mysqli_fetch_assoc($result)) {?>

                                                <option
                                                    value="<?php echo $row["material_id"]?> | <?php echo $row["mat_name"]?>">
                                                </option>

                                                <?php } ?>
                                            </datalist>

                                        </td>
                                        <td><input type="number" name="omd_qty[]" id="amount" placeholder="Enter number"
                                                class="form-control name_list" /></td>
                                        <td><input type="number" name="omd_price[]" id="price" placeholder="Enter price"
                                                class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success"><span><i
                                        class="glyphicon glyphicon-plus"></i></span></button></td>
                                    </tr>
                                </table>
                                <br>
                                
                                <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                <div align="center">
                                    <input type="button" name="submit" id="submit" class="btn btn-primary" value="Submit" />
                                    <button type="submit" class="btn btn-warning " formaction="order_m.php">Cancle</button>
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

</html>

<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><input type="text" name="material_id[]" placeholder="Enter your Name" class="form-control name_list" list="list2"/></td><td><input type="number" name="omd_qty[]" id="amount" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="number" name="omd_price[]" id="price" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "order_insertdb.php",
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


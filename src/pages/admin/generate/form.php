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
                    <li class="breadcrumb-item"><a href="order_m.php">การผลิต</a></li>
                    <li class="breadcrumb-item active" aria-current="page">การสั่งซื้อวัตถุดิบ</li>

                </ol>
            </nav>
            <div class="content-box-large">
                <!-- content -->
                <div class="panel-body">
                    <!-- <div class="panel-heading"> -->
                    <div class="panel-title">
                        <div align="center">
                            <h3>การผลิต</h3>
                        </div>
                    </div>

                    <hr><br>
                    <div class="panel-body">
                        <form name="add_name" id="add_name" class="form-horizontal" role="form" >
                            <!-- <========id=========================  -->
                    <?php 
                      $generate_id = 0;
                      $sql1 = mysqli_query($conn, "SELECT * FROM generate ORDER BY generate_id DESC LIMIT 1");
                      while ($row1 = mysqli_fetch_array($sql1)) {
                          $generate_id = $row1['generate_id'];
                      }
                      $generate_id += 1;
                       ?>
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">รหัสการผลิต</h5>
                                <div class="col-sm-8">
                                    <input type="text" name="generate_id" class="form-control"
                                        value=" <?php echo $generate_id; ?>" />
                                </div>
                            </div>

                            <!-- <=========================id=========================  -->
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">วันที่</h5>
                                <div class="col-sm-8">
                                    <input required type="date" value="<?php echo date("Y-m-d") ?>" name="generate_date" class="form-control" placeholder="วันที่">
                                </div>
                                
                            </div>


                            <?php
									$mysqli = NEW mysqli('localhost','root','','project_db');
                                    mysqli_set_charset($mysqli, "utf8");
                                  //  $sql1 = "SELECT * FROM generate INNER JOIN product on generate.p_id = product.p_id
                                    // JOIN member on generate.mem_id = member.mem_id "; 
                                   // $result = mysqli_query($conn, $sql1);
									//$result = $mysqli->query("$sql");
                                    ?>

                               <!-- แม่บ้าน      -->
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">แม่บ้าน</h5>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" id="mem_id" name="mem_id" list="list1"
                                        placeholder="">
                                        <option> เลือก </option>
                                        <?php
                                         $sql2 = " SELECT * FROM member ";
                                         $result2 = $conn->query($sql2);
                                        while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row2["mem_id"]; ?>">
                                            <?=$row2["mem_id"]; ?> | <?=$row2["mem_name"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>    
                                    <!-- สินค้า -->
                            <div class="form-group">
                                <h5 class="col-sm-2 control-label">สินค้า</h5>
                                <div class="col-sm-4">
                                    <select type="text" class="form-control" id="p_id" name="p_id" list="list2"
                                        placeholder="">
                                        <option> สินค้า </option>
                                        <?php
                                         $sql1 = " SELECT * FROM product ";
                                         $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row1["p_id"]; ?>">
                                            <?=$row1["p_id"]; ?> | <?=$row1["p_name"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <h5 class="col-sm-1 control-label">จำนวน(คู่)</h5>
                                <div class="col-sm-3">
                                    <input required type="number" name="generate_qty" class="form-control" placeholder="จำนวน">
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
                                

                                    <tr>      
                                    <td><input type="text" name="material_id[]" placeholder="Enter your Name"
                                                class="form-control name_list" list='list3' />
                                            <?php $sql3 = "SELECT * FROM material";
                                            $result3 = $mysqli->query($sql3); ?>
                                            <datalist id='list3'>
                                                <?php while($row3 = mysqli_fetch_assoc($result3)) {?>

                                                <option
                                                    value="<?php echo $row3["material_id"]?> | <?php echo $row3["mat_name"]?>">
                                                </option>

                                                <?php } ?>
                                            </datalist>

                                        </td>
                                        <td><input type="number" name="m_qty[]" id="amount" placeholder="Enter number"
                                                class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success"><span><i
                                                        class="glyphicon glyphicon-plus"></i></span></button></td>
                                    </tr>
                                </table>
                                <br>
                               
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div align="center">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary"
                                                value="Submit" />
                                            <a href="generate.php"><button type="button" class="btn btn-warning ">Cancle</button></a>
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
            '"><td><input type="text" name="material_id[]" placeholder="Enter your Name" class="form-control name_list" list="list3" /></td><td><input type="number" name="m_qty[]" id="amount" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "insertdb.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);  
                $('#add_name')[0].reset();
                var result = $.trim(data);
                if(result == "บันทึกข้อมูลเรียบร้อยแล้ว"){
                    window.location.href="generate.php";
                }
            }
        });
    });

    // $("#amount").keyup(function() {
    //     var total = $("#amount").val() * $("#price").val();
    //     $("#total").val(total);
    //     console.log("gg:" + total);
    // });

    // $("#price").keyup(function() {
    //     var total = ($("#amount").val() * $("#price").val());
    //     $("#total").val(total);
    // });



});
</script>
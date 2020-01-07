<title>Tlejourn</title>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    
<a class="navbar-brand" href="#"><h2>Tlejourn</h2></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
            <a class="nav-link" href="index.php"><h6> Home </h6><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><h6>ตะกร้าสินค้า</h6></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.php"><h6>ประวัติการซื้อ</h6></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <!-- <li class="nav-item dropdown">
            <h6><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    การซื้อของฉัน
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">ที่ต้องชำระ</a>
                    <a class="dropdown-item" href="#">ที่ต้องจัดส่ง</a>
                    <a class="dropdown-item" href="#">ที่ต้องได้รับ</a>
                    <a class="dropdown-item" href="#">ประวัติการซื้อ</a>
                </div></h6>
            </li> -->

        </ul>
    </div>
    
    <!-- ----------------->

    <div class="top-nav clearfix">
        <ul class="navbar-nav pull-right top-menu">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['user']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </li>

        </ul>
    </div>
    <!-- ----------------->
</nav>
<!----------------------- side ----------------------------->
<!-- <div class="container" style="margin-left:50px;margin-top:40px;">
  <div class="row">
    <div class="col-sm-4">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div> -->


        


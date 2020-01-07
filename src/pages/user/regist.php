<html>
<style>
body{
    background-color:#5286F3;
    font-size:14px;
    color:#fff;
}
.simple-login-container{
    width:300px;
    max-width:100%;
    margin:50px auto;
}
.simple-login-container h2{
    text-align:center;
    font-size:20px;
}

.simple-login-container .btn-login{
    background-color:#5F9EA0;
    color:#fff;
}
a{
    color:#fff;
}



</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Register</title>
<body>


<div class="simple-login-container">
<form action="regist_db.php" method="post">
    <h2>Register</h2>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="email" class="form-control" placeholder="E-mail" name="email">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="password" placeholder="Enter your Password" class="form-control" name="passwd">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="password" placeholder="Confirm Password" class="form-control" name="confirm">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="submit" class="btn btn-block btn-login" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           
        </div>
    </div>
</form>
</div>


</body>
</html>
<?php session_start();

if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
    if ($user == 'publisher' && $pass == 'spl2020') {

    $_SESSION['login_user']=$user; // Initializing Session
    header("location: newjob.php");  // Redirecting To Other Page
     } else {
    $error = "<p style='color:red;font-size:12px;text-align: center;'>"."Username or Password is invalid !"."</p>";
	echo $error;
     }
	 
	 }


 // Starting Session ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Career | Konica Minolta</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<style>.container {width: 600px !important;}
.page-title {margin-bottom: 36px !important;}
</style>
</head>

<body>
<div class="login-container container main-outer">
<header>
<div class="page-header"><img src="images/logo.jpg">
</header>
<section>
<div class="col-md-12 table-bordered" style="background:#f6fbfe">
<div class="bg-primary page-title row"><span></span>Login</div> 
<form class="form-horizontal main-content-login" action="login.php" method="post">
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
<div class="col-sm-7">
<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="User Name" required>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Password</label>
<div class="col-sm-7">
<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-7">
<input class="btn btn-primary" type="submit" name="submit" value="Login" />
</div>
</div>
</form>        
</div>
</section>



<footer>
<div class="container">
</div>
</footer>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php








?>
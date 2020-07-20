<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

if(isset($_POST["login"])){

 $username = $_POST["username"];
 $_SESSION["ejek"] = $username;
 $password = $_POST["password"];

 $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
 $row = mysqli_fetch_assoc($result);
 $password2 = $row["password"];
//cek username
 if(mysqli_num_rows($result) === 1){
  //cek password
  if($password === $password2){
   //set session
  	$ohgitu = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
  	$rows = mysqli_fetch_assoc($ohgitu);
   $_SESSION["login"] = true;	
   header('Location: index.php');
 } 

 }

 $error = true;

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoeltanShop - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<?php 

				if(isset($error)) :

				?>
				<br>
				<p style="font-family: italic; color: red">username / password salah</p>
				<?php endif; ?>
				<div class="panel-body">
					<form role="form" action="" method="post" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input class="btn btn-primary" type="submit" name="login" value=" Login "></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

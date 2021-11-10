
<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
   if(isset($_POST['login']))
{

	$username=$_POST['username'];
	$password=$_POST['password'];
$sql = "SELECT * FROM admininfo WHERE username = '".$username."' AND Password = '".$password."' LIMIT 1";
$result = $mysqli->query($sql);
if (mysqli_num_rows($result) == 1){
echo 
'<script>alert("Login success");
				window.location.replace("Admin/index.php")
		</script>';
		$_SESSION['username']=$username;

exit();
}
else
{
echo '<script>alert("Login failed");
				window.location.replace("index.php")
		</script>';
exit();
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Admin Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Admin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="Admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="POST" >
					<?php
				if(isset($_POST['username']))
				{
					$username=$_POST['username'];
				}
				if(isset($_POST['password']))
				{
					$password=$_POST['password'];
				}
					?>

					<span class="login100-form-title p-b-70">
						Welcome to Ahero 
					</span>
					<span class="login100-form-avatar">
						<img src="Admin/images/avatar.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "text">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="username"></span>
					</div>
                        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="password"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit"  class="login100-form-btn" name="login" value="login" / >
							
						
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div> 
<!--===============================================================================================-->
	<script src="Admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Admin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Admin/vendor/bootstrap/js/popper.js"></script>
	<script src="Admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Admin/vendor/daterangepicker/moment.min.js"></script>
	<script src="Admin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Admin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Admin/js/main.js"></script>

</body>
</html>
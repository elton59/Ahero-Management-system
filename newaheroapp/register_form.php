
<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
   if(isset($_POST['signup']))
{
  
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $cpassword=$_POST['password'];
   
$sql = "INSERT  INTO users (username,password,email)VALUES( '$uname','$password','$email')";
$result = $mysqli->query($sql);



if ($result){
echo 

'<script>alert("registration successful");
                window.location.replace("login.php");
        </script>';


exit();
}
else
{
echo '<script>alert("signup failed username exist");
                window.location.replace("index.php");
        </script>';
exit();
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Loginvendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form" method="POST">
                    <?php
                if(isset($_POST['uname']))
                {
                $uname=$_POST['uname'];
                }
                if(isset($_POST['email']))
                {
                $email=$_POST['email'];
                }
                    
                if(isset($_POST['password']))
                {
                $password=$_POST['password'];
                }
                if(isset($_POST['cpassword']))
                {
                $cpassword=$_POST['password'];
                }
                    ?>

                    <span class="login100-form-title p-b-70">
                       
                    </span>
                      <span class="login100-form-title p-b-70">
                        Welcome to Ahero 
                    </span>
                    <span class="login100-form-avatar">
                        <img src="Login/images/avatar.png" alt="AVATAR">
                    </span>

                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "text">
                        <input class="input100" type="text" name="uname" required/>
                        <span class="focus-input100" data-placeholder="username" ></span>
                    </div>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "email">
                        <input class="input100" type="email" name="email" required/>
                        <span class="focus-input100" data-placeholder="email"></span>
                    </div>
                    
                        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "text">
                          <select class="input100"  name="location" required/>
                          <option value="KISUMU">KISUMU</option>
                          <option value="NAIROBI">NAIROBI</option>
                          <option value="NAKURU">NAKURU</option>
                          <option value="MOMBASA">MOMBASA</option>
                          <option value="MERU">MERU</option>
                          </select>
                          <span class="focus-input100" data-placeholder="location"></span>
                      </div>
                        >
                         <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "text"> 
                       <select class="input100"  name="gender" required/>
                          <option value="male">male</option>
                          <option value="female">female</option>
                          
                          </select>
                        <span class="focus-input100" data-placeholder="Gender"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "password">
                        <input class="input100" type="password" name="password" required/>
                        <span class="focus-input100" data-placeholder="password"></span>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit"  class="login100-form-btn" name="signup" value="signup" / >
                            
                        
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
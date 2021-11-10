<?php
session_start();

  ?>
	
<section class="section">
<?php
if (isset($_POST['submit']))
{
$servername = "localhost";
$username = "root";
$password = "";
$db = "Ahero";

            //create connection
$mysqli= new mysqli($servername,$username,$password,$db);

$uname=$_POST["uname"];
$location=$_POST["location"];
$pno=$_POST["pno"];

$result=$mysqli->query("update cart SET username = '$uname', location ='$location',phone_number ='$pno'  WHERE username='$_SESSION[uname]'") or die($mysqli->error);
if($result)
{
	echo " <script>
	window.location.replace('addpayment.php')</script>";

}
}
?>	

<form id="signup_form" method="POST" class="login100-form">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                    <p class="login100-form-title p-b-49" style="

                                        <h2 class="login100-form-title p-b-49" > Shipment details</h2>
                                        	
                                    </div>
                                    <div class="form-group ">
                                    
                                        
                                    </div>
                                    <div class="form-group">
                                    
                                     
                                        <input class="input form-control input-borders" type="text" name="uname" id="uname" placeholder="username" value="<?php echo $_SESSION[uname]?>" ">
                                    </div>
                                    <div class="form-group">
                                        <select class="input form-control input-borders" type="text" name="location"  placeholder="location">
                                        	<option value="MERU">MERU</option>
                                        	<option value="NAIROBI">NAIROBI</option>
                                        	<option value="KISUMU">KISUMU</option>
                                        	<option value="MOMBASA">MOMBASA</option>
                                        	<option value="NAKURU">NAKURU</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="number" name="pno" id="cdname" placeholder="phoneNumber" value="07123456">
                                    </div>
                                    <label>Cost:
                                     <div class="form-group">
                                        <input class="input form-control input-borders" type="number" name="pno" id="cdname" value="200" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-danger" type="submit" name="submit" value="checkout">
                                    </div>
                                </form>
                        
    </div>
</div>
</section>	
<?php
include "footer.php";
?>
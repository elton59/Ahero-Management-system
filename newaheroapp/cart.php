<?php
session_start();
include "header.php";
if(!isset($_SESSION['uname']))
{

  echo"<script>alert('please login first to add items to cart');
               window.location.replace('login.php');
  </script>";
}

  ?>
	}
}
<section class="section">
<?php
if (isset($_POST['addcart']))
{
$servername = "localhost";
$username = "root";
$password = "";
$db = "Ahero";

            //create connection

$mysqli= new mysqli($servername,$username,$password,$db);
$pid=$_POST["pid"];
$pname=$_POST["pname"];
$price=$_POST["price"];
$qty=$_POST["qty"];
$img=$_POST["img"];
$uname=$_POST['uname'];	
$result=$mysqli->query("INSERT INTO cart(product_id,product_name,price,quantity,image,username) VALUES ('$pid','$pname','$price','$qty','$img','$uname')")or die(mysqli_error($mysqli));
$result2=$mysqli->query("UPDATE  finishedproducts SET deductions='$qty' WHERE product_id='$pid'")or die(mysqli_error($mysqli));
if($result)
{

	echo " <script>
	window.location.replace('index.php')</script>";
}
}
?>	
 
    </div>
</div>
</section>	
<?php
include "footer.php";
?>
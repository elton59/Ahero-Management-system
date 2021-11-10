<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updaterawproduct']))
{   
    $rpid=$_POST['rpid'];
    $rpname=$_POST['rpname'];
    $rquantity=$_POST['rquantity'];
    $rfid=$_POST['rfid'];
    $rsupplier=$_POST['rsupplier'];
	$result=$mysqli->query("update rawproducts SET product_name = '$rpname', quantity ='$rquantity',farm_id='$rfid',supplier = '$rsupplier' where product_id = '$rpid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("rawdelete.php");
		</script>';
	}
	?>
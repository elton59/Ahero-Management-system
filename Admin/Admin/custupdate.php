<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updateCustomer']))
{   
    $cid=$_POST['cid'];
    $cname=$_POST['cname'];
    $cemail=$_POST['cemail'];
    $clocation=$_POST['clocation'];
	$result=$mysqli->query("update customers SET customer_name = '$cname', email = '$cemail', location='$clocation 'where customer_id = '$cid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("custdelete.php");
		</script>';
	

}

?>	


	

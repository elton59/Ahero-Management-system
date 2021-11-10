<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatewarehouse']))
{   
    $wid=$_POST['wid'];
    $wname=$_POST['wname'];
    $wlocation=$_POST['wlocation'];
    $wsid=$_POST['wsid'];
    $wsname=$_POST['wsname'];
  
	$result=$mysqli->query("update warehouse SET warehouse_name = '$wname', location ='$wlocation',storekeeper_id ='$wsid',storekeeper_name='$wsname' where warehouse_id='$wid' ") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("warehouse.php");
		</script>';
	}

	
	?>
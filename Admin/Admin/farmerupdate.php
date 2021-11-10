<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
	if(isset($_POST['updatefarmer']))
{   
	
    $frid=$_POST['frid'];
    $frname=$_POST['frname'];
    $fremail=$_POST['fremail'];		
    $frfid=$_POST['frfid'];
    $frfname=$_POST['frfname'];
  
   
	$result=$mysqli->query("update farmers SET  farmer_name = '$frname',email='$fremail',farm_id='$frfid',farm_name='$frfname' where farmer_id='$frid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("farmers.php");
		</script>';
	}
	?>
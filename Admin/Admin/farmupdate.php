<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatefarm']))
{   
    $fid=$_POST['fid'];
    $fname=$_POST['fname'];
    $hid=$_POST['hid'];
    $hname=$_POST['hname'];
    $fsize=$_POST['fsize'];
	$result=$mysqli->query("update farms SET farm_name = '$fname', household_id='$hid',household_name='$hname',size = '$fsize' where farm_id = '$fid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				//window.location.replace("farms.php");
		</script>';
	


	//header("refresh:1; url=custdelete.php");
}

?>
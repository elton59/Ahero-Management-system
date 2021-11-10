<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatemill']))
{   
    $mid=$_POST['mid'];
    $mrid=$_POST['mrid'];
    $mname=$_POST['mname'];
    $location=$_POST['location'];
	$result=$mysqli->query("update mills SET miller_id = '$mrid',miller_name='$mname',location = '$location' where mill_id = '$mid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("mills.php");
		</script>';
	


	//header("refresh:1; url=custdelete.php");
}

?>
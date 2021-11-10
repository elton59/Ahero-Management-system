<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

	$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
	if(isset($_POST['updateuser']))
{   
	 $uid=$_POST['uid'];
    $uname=$_POST['uname'];	
    $uemail=$_POST['uemail'];
    $upass=$_POST['upass'];
    $urole=$_POST['urole'];
   
	$result=$mysqli->query("update users SET  username = '$uname',email='$uemail',password='$upass',role='$urole' where user_id='$uid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("users.php");
		</script>';
	}
	
else
{
   echo '<script>alert("Record Updation Failed!");
				window.location.replace("users.php");
		</script>';
}

?>

	}
	?>
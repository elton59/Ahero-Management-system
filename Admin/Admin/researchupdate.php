<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
	if(isset($_POST['updateemployee']))
{   
	
    $eid=$_POST['eid'];
    $ename=$_POST['ename'];
    $ememail=$_POST['ememail'];
    $erole=$_POST['erole'];
  
   
	$result=$mysqli->query("update aheroresearch SET  employee_name = '$ename',email='$ememail',role='$erole'  where employee_id='$eid' ") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("aheroresearch.php");
		</script>';
	}
	?>

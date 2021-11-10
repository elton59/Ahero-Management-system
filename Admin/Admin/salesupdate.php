  <?php 
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
   $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
  $mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
	if(isset($_POST['updatesales']))
{   
    $sid=$_POST['sid'];
	$spid=$_POST['spid'];
    $spname=$_POST['spname'];	
    $squantity=$_POST['squantity'];
    $sprice=$_POST['sprice'];
    $soid=$_POST['soid'];
   
	$result=$mysqli->query("update sales SET product_id = '$spid', product_name = '$spname',quantity=$squantity,price ='$sprice',oder_id ='$soid' where sale_id='$sid'") or die($mysqli->error);


		echo '<script>alert("Record Updated Successfully!");
				window.location.replace("sales.php");
		</script>';
	}
	?>
<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatefinishedproduct']))
{   
    $fpid=$_POST['fpid'];
    $fpname=$_POST['fpname'];
    $fcategory=$_POST['fcategory'];
    $fquantity=$_POST['fquantity'];
    $fmid=$_POST['fmid'];
    $fimg=$_POST['fimg'];
    $fprice=$_POST['fprice'];
	$result=$mysqli->query("update finishedproducts SET product_name = '$fpname', category ='$fcategory',quantity ='$fquantity',mill_id='$fmid',image = '$fimg',price ='$fprice' where product_id = '$fpid'") or die($mysqli->error);
	
	echo '<script>alert("Record Updated Successfully!");
				window.location.replace("products.php");
		</script>';
}
?>
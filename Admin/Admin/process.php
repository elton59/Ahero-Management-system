 <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

// Create connection
$mysqli = new mysqli($servername, $username, $password,$db) or die($mysqli->error);


if(isset($_GET['action']))
{
	if($_GET['action']=='approve')
	{
$customer_id = $_GET['cid'];
$mysqli = $mysqli->query("UPDATE customers SET Status= 'Approved' WHERE customer_id = $customer_id") or die($mysqli->error);
echo '<script>alert(" Record Approved!");
        window.location.replace("customer.php");
    </script>';
 
}
}
/*
else if(isset($_POST['custreject']))
{
$cid = $_GET['custreject'];
$mysqli = $mysqli->query("UPDATE customers SET Status= 'Rejected' WHERE customer_id = $customersid") or die($mysqli->error);
header("location: customers.php");
}

if(isset($_GET['approveOrder']))
{
$id = $_GET['approveOrder'];
$mysqli = $mysqli->query("UPDATE ordert SET Status= 'Approved' WHERE Order_ID = $id") or die($mysqli->error);
header("location: New_orders.php"); 
}
else if(isset($_GET['rejectOrder']))
{
$id = $_GET['rejectOrder'];
$reason = $_POST['reason'];
$mysqli2 = $mysqli->query("UPDATE ordert SET reason='$reason' WHERE Order_ID ='$id'") or die($mysqli->error);
$mysqli = $mysqli->query("UPDATE ordert SET Status= 'Rejected' WHERE Order_ID = '$id'") or die($mysqli->error);
header("location: New_orders.php");
}



else if(isset($_GET['archiveAllocatedShipment']))
{
$id = $_GET['archiveAllocatedShipment'];
$mysqli = $mysqli->query("UPDATE shipment SET Status= 'Archived' WHERE Shipment_ID = $id") or die($mysqli->error);
header("location: Allocated_shipment.php");
}
*/
?>

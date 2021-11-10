  <?php

 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

$mysqli=new mysqli($servername,$username,$password,$db);

  if(isset($_GET['cid']))
  {
  $customer_id=$_GET['cid'];
  $result=$mysqli->query("delete from customers where customer_id='$customer_id'")or die($mysqli->error);
 
  	echo'<script>alert("Record deleted succesfully!");
  	window.location.replace("custdelete.php");
    </script>
  	';
  }	
  
  else
  {
  	echo "error deleting the record";
  }
  $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['rpid']))
  {
  $product_id=$_GET['rpid'];
  $result=$mysqli->query("delete from rawproducts where product_id='$product_id'")or die($mysqli->error);
 
  	echo'<script>alert("Record deleted succesfully!");
  	window.location.replace("rawdelete.php");
    </script>
  	';
  }	
  
  else
  {
  	echo "error deleting the record";
  }
  $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['fpid']))
  {
  $product_id=$_GET['fpid'];
  $result=$mysqli->query("delete from finishedproducts where product_id='$product_id'")or die($mysqli->error);
 
    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("rawdelete.php");
    </script>
    ';
  } 
  
  else
  {
    echo "error deleting the record";
  }
  $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['fid']))
  {
  $farm_id=$_GET['fid'];
  $result=$mysqli->query("delete from farms where farm_id='$farm_id'")or die($mysqli->error);
 
    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("farms.php");
    </script>
    ';
  } 
  
  else
  {
    echo "error deleting the record";
  }

 $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['wid']))
  {
  $warehouse_id=$_GET['wid'];
  $result=$mysqli->query("delete from warehouse where warehouse_id='$warehouse_id'")or die($mysqli->error);
 
    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("warehouse.php");
    </script>
    ';
  }
   $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['did']))
  {
  $driver_id=$_GET['did'];
  $result=$mysqli->query("delete from drivers where driver_id='$driver_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("driver.php");
    </script>
    ';
  } 
  $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['sid']))
  {
  $sale_id=$_GET['sid'];
  $result=$mysqli->query("delete from sales where sale_id='$sale_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("sales.php");
    </script>
    ';
  } 
    $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['eid']))
  {
  $employee_id=$_GET['eid'];
  $result=$mysqli->query("delete from aheroresearch where employee_id='$employee_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("aheroresearch.php");
    </script>
    ';
  } 
  $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['uid']))
  {
  $user_id=$_GET['uid'];
  $result=$mysqli->query("delete from users where user_id='$user_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("usersdelete.php");
    </script>
    ';
  }
   $mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['frid']))
  {
  $farmer_id=$_GET['frid'];
  $result=$mysqli->query("delete from farmers where farmer_id='$farmer_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
    window.location.replace("farmers.php");
    </script>
    ';
  }  
$mysqli=new mysqli($servername,$username,$password,$db);
  if(isset($_GET['mid']))
  {
  $mill_id=$_GET['mid'];
  $result=$mysqli->query("delete from mills where mill_id='$mill_id'")or die($mysqli->error);

    echo'<script>alert("Record deleted succesfully!");
   window.location.replace("mills.php");
    </script>
    ';
  }  
  ?>



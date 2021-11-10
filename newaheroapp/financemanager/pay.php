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
	if(isset($_POST['pay']))
{   

              $fname=$_POST['fname'];
            
           
              $pname=$_POST['pname'];
            
           
              $trid=$_POST['trid'];
            
            
              $price=$_POST['price'];
            
          
              $status=$_POST['status'];
            
	$result=$mysqli->query("INSERT INTO fpay (product_name,farmer_name,transaction_id,amount,status)VALUES('$pname','$fname','$trid','$price','$status')") or die($mysqli->error);


		echo '<script>alert(" Success!");
				window.location.replace("index.php");
		</script>';
	}
	?>
<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatedriver']))
       {
       
    
        $dname=$_POST['dname'];
        $status=$_POST['status'];
        $cart_id=$_POST['did'];
        $result=$mysqli->query("UPDATE cart SET driver_name='$dname',status='$status' where cart_id='$cart_id'")or die($mysqi->error);
        if($result){
         echo "<script>alert('success');
        window.location.replace('index.php');

            </script>";
       
   }
}	
      
       ?>
<?php
 $servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";
$mysqli = new  mysqli($servername, $username, $password,$db) or die(mysql_error($mysqli));
if(isset($_POST['updatedriver']))
       {
        $did=$_POST['did'];
        $dname=$_POST['dname'];
        $status=$_POST['status'];    
        $result=$mysqli->query("INSERT into cart(driver_name,driver_id,status) values('$dname','$did','$status'");
       }
      
       ?>
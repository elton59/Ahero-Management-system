 <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//postcustomer

         /*  if (isset($_POST['cname']))
           {
            $cname=$_POST['cname'];
           }
           if(isset($_POST['occupation']))
           {
            $occupation=$_POST['occupation'];
           }

/// delete customer                 
            if(isset($_POST['send']))
           {
            if (isset($_POST['cname']));
            if(isset($_POST['occupation']));
            //create connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "Ahero";
            mysqli_connect($servername,$username,$password,$db);
          
            $sql="INSERT INTO customers(customer_name,occupation) VALUES($cname','$occupation')";
            $result=mysqli_query($con,$sql);
            
            }*/
           
          ?>


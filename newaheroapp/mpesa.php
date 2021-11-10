    <?php
include "header.php";

$servername = "localhost";
$username = "root";
$password = "";
$db = "Ahero";
            //create connection
$mysqli= new mysqli($servername,$username,$password,$db);
$output ='';

$result=$mysqli->query("select *  from cart") or die(mysqli_error($mysqli));
$query="SELECT sum(price*quantity) AS total,sum(quantity) AS all_qty from cart" ;
$result2=$mysqli->query($query) or die(mysqli_error($mysqli));
$row1=$result2->fetch_assoc();
$query2="SELECT quantity * price As Price";

?>
    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
				<!-- row -->
				<?php
               
 if(isset($_POST['fin']))
 {
    
    $puname=$_POST['puname'];
    $pemail=$_POST['pemail'];
    $cdname=$_POST['cdname'];
    $cdnumber=$_POST['cdnumber'];
    $cvv=$_POST['cvv'];
    $ptotal=$_POST['ptotal'];

    
          $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "Ahero";
            //create connection
             $mysqli= new mysqli($servername,$username,$password,$db);
          
            $sql=$mysqli->query("INSERT INTO payments(payment_method,username,email,Transaction_id,phone_number,total_amt) VALUES('$pmd','$puname','$pemail','$ptrid','$pno','$ptotal')") or die($mysqli->error);
            
            if($sql){
      $result=$mysqli->query("select * from payments where username='$_SESSION[uname]'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    $status=$row['status'];
                    $_SESSION['status']=$row['status'];
                    ;}
                    if($status=='pending'){
      echo "<script>alert(' processing payment ');
        window.location.replace('viewcart.php');

            </script>";
          }
          
          if($status=='complete'){
      echo "<script>alert(' success ');
        window.location.replace('viewcart.php');

            </script>";
          }
           if($status=='incomplete'){
      echo "<script>alert(' card rejected ');
        window.location.replace('viewcart.php');

            </script>";
          }
          }

    }
    
    
  
                ?>
                <div class="container-fluid">
					
					   <?php
            if(isset($_POST['pmd']))
            {
              $pmd=$_POST['pmd'];
            }
            if(isset($_POST['puname']))
            {
              $puname=$_POST['puname'];
            }
            if(isset($_POST['pemail']))
            {
              $pemail=$_POST['pemail'];
            }
            if(isset($_POST['ptrid']))
            {
              $ptrid=$_POST['ptrid'];
            }
             if(isset($_POST['pno']))
            {
              $pno=$_POST['pno'];
            }
          
             if(isset($_POST['ptotal']))
            {
              $ptotal=$_POST['ptotal'];
            }
            

            
            
            ?>	
						
						<!-- /Billing Details -->
						
								<form id="signup_form" method="POST" class="login100-form">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                      
                                        <h2 class="login100-form-title p-b-49"  style="color:green" > Mpesa payment  <img src='images.ico'/></h2>
                                       <p class="login100-form-title p-b-49"  style="color:green">Bussines no :23434<br/>
                                       Account no:2654</p>
                                    </div>
                                    <div class="form-group ">
                                     <input  class="input form-control input-borders" type="text" name="pmd" value="mpesa" readonly/> 
                                    </div>

                                    <div class="form-group"
                                        <input class="input form-control input-borders" type="text" name="puname" id="puname" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="pemail"  placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="ptrid" id="ptrid" placeholder="Transaction_ID">
                                    </div>
                                    
                        
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="number" name="pno"  placeholder="phonenumer">
                                    </div>
                                     <div class="form-group">
                                        <label>Amount </label>
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $db = "Ahero";
                                         //create connection
                               $mysqli= new mysqli($servername,$username,$password,$db);
                               $output ='';
                           if(isset($_SESSION['uname']))
                              {
                               $result=$mysqli->query("select *  from cart where username='$_SESSION[uname]'") or die(mysqli_error($mysqli));
                               $query="SELECT sum(price*quantity) AS total,sum(quantity) AS all_qty from cart where username='$_SESSION[uname]'" ;
                               $result2=$mysqli->query($query) or die(mysqli_error($mysqli));
                               $row1=$result2->fetch_assoc();
                              
                                        if (mysqli_num_rows($result) > 0) {      
                                   $result=$mysqli->query("select * from cart where username='$_SESSION[uname]' ")or die($mysqli->error);
                                         
                                         $total=$row1["total"];
                                        
                                     }
                                   }
                                   else
                                   {

                                   }
                                 
                                        ?>

                                        <input class="input form-control input-borders" type="text" name="ptotal" id="ptotal" value="<?php echo" $total"?>">
                                    </div>
                                   
                                    
                                    
                                    
                                    <div style="form-group">
                                       <input type="submit" class="primary-btn btn-block"  value="submit"  name="fin">
                                    </div>
                                    
                                
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>

						
					</div>
                    </div> 
<?php
include "footer.php";
?>
					
				
				<!-- /row -->

			

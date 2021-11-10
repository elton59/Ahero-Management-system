<?php
include "header.php";
?>
<section class="section">
	<div><p style="text-align:center;"> PAYMENT STATUS: 
    <?php

	 $result=$mysqli->query("select * from payments where username='$_SESSION[uname]'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo"".$row['status']."";
                 }
             
                    ?></p></div>
	<p  style="text-align:center;text-decoration:underline;font:bold"> SHOPPING LIST</p>
                    <table id="example2" class="table table-responsive table-hover">
                      <thead>
                        <tr><th>PRODUCT_NAME</th><th>PRICE</th><th>QUANTITY</th><th>STATUS</th></tr>
                      </thead>
                      <?php
                   

                  $result=$mysqli->query("select * from cart where username='$_SESSION[uname]'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['product_name']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['quantity']."</td>
                     <td>".$row['status']."</td>
                     <td> <a href='viewcart.php?apfid=$row[cart_id]' class='btn btn-success'>Received<a>
                   </td>
                    
                    "

                  ;}
                  $_SESSION[uname]=$row['username'];
                           
            ?>
</table>
<?php
    if(isset($_GET['apfid']))
  {
    $cart_id=$_GET['apfid'];
    $result = $mysqli->query("UPDATE cart SET Status= 'received' WHERE cart_id = $cart_id") or die($mysqli->error);
   
  
        echo '<script>alert("sucess!")</script>';
      
   
  }
    
  ?>
<td><a href='vreport.php' class='btn btn-danger'>Download receipt </a></td>
</div>

</div>

</section>
<?php
include "footer.php";
?>
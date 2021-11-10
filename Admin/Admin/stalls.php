<?php

 
include('conn.php');
include('header.php');
include('leftbar.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kajiado Market</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



  
<div class="ts-main-content">

  
</div>
<br>
<br>
<br>
<br>
<br>

<div class="content-wrapper">
  <div class="container-fluid" style="float: center">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">

    <div class="panel panel-success">

        <div class="panel-heading"><center>stalls</center></div>
           <div class="col-sm-6">
</div>


        <div class="panel-body">
         <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr><th>STALL_ID</th><th>STALL_NAME</th><th>LOCATION</th><th>BUSINESSPERSON_ID</th><th>MARKET_NAME</th><th>STATUS</th><th>ACTION</th></tr>
                      </thead>
                      
                      <?php
                  $result=$mysqli->query("select * from stalls")or die($mysqli->error);
                  $row=$result->fetch_assoc();
                  while($row=$result->fetch_assoc())
                  {
                      
                    echo

                    "
                    <tbody>
                    <tr>
                    <td>".$row['STALL_ID']."</td>
                    <td>".$row['STALL_NAME']."</td>
                    <td>".$row['LOCATION']."</td>
                    <td>".$row['BUSINESSPERSON_ID']."</td>
                    <td>".$row['MARKET_NAME']."</td>
                    <td>".$row['STATUS']."</td>
                   <td> <a href='stalls.php?apsid=$row[STALL_ID]' class='btn btn-success'>Approve</a>
                    <a href='stalls.php?rsid=$row[STALL_ID]' class='btn btn-danger'>Reject</a>
                    <a href='stalls.php?asid=$row[STALL_ID]' class='btn btn-success'>avail</a>
                   </td>
                   </tr>
                   </tbody>
                    "
                  ;}
                
                
            ?>
</table>


   
  
      <td><a href='sreport.php' class='btn btn-danger'>Export to PDF</a></td>



    </div>
    <?php

    if(isset($_GET['rsid']))
  {
    $stall_id=$_GET['rsid'];
    $result=$mysqli->query("UPDATE stalls SET STATUS='rejected'  where stall_id='$stall_id'")or die($mysqli->error);
    
  }   
  if(isset($_GET['apsid']))
  {
    $stall_id=$_GET['apsid'];
    $result=$mysqli->query("UPDATE stalls SET STATUS='approved'  where stall_id='$stall_id'")or die($mysqli->error);
    
  }
     if(isset($_GET['asid']))
  {
    $stall_id=$_GET['asid'];
    $result=$mysqli->query("UPDATE stalls SET STATUS='available'  where stall_id='$stall_id'")or die($mysqli->error);
    
  }
     
  ?>
    <div class="col-sm-2"></div>
  </div>
</div>
</div>

</body>
</html>
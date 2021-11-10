
<?php
error_reporting(0);
session_start();
include("db.php");
include  "sidebar.php";
include  "navbar.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ahero Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../files/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="..files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../files/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../files/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../files/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../files/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../files/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../files/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        !-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Shipment</h3>
          </div>
          <!--card body-->
                  <div class="class-body">
                   <div class="table-responsive ps">
                    <table id="example2" class="table table-bordered table-hover" id="page1">
                      <thead>
                        <tr><th>CART_ID</th><th>PRODUCT_ID</th><th>PRODUCT_NAME</th><th>PRICE</th><th>QUANTITY</th><th>CUSTOMER_NAME</th><th>LOCATION</th><th>PHONE_NUMBER</th><th>DRIVER_NAME</th><th>STATUS</th></tr>
                      </thead>
                      <?php
                  $result=$mysqli->query("select * from cart ")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['cart_id']."</td>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product_name']."</td>
                    <td>".$row['price']."</td>
                     <td>".$row['quantity']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['location']."</td>
                    <td>".$row['phone_number']."</td>
                   
                   
                    <td>".$row['driver_name']."</td>
                    <td>".$row['status']."</td>
                    <td> <a href='shipment.php?apshpid=$row[cart_id]' class='btn btn-info'>Asign driver</a>
                   

                    
               
                   </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='shreport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>
<?php

     if(isset($_GET['rjshpid']))
  {
    $cart_id=$_GET['rjshpid'];
    $result = $mysqli->query("UPDATE cart SET Status= 'shipped' WHERE cart_id = '$cart_id'") or die($mysqli->error);
   
  
       echo '<script>alert("success!")</script>';
   
  }
  ?>
</div>
<?php
if(isset($_POST['updatedriver']))
{
  if(isset($_POST['did']))
  {
    $did=$_POST['did'];
    $dname=$_POST['dname'];
    $status=$_POST['status'];
  }
}
?>
<div class="card">  
     <?php

  if(isset($_GET['apshpid']))
  {
    $cart_id=$_GET['apshpid'];
    $result=$mysqli->query("select * from cart where cart_id=$cart_id")or die($mysqli->error);
    $row=$result->fetch_array();
    $cart_id=$row['cart_id'];
    $dname=$row['driver_name'];
   
    $status=$row['status'];
    echo "success";
  }
  else
  {
   echo "records will be displayed here";
  }

  ?>

  
            <div class="card-header">
            <h3 class="card-title">Assign Drivers</h3>

          </div>
          <?php
if(isset($_POST['updatedriver']))
       {
        $did=$_POST['did'];
        $dname=$_POST['dname'];
        $status=$_POST['status'];
        $cart_id=$_GET['apshpid'];
        $result=$mysqli->query("INSERT into cart(driver_name,status) values('$dname','$status' where cart_id=$cart_id)");
       }
       ?>
      
          <div class="card-body">
            <?php
            $_SESSION['cid']=$cart_id;
            if(isset($_POST['apshpid']))
            {
              $cart_id=$_POST['apshpid'];
            }
            if(isset($_POST['did']))
            {
              $did=$_POST['did'];
            }
            if(isset($_POST['dname']))
            {
              $dname=$_POST['dname'];
            }
            if(isset($_POST['demail']))
            {
              $demail=$_POST['demail'];
            }
            if(isset($_POST['status']))
            {
              $status=$_POST['status'];
            }
            
            ?>
             <form role="form" method="POST" action="updatedriver.php">
                  <div class="class-body">
                      <div class="form-group">
                        <input type=number name="did" value="<?php echo $_GET['apshpid'];?>"/><br/>
                      <label for="driver_name">DriverName</label><br/>
                      <select  name="dname" id="driver_name" placeholder="driver name"  class="form-control"/> 
                       
                          <option value="">MARY</option>
                          <option value="MARK">MARK</option>
                          <option value="CYRIL">CYRIL</option>
                            <option value="JOHN">JOHN</option><br/>     
                    
                        </select>
                        <label for="driver_name">Status</label><br/>
                             <input type=text name="" value="available"/><br/>
                        </div>
                        
                        
                        
                        <input type="hidden" name="status" id="dvan_id" placeholder="vanid"  class="form-control" value="approved" ></br>
                       
                        <input type="submit" class="btn btn-success" name="updatedriver" value="Assign"/>
                       
                    </div>
                  </div>
                </form>
         
                          </div>
           

            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  <a href="http://elton.html">John Elton okoth @2019</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<<!-- jQuery -->
<script src="../files/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../files/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../files/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../files/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../files/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../files/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../files/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../files/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../files/plugins/moment/moment.min.js"></script>
<script src="../files/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../files/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../files/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../files/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../files/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../files/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../files/dist/js/demo.js"></script>
</body>
</html>


<?php
session_start();
include("db.php");
include  "sidebar.php";
include  "navbar.php";
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>finance manager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../files/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../files/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb"><a href='logout.php' class='btn btn-danger'>Logout</a></li>
      
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
             
                      <?php
                  $result=$mysqli->query("select *  from oders ") or die(mysqli_error($mysqli));
               
                  while(list($oder_id,$product_id,$product_name,$customer_id)=mysqli_fetch_array($result))
                  {
                    $sql="SELECT COUNT(oder_id) AS total FROM oders where status='pending'";
                    $result=$mysqli->query($sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values["total"];
                    echo "<h3>$num_rows</h3>";
                 
                  }
                  ?>
                  <sup style="font-size: 20px">
              
                    </sup>
             

                <p> Pending Orders</p>  

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>

              </div>
                <a href="" class="small-box-footer">View oders <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
             
                     <?php
               
                  $result=$mysqli->query("select *  from customers ") or die(mysqli_error($mysqli));
               
                  while(list($customer_id,$customer_name,$email,$location,$status)=mysqli_fetch_array($result))
                  {
                    $sql="SELECT COUNT(customer_id) AS total FROM customers where status='pending'";
                    $result=$mysqli->query($sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values["total"];
                    echo "<h3>$num_rows</h3>";
                 
                  }
                  ?>
                  <sup style="font-size: 20px">
              
                    </sup>
             

                <p> Pending customers</p>  


              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>

              </div>
                <a href="" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
             
                      <?php
               
                  $result=$mysqli->query("select *  from payments ") or die(mysqli_error($mysqli));
               
                  while(list($oder_id,$user_id,$username,$email,$cardnumber,$total_amt,$cvv,$status)=mysqli_fetch_array($result))
                  {
                    $sql="SELECT COUNT(oder_id) AS total FROM payments where status='pending'";
                    $result=$mysqli->query($sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values["total"];
                    echo "<h3>$num_rows</h3>";
                 
                  }
                  ?>
                  <sup style="font-size: 20px">
              
                    </sup>
             

                <p> Pending Payments</p>  

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>

              </div>
                <a href="" class="small-box-footer">view <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>  
                     <?php
                  $result=$mysqli->query("select *  from sales ") or die(mysqli_error($mysqli));
               
                  while(list($sale_id,$product_id,$product_name,$quantity,$price,$oder_id,$status)=mysqli_fetch_array($result))
                  {
                    $sql="SELECT COUNT(sale_id) AS total FROM sales where status='pending'";
                    $result=$mysqli->query($sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values["total"];
                    echo "<h3>$num_rows</h3>";
                 
                  }
                  ?>

                <p>Pending sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://elton.html">Eltonokoth</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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

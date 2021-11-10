
<?php
session_start();
include  ("db.php");
include  ("sidebar.php");
include  ("navbar.php");
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
          <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">customer table</h3>
          </div>
          <!--card body-->
                	<div class="card-body">
<div class="table-responsive ps">
  <table class="table table-bordered table-hover" id="page1">
    <thead class="text-primary">
     <tr><th>customer_id</th><th>customer_name</th><th>email</th><th>location</th><th>gender</th></tr></thead>
    <?php
      $result=$mysqli->query("select * from users where role='customer'")or die($mysqli->error);
      while ($row=$result->fetch_assoc())
      echo
  "
      <tbody>
      <tr>
      <td>". $row ['user_id']."</td>
      <td>". $row ['username']."</td>
      <td>". $row ['email']."</td>
      <td>". $row ['location']."</td>
      <td>". $row ['gender']."</td>
      </tr>
      <tbody>";
      ?>

</table>
<td><a href='custreport.php' class='btn btn-danger' >Export to PDF</a></td>
<?php
  if(isset($_POST['custexport']))
  {
    require_once('library/tcpdf.php');

  }

?>
      </div>

    </div>
    <?php
    if(isset($_GET['apcid']))
  {
    $customer_id=$_GET['apcid'];
    $result = $mysqli->query("UPDATE customers SET Status= 'approved' WHERE customer_id = $customer_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!");
        window.location.replace("customer.php")';
   
  }
   if(isset($_GET['rjcid']))
  {
    $customer_id=$_GET['rjcid'];
    $result = $mysqli->query("UPDATE customers SET Status= 'rejected' WHERE customer_id = $customer_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Rejected!");
        window.location.replace("customer.php")';
   
  }
  ?>

</div>

                
            

              

            
                    <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            
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
<script src="../filesdist/js/demo.js"></script>
</body>
</html>

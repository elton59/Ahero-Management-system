
<?php
session_start();
include("../db.php");
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="addsales.php">New</a></li>
               <li class="breadcrumb-item"><a href="salesdelete.php">Delete</a></li>      
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
            <h3 class="card-title">Sales</h3>
          </div>
          <!--card body-->
                  <div class="class-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr><th>SALEID<th>PRODUCTID</th><th>PRODUCTNAME</th><th>QUANTITY</th><th>PRICE</th><th>ORDERID</th><th>STATUS</th><th>ACTION</th></tr>
                      </thead>
                     <?php
                  $result=$mysqli->query("select * from sales")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['sale_id']."</td>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product_name']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['oder_id']."</td>
                    <td>".$row['status']."</td>
                    <td> <a href='sales.php?apsid=$row[sale_id]' class='btn btn-success'>Approve<a>
                    <a href='sales.php?rjsid=$row[sale_id]' class='btn btn-danger'>Reject<a></td>
                    </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='../sreport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>
<?php
    if(isset($_GET['apsid']))
  {
    $sale_id=$_GET['apsid'];
    $result = $mysqli->query("UPDATE sales SET Status= 'approved' WHERE sale_id = $sale_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!")</script>';
  
  }
     if(isset($_GET['rjsid']))
  {
    $sale_id=$_GET['rjsid'];
    $result = $mysqli->query("UPDATE sales SET Status= 'rejected' WHERE sale_id = $sale_id") or die($mysqli->error);
   
  
       echo '<script>alert("Record Rejected!")</script>';
   
  }
  ?>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

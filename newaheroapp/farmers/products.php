
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
      <!-- <a hre -->
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
          <div class="card">
            <div class="card-header">
                <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            <li class="btn btn-info"><a href="addallocated.php">Request</a></li>
      
            </ol>
          </div><!--
            <h3 class="card-title"><h3>Raw products </h3>
          </div>
          <!--card body-->
                	<div class="card-body">
                    <p>RAW PRODUCTS</p>
                     <div class="table-responsive ps">
                    <table id="example2" class="table table-bordered table-hover" id="page1">
                      <thead>
                        <tr><th>PRODUCT_ID</th><th>PRODUCT_NAME</th><th>QUANTITY</th><th>FARM_ID</th><th>SUPPLIER</th></tr>
                      </thead>
                    
                       <?php
                  $result=$mysqli->query("select * from rawproducts where status='approved'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product_name']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['farm_id']."</td>
                    <td>".$row['supplier']."</td>
                  
                   </tbody>
                    "
                  ;}
            ?>

</table>
<td><a href='rawreport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>
<?php
    if(isset($_GET['aprpid']))
  {
    $product_id=$_GET['aprpid'];
    $result = $mysqli->query("UPDATE rawproducts SET Status= 'approved' WHERE product_id = $product_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!");
        window.location.replace("products.php")';
   
  }
     if(isset($_GET['rjrpid']))
  {
    $product_id=$_GET['rjrpid'];
    $result = $mysqli->query("UPDATE rawproducts SET Status= 'rejected' WHERE product_id = $product_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!");
        window.location.replace("products.php")';
   
  }
  ?>
</div>

           <div class="card">
            <div class="card-header">
                <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="btn btn-success"><a href="addfinished.php">sell</a></li>
            </ol>
          </div><!--
            <h3 class="card-title"><h3>Finished products</h3>
          </div>
          <!--card body-->
                  <div class="card-body">
                     <th>FINISHED PRODUCTS</th> 
 <div class="table-responsive ps">
                    <table id="example2" class="table table-bordered table-hover" id="page1">
                      <thead>
                        <tr><th>PRODUCT_ID</th><th>PRODUCT_NAME</th><th>category</th><th>QUANTITY</th><th>MILL_ID<th>IMAGE</th><th>price</th>
                      </thead>
                      <?php
                  $result=$mysqli->query("select * from finishedproducts where status='approved'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product_name']."</td>
                    <td>".$row['category']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['mill_id']."</td>
                    <td>".$row['image']."</td>
                    <td>".$row['price']."</td>
                   
                    </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='fnreport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>
<?php
    if(isset($_GET['apfpid']))
  {
    $product_id=$_GET['apfpid'];
    $result = $mysqli->query("UPDATE finishedproducts SET Status= 'approved' WHERE product_id = $product_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!");
        window.location.replace("products.php")';
   
  }
     if(isset($_GET['rjfpid']))
  {
    $product_id=$_GET['rjfpid'];
    $result = $mysqli->query("UPDATE finishedproducts SET Status= 'rejected' WHERE product_id = $product_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!");
        window.location.replace("products.php")';
   
  }
  ?>
</div>  
</section>              
<div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  products
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->

                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
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
<script src="../files/dist/js/demo.js"></script>
</body>
</html>

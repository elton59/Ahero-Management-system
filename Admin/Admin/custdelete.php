
<?php
session_start();
error_reporting(0);
include  ("../db.php");
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
              <div class="card-header card-header-primary">
            <h3 class="card-title"><h3>Delete</h3>
          <!--card body-->
                	<div class="card-body">
<div class="table-responsive ps">
  <table class="table table-bordered table-hover" id="page1">
    <thead class="text-primary">
     <tr><th>customer_id</th><th>customer_name</th><th>email</th><th>location</th><th>status</th><th>action</th></tr></thead>
    <?php
      $result=$mysqli->query("select * from customers")or die($mysqli->error);
      while ($row=$result->fetch_assoc())
      echo
  "
      <tbody>
      <tr>
      <td>". $row ['customer_id']."</td>
      <td>". $row ['customer_name']."</td>
      <td>". $row ['email']."</td>
      <td>". $row ['location']."</td>
      <td>". $row['status']."</td>
      <td><a href='delete.php?cid=$row[customer_id]' class='btn btn-danger'>Delete</a>
     <a href='custdelete.php?cid=$row[customer_id]' class='btn btn-info'>Edit</a></td>
    
      </tr>
      <tbody>";
      ?>

</table>
      </div>
    </div>
  </div>
  </div>
  <div class="card">
    <?php
    if (isset($_GET['cid']))
{
  $customer_id=$_GET['cid'];
  $result=$mysqli->query("select * from customers where customer_id=$customer_id")or die($mysqli->error);
    $row=$result->fetch_array();
    $cname=$row['customer_name'];
    $cemail=$row['email'];
    $clocation=$row['location'];

    header('refresh:1; url=custdelete.php');
    echo "success";
    
}
else
{
  echo "record will be displayed here";
}
?>
              <div class="card-header card-header-primary">
            <h3 class="card-title"><h3>update</h3>
          <!--card body-->
                  <div class="card-body">
      <div class="row justify-content-center ">
          <div class="form-group" >
            <form method='POST' action='custupdate.php' enctype="multipath/form-data">
              <?php
              if(isset($_post['cid']))
              {
                $cid=$_post['cid'];

              }
              if (isset($_post['cname']))
              {
                $cname=$_post['cname'];
              }
              if(isset($_post['cemail']))
              {
                $cemail=$_post['cemail'];
              }
               if(isset($_post['clocation']))
              {
                $clocation=$_post['clocation'];
              }

              ?>
                     
                      <input type='hidden' name='cid' value='<?php echo $_GET['cid']; ?>' ></br>
                      <label for="customer_name">Customer Name</label>
                      <input type="text" class="form-control" id="customer_name" placeholder="customer name" name="cname"  value='<?php echo $cname; ?>' required>
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="occupation" placeholder="email" name="cemail" value='<?php echo $cemail; ?>' required><br/>
                           <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="location" name="clocation" value='<?php echo $clocation; ?>' required><br/>
                        <input type='submit' name='updateCustomer' class = 'btn btn-success' value='update'/>
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

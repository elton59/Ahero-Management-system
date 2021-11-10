
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

            <div class="card-header">
            <h3 class="card-title">Delete Farmers</h3>
          </div>
          <!--card body-->
                  <div class="card-body">
                    <div class="table-responsive ps">
                  <table class="table table-bordered table-hover" id="page1">
                  <thead class="text-primary">
                  <th>farmer_id</th><th>farmer_name</th><th>email</th><th>farm_id</th><th>farm_name</th><th>status</th><th>action</th></th>
                    <?php
                  $result=$mysqli->query("select * from farmers")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['farmer_id']."</td>
                    <td>".$row['farmer_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['farm_id']."</td>  
                    <td>".$row['farm_name']."</td>
                    <td>".$row['status']."</td>
                   <td> <a href='farmersdelete.php?frid=$row[farmer_id]' class='btn btn-info'>edit</a>
                    <a href='delete.php? frid=$row[farmer_id]' class='btn btn-danger'>delete</a></td>
                   </tbody>
                    "
                  ;
                }
            ?>
          </table>
        </div>
      </div>
    </div>

       <div class="card">  
     <?php

  if(isset($_GET['frid']))
  {
    $frid=$_GET['frid'];
    $result=$mysqli->query("select * from farmers where farmer_id=$frid")or die($mysqli->error);
    $row=$result->fetch_array();
    $frname=$row['farmer_name'];
    $fremail=$row['email'];
    $frfid=$row['farm_id'];
    $frfname=$row['farm_name'];
    $status=$row['status'];
    echo "success";
  }
  else
  {
   echo "records will be displayed here";
  }

  ?>
  
            <div class="card-header">
            <h3 class="card-title">update farmers</h3>

          </div>
          <!--card body-->
          <div class="card-body">
            <?php
            if(isset($_POST['frid']))
            {
              $frid=$_POST['frid'];
            }
            if(isset($_POST['frname']))
            {
              $frname=$_POST['frname'];
            }
            if(isset($_POST['fremail']))
            {
              $fremail=$_POST['fremail'];
            }
            if(isset($_POST['fid']))
            {
              $frfid=$_POST['frfid'];
            }
            if(isset($_POST['frfname']))
            {
              $frfname=$_POST['frfname'];
            }
            

            ?>
             <form role="form" method="POST" action="farmerupdate.php">
                  <div class="class-body">
                      <div class="form-group">
                        <input type=hidden name="frid" value="<?php echo $_GET['frid'];?>"/>
                      <label for="farmer_name">Farmer_name</label>
                        <input type="text" name="frname" id="farm_name" placeholder=" farmer name"       
                        class="form-control" value="<?php echo $frname; ?>"  /></br>
                         <label for="email">email</label>
                        <input type="text" name="fremail" id="email" placeholder="email"  class="form-control" value="<?php echo $fremail;?>"" ></br>
                        <label for="farm_id">farm_id</label>
                        <input type="text" name="frfid" id="farm_id" placeholder="farm_id"  class="form-control" value="<?php echo $frfid; ?>" /><br/>
                        <label for="farm_name">farm_name</label>
                        <input type="text" name="frfname" id="farm_name" placeholder="farm name"  class="form-control" value="<?php echo $frfname;?>"" ></br>
                        <input type="submit" class="btn btn-success" name="updatefarmer" value="update"/>
                       
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

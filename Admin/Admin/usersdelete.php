
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
            <h3 class="card-title">Delete Users</h3>
          </div>
          <!--card body-->
                  <div class="card-body">
                    <div class="table-responsive ps">
                  <table class="table table-bordered table-hover" id="page1">
                  <thead class="text-primary">
                  <th>user_id</th><th>username</th><th>email</th><th>password</th><th>role</th><th>status</th><th>action</th></thead>
                    <?php
                  $result=$mysqli->query("select * from users")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['user_id']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['role']."</td>
                    <td>".$row['status']."</td>
                   <td> <a href='usersdelete.php?uid=$row[user_id]' class='btn btn-info'>edit<a>
                    <a href='delete.php?uid=$row[user_id]' class='btn btn-danger'>delete<a></td>
                   </tbody>
                    "
                  ;}
            ?>
          </table>
        </div>
      </div>
    </div>

       <div class="card">  
     <?php

  if(isset($_GET['uid']))
  {
    $uid=$_GET['uid'];
    $result=$mysqli->query("select * from users where user_id=$uid")or die($mysqli->error);
    $row=$result->fetch_array();
    $uname=$row['username'];
    $uemail=$row['email'];
    $upass=$row['password'];
    $urole=$row['role'];
    echo "success";
  }
  else
  {
   echo "records will be displayed here";
  }

  ?>
  
            <div class="card-header">
            <h3 class="card-title">update users</h3>

          </div>
          <!--card body-->
          <div class="card-body">
            <?php
            if(isset($_POST['uid']))
            {
              $uid=$_POST['uid'];
            }
            if(isset($_POST['uname']))
            {
              $uname=$_POST['uname'];
            }
            if(isset($_POST['uemail']))
            {
              $uemail=$_POST['uemail'];
            }
            if(isset($_POST['upass']))
            {
              $upass=$_POST['upass'];
            }
            if(isset($_POST['urole']))
            {
              $urole=$_POST['urole'];
            }


            ?>
             <form role="form" method="POST" action="userupdate.php">
                  <div class="class-body">
                      <div class="form-group">
                        <input type=hidden name="uid" value="<?php echo $_GET['uid'];?>"/>
                      <label for="username">Username</label>
                        <input type="text" name="uname" id="username" placeholder="username"       
                        class="form-control" value="<?php echo $uname; ?>"  /></br>
                        <label for="Email">Email</label>
                        <input type="text" name="uemail" id="email" placeholder="email"  class="form-control" value="<?php echo $uemail; ?>" /><br/>
                        <label for="pass">Password</label>
                        <input type="text" name="upass" id="password" placeholder="password"  class="form-control" value="<?php echo $upass;?>" ></br>
                        <label for="role">Role</label></br>
                        <input type="text" name="urole" placeholder="role" required class="form-control" value="<?php echo $urole; ?>" />
                        <input type="submit" class="btn btn-success" name="updateuser" value="update"/>
                       
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


<?php
session_start();
error_reporting(0);
include  ("../db.php");
include  ("sidebar.php");
include  ("navbar.php");
//error_reporting(0);
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
              <li class="breadcrumb-item"><a href="addcustomer.php">New</a></li>
              <li class="breadcrumb-item"><a href="custdelete.php">Delete</a></li>
      
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
            <h3 class="card-title">Delete Finishedproduct</h3>
          </div>
          <!--card body-->
                  <div class="card-body">
                    <div class="table-responsive ps">
                  <table class="table table-bordered table-hover" id="page1">
                  <thead class="text-primary">
                  <th>product_id</th><th>product_name</th><th>category</th><th>quantity</th><th>mill_id</th><th>image</th><th>price</th><th>status</th><th>action</th></thead>
                    <?php
                  $result=$mysqli->query("select * from finishedproducts")or die($mysqli->error);
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
                    <td>".$row['status']."</td>
                    <td> <a href='finisheddelete.php?fpid=$row[product_id]' class='btn btn-info'>edit<a>
                     <a href='delete.php?fpid=$row[product_id]' class='btn btn-danger'>delete<a></td>
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

  if(isset($_GET['fpid']))
  {
    $product_id=$_GET['fpid'];
    $result=$mysqli->query("select * from finishedproducts where product_id=$product_id")or die($mysqli->error);
    $row=$result->fetch_array();
    $fpname=$row['product_name'];
    $fcategory=$row['category'];
    $fquantity=$row['quantity'];
    $fmid=$row['mill_id'];
    $fimg=$row['image'];
    $fprice=$row['price'];
    $status=$row['status'];
    echo "success";
  }
  else
  {
   echo "records will be displayed here";
  }

  ?>
  
            <div class="card-header">
            <h3 class="card-title">Delete Rawproduct</h3>

          </div>
          <!--card body-->
          <div class="card-body">
            <?php
            if(isset($_POST['fpid']))
            {
              $fpid=$_POST['fpid'];
            }
            if(isset($_POST['fpname']))
            {
              $fpname=$_POST['fpname'];
            }
            if(isset($_POST['fcategory']))
            {
              $fcategory=$_POST['fcategory'];
            }
            if(isset($_POST['fquantity']))
            {
              $fquantity=$_POST['fquantity'];
            }
            if(isset($_POST['fmid']))
            {
              $fmid=$_POST['fmid'];
            }
              if(isset($_POST['fimg']))
            {
              $fimg=$_POST['fimg'];
            }
               if(isset($_POST['fprice']))
            {
              $fprice=$_POST['fprice'];
            }


            ?>
             <form role="form" method="POST" action="finishedupdate.php">
                  <div class="class-body">
                      <div class="form-group">
                        <input type=hidden name="fpid" value="<?php echo $_GET['fpid'];?>"/>
                      <label for="product_name">ProductName</label>
                        <input type="text" name="fpname" id="product_name" placeholder=" product name"       
                        class="form-control" value="<?php echo $fpname; ?>"  /></br>
                        <label for="category">category</label></br>
                        <input type="text" name="fcategory" placeholder="category" id="category" class="form-control" value="<?php echo $fcategory; ?>" />
                        <label for="quantity">Quantity</label>
                        <input type="text" name="fquantity" id="quantity" placeholder=" occupation"  class="form-control" value="<?php echo $fquantity; ?>" /><br/>
                        <label for="mill_id">millid</label>
                        <input type="text" name="fmid" id="millid" placeholder="millid"  class="form-control" value="<?php echo $fmid;?>" ></br>
                        <label for="image">Image</label>
                        <input type="file" name="fimg" id="image" placeholder="image"  class="form-control" value="<?php echo $fimg;?>" ></br>
                        <label for="price">price</label>
                        <input type="text" name="fprice" id="price" placeholder="price"  class="form-control" value="<?php echo $fprice;?>" ></br>
                        <input type="submit" class="btn btn-success" name="updatefinishedproduct" value="update"/>
                       
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


<?php
session_start();
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
  
<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  if(isset($_POST['add']))
 {
    
    $pname=$_POST['pname'];
    $category=$_POST['category'];
    $quantity=$_POST['quantity'];
    $fname=$_POST['fname'];
    $mno=$_POST['mno'];
   
    $price=$_POST['price'];
          $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "Ahero";
            //create connection
             $mysqli= new mysqli($servername,$username,$password,$db);
          
            $sql=$mysqli->query("INSERT INTO purchased(product_name,category,quantity,price,farmer_name,mpesa_number) VALUES('$pname','$category','$quantity','$price','$fname','$mno')") or die($mysqli->error);
            if($sql){
      
      echo "<script>alert('record added successfully');
        window.location.replace('products.php');

            </script>";

    }
    else
    {
      echo "<script><alert>('record updation failed');
            </script>";
    }
  }


  ?>
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
            <h3 class="card-title">Sell your products</h3>
          </div>
          <div class="card-body">
          <?php
         if(isset($_POST['pname']))
         {
          $pname=$_POST['pname'];
         }
         if(isset($_POST['category']))
         {
          $category=$_POST['category'];
         }

         if(isset($_POST['quantity']))
         {
          $quantity=$_POST['quantity'];
        }
         if(isset($_POST['price']))
         {
          $price=$_POST['price'];
         }
         if(isset($_POST['fname']))
         {
          $fname=$_POST['fname'];
         }
        if(isset($_POST['mno']))
         {
          $mno=$_POST['mno'];
         }
       
         

          ?>
                   <form role="form" method="POST">
                  <div class="class-body">
                      <div class="form-group">
                        <label for="product_name">Category</label>
                       <select  name="category"  placeholder="category"class="form-control" required/>
                       <option value="rice">rice</option>
                       <option value="watemellon">watemellon</option>
                       <option value="soyabeans">soyabeans</option>
                       </select>
                        </br>
                      <label for="product_name">ProductName</label>
                       <select  name="pname"  placeholder="enter product name"class="form-control" required/>
                       <option value="PurePishori">purePishori</option>
                       <option value="Sindano">Sindano</option>
                       <option value="DawatRice">DawatRice</option>
                       <option value="pealpishori">pealpishori</option>
                       <option value="redwatermellon">redwatermellon</option>
                       <option value="yellowseedlesswatermellon">yellowseedlesswatermellon</option>
                       <option value="cutronwatermellon">cutronwatermellon</option>
                       <option value="ogarnicsoyabeans">ogarnicsoyabeans</option>
                       <option value="greensoyabeans">greensoyabeans</option>
                       <option value="roastedsoyabeans">roastedsoyabeans</option>

                       </select>
                        </br>
                        
                        <label for="quantity">Quantity(KGS)</label>
                        <input type="text" name="quantity"  placeholder="enter quantity"  class="form-control" required/><br/>
                        
                        
                         <label for="price">Price</label></br>
                        <input type="number" name="price" placeholder="quote your price" class="form-control" required  />
                        <label for="price">Farmer_name</label></br>
                        <input type="tetx" name="fname" placeholder="name" class="form-control" required  />
                        <label for="price">Mpesa number</label></br>
                        <input type="number" name="mno" placeholder="number" class="form-control" required  />
                        <input type="submit" class="btn btn-info" name="add" value="sell"/>
                        <input type="reset"  class="btn btn-danger" name="cancel" value="cancel"/>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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

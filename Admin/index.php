<?php require_once("../includes/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php require_once("header.php");  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once("sidebar.php");  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php
             require_once("../includes/db.php");
                $query = "select count(student_id) as studentcount from student";
                $result = mysqli_query($connection, $query);
                $values = mysqli_fetch_assoc($result);
                $num_of_students = $values['studentcount'];
             
             
              echo"<h3>$num_of_students</h3>";
                  
                  
                  
            ?>

              <p>Number of Students</p>
            </div>
            <div class="icon">
<!--              <i class="ion ion-bag"></i>-->
            </div>
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              
              
              
              <?php
             require_once("../includes/db.php");
                $query = "select count(teacher_id) as teachercount from teacher";
                $result = mysqli_query($connection, $query);
                $values = mysqli_fetch_assoc($result);
                $num_of_teachers = $values['teachercount'];
             
             
              echo"<h3>$num_of_teachers</h3>";
                  
                  
                  
            ?>

              <p>Number of Teachers</p>
            </div>
            <div class="icon">
<!--              <i class="ion ion-stats-bars"></i>-->
            </div>
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              
              <?php
             require_once("../includes/db.php");
                $query = "select count(group_id) as groupcount from group_name";
                $result = mysqli_query($connection, $query);
                $values = mysqli_fetch_assoc($result);
                $num_of_groups = $values['groupcount'];
             
             
              echo"<h3>$num_of_groups</h3>";
                  
                  
                  
            ?>
              

              <p>Number of Groups</p>
            </div>
            <div class="icon">
<!--              <i class="ion ion-person-add"></i>-->
            </div>
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
<!--
       
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017-2018 Vesit Students.</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../dist/js/demo.js"></script>


</body>
</html>

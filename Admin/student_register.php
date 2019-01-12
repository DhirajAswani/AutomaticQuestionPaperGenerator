
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | Sign up</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.css">
  <!-- Morris chart -->
<!--  <link rel="stylesheet" href="bower_components/morris.js/morris.css">-->
  <!-- jvectormap -->
<!--  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">-->
  <!-- Date Picker -->
<!--  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">-->
  <!-- Daterange picker -->
<!--  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <!-- bootstrap wysihtml5 - text editor -->
<!--  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php  require_once("header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once("sidebar.php"); ?>

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
        <li class="active">Add Student</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
       <div class="container">
          <div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin | </b>Add Student</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new Student</p>

    <form action="add_student.php" method="post" onsubmit="return validateForm()" name="myForm">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Name" name="student_name" id="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        
        <p clas="form-control" id="student_name" style="color:red;"></p>
        
      </div>
      
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="student_email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p clas="form-control" id="student_email" style="color:red;"></p>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Password" name="student_password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p clas="form-control" id="student_password" style="color:red;"></p>
      </div>
      
      <div class="form-group has-feedback">
              <select name="branch_id" class="input-field form-control" id="branch_select" onchange="showDivision(this.value)" >
              <option value='0'>Select Branch</option>
              <?php
                 require_once("../includes/db.php");
                 global $connection;
                  $query ="select * from branch";
                  $result_set=mysqli_query($connection,$query);
                  $num=mysqli_num_rows($result_set);
                  echo num;

                  $count=0;
                  while($count != $num){
                      $row=mysqli_fetch_assoc($result_set);
                      $name=$row['branch_name'];
                      $id = $row['branch_id'];
                      echo "<option value='$id'>$name</option>";
                      $count = $count+1;
                  }
                ?>
              </select>
              <p clas="form-control" id="student_branch" style="color:red;"></p>
        </div>
      
      
      
      
       <div class="form-group has-feedback">
              <select name="division_id" class="input-field form-control" id="division_select" >
              <option value='0'>Select Division</option>
              
              </select>
              <p clas="form-control" id="student_division" style="color:red;"></p>
        </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
<!--
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="register" class="btn btn-primary btn-block btn-flat" name="add_student" >Register</button>
        </div>
        <!-- /.col -->
      </div>
      
   <?php
      if(isset($_GET['q'])){
          if($_GET['q'] == '1'){
              
          
    echo "<h2 style='color:green; padding-top=50px ;text-align:center'>Studnet have been registered!!!</h2>";
          }
      }
  ?>
    </form>

<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->

<!--    <a href="login.html" class="text-center">I already have a membership</a>-->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

           
</div>
       
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

   <?php
//      if(isset($_GET['q'])){
//          if($_GET['q'] == '1'){
//              
//          
//    echo "<h2 style='color:green; padding-top=50px ;text-align:center'>Studnet have been registered!!!</h2>";
//          }
//      }
  ?>
   
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
<!--      <b>Version</b> 2.4.0-->
    </div>
    <strong>Copyright &copy; 2017-2018 Vesit Students.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

<script src="student_register.js"></script>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../dist/js/demo.js"></script>


    <script>
  //      window.alert();
    function showDivision(val){
//        window.alert();
        if(val == 0){
            
            return;
        }
          xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
//      window.alert();
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("division_select").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getdivision.php?q="+val, true);
  xhttp.send();

    }
    
    </script>  

</body>
</html>
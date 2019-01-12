<?php
require_once('../includes/db.php');
ob_start();



function displayallstudents()
{
    global $connection;
    
                                $query = 'SELECT * FROM student where branch_id = 1 and division_id = 27';
                                $select_student = mysqli_query($connection , $query);
                    
                                 while($row = mysqli_fetch_assoc($select_student)){
                                $student_id = $row['student_id'];
                                 $student_name= $row['student_name'];
                                 $student_email = $row['student_email'];
                                 
                                   echo"<tr>";
                                        echo"<td>{$student_name}</td>";
                                        echo"<td>{$student_email}</td>";
                                        echo"<td><a href = 'student_inft_d15.php?delete={$student_id}'>Delete</a></td>";
                                        echo"<td><a href = 'student_inft_d15.php?edit={$student_id}'>Edit</a></td>";
                                    echo"</tr>";
                                 
                                 }
}




function deleteStudent()
{
    global $connection;
    
    if(isset($_GET['delete']))
    {
    $student_id = $_GET['delete'];
    echo $student_id;
     $query = "delete from student where student_id = {$student_id}";
                                    $delete_query = mysqli_query($connection,$query);
                                    header("Location: http://localhost/adminLTE-master/Admin/student_inft_d15.php");
                                    exit();    
    }
}




function editStudent()
{
    global $connection;
    
    if(isset($_GET['edit']))
    {
        $student_id = $_GET['edit'];
//        echo $teacher_id;
        $query  = "select * from student where student_id = $student_id";
        $select_student_id = mysqli_query($connection  , $query);
        while($row = mysqli_fetch_assoc($select_student_id))
        {
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_email = $row['student_email'];
//            echo $teacher_id;
//            echo $teacher_name;
//            echo $teacher_email;
        ?>
           <form action="student_update_inft_d15.php" method="get">
           <input type="text" value="<?php if(isset($student_id)){echo $student_id; }  ?>" class="form-control" name="student_id">
            <input type="text" value="<?php if(isset($student_name)){echo $student_name; }  ?>" class="form-control" name="student_name">
             <input type="text" value="<?php if(isset($student_email)){echo $student_email; }  ?>" class="form-control" name="student_email">
             <input type="submit" class="btn btn-primary" name = "update" value = "Update">
            </form>
            
            
  

            
            
            
        <?php
         } 
        
    }
}
?>



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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php require_once("header.php");  ?>
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
        <li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
        <li>Student</li>
        <li>Inft</li>
        <li class="active">D15</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="container">
            <div class="col-md-10">
                <table class="table table-striped table-dark table-hover">
                    <thead>
                        <tr class="info">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                               displayallstudents();
                                    deleteStudent();
                                    editStudent();
?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Vesit Students</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../dist/js/demo.js"></script>
</body>
</html>
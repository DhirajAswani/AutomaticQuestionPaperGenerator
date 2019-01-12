<?php require_once("../includes/db.php"); 

function display_group_students(){
global $connection;
$group_id = intval($_GET['click']);
$deletegroup = $_GET['deletegroup'];
$addgroup = $_GET['add'];



                $query = "select * from group_student where group_id = $group_id";

                $show_student_id = mysqli_query($connection , $query);
                while($row = mysqli_fetch_array($show_student_id)){
                            
                                $student_id = $row['student_id'];
                    echo"<br>";

                    $query1  = "select * from student where student_id = $student_id";
                    $result = mysqli_query($connection , $query1);
                    $row1 = mysqli_fetch_array($result);
                    $student_name = $row1['student_name'];
                    $student_email = $row1['student_email'];

                    
                    echo"<tr>";
                                        echo"<td>{$student_name}</td>";
                                        echo"<td>{$student_email}</td>";
                                        echo"<td><a href = 'group_student_delete.php?delete={$student_id}&click={$group_id}&deletegroup={$deletegroup}&add={$addgroup}'>Delete</a></td>";
                                        echo"<td><a href = 'group_student_update.php?edit={$student_id}&click={$group_id}&deletegroup={$deletegroup}&add={$addgroup}'>Edit</a></td>";
                                    echo"</tr>";
                    
                    
       
                                 
                                 }
                
}


?>

<?php
//         } 
//        
//    }
//}







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
        <li class="active">Group</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="container">
            <div class="col-md-10">
               <div class="col-md-5" style="margin-bottom:20px;">
                <?php 
                   
                   $deletegroup = $_GET['deletegroup'];
                    $addgroup = $_GET['add'];
                   
                   
                   
                   echo"<li class='list-group-item list-group-item-danger'><a href='group_delete.php?deletegroup={$deletegroup}&add={$addgroup}'>Delete Group</a></li>" ?>
               </div>
               
<!--
               <div class="col-md-5">
        
-->
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
<?php                               display_group_students();
//                                    deleteStudent();
//                                    editStudent();
?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>    
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

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../bower_components/select2/dist/js/select2.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../Admin/select_student.js"></script>
</body>
</html>

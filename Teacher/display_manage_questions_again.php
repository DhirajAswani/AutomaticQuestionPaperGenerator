<?php

require_once("../includes/db.php");

function displayquestions(){
    
    global $connection;

    

    
    $subject_ids = $_GET['subject'];
    $module_ids = $_GET['module'];
    $chapter_ids=$_GET['chapter'];
    
    
    
    
    $query = "select * from question where subject_id = $subject_ids and module_id = $module_ids and chapter_id = $chapter_ids";
//    echo $query;
    $result = mysqli_query($connection , $query);
   while( $row = mysqli_fetch_assoc($result))
    {   $question_id = $row['question_id'];
        $question_statement = $row['question_statement'];
        $difficulty_level = $row['difficulty_level'];
        $marks = $row['marks'];
        
//        echo $question_statement;
//        echo $difficulty_level;
//        echo $marks;
        if($difficulty_level == 1)
        {
            $difficulty_level = "Easy";
        }
        else if($difficulty_level == 2)
        {
            $difficulty_level = "Medium";
        }
       else{
           $difficulty_level = "Hard";
       }
       if($marks == 0)
       {
           $marks = 5;
       }
       else{
           $marks = 10;
       }
        echo"<tr>";
        echo"<td>$question_statement</td>";
        echo"<td>$difficulty_level</td>";
        echo"<td>$marks</td>";
        echo"<td><a href = 'manage_questions_delete.php?delete={$question_id}&subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}'>Delete</a></td>";
        echo"<td><a href = 'manage_questions_edit.php?edit={$question_id}&subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}'>Edit</a></td>";
        echo"</tr>";
        
        
     
    
        
        
    }
    
    echo"<div style='margin-bottom:25px;' class='col-md-3'>";
    echo"<li class='list-group-item list-group-item-success'><a href='manage_questions_add.php?add={$question_id}&subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}'>Add Question</a></li>";
    echo"</div>";
    
    
    
    
}

?>

 
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teacher | Dashboard</title>
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

<?php require_once("teacher_header.php");  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once("teacher_sidebar.php"); ?>
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
        <div class="container">
            <div class="col-md-10">
              
                <table class="table table-striped table-dark table-hover">
                    <thead>
                        <tr class="info">
                            <th>Question Name</th>
                            <th>Question Difficulty</th>
                            <th>Marks</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                               displayquestions();
//                                    deleteStudent();
//                                    editStudent();
?> 
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</section>    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
<!--
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
-->
    <strong>Copyright &copy; 2017-2018 Vesit Students.</strong> All rights
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

<script src="../dist/js/demo.js"></script>
</body>
</html>
  







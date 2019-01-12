<?php
require_once("db.php");



$query = "
SELECT * FROM subject 
ORDER BY subject_name ASC
";

$statement = $connection->prepare($query);

$statement->execute();

$result = $statement->fetchAll();






//On page 2


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
  
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
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
        <li><a href="teacher_dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Questions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <form action="manage_question_table.php" method="post">
          
          <div class="row">
       
       <div class = "col-md-11">
           
           
           <div style="width: 500px; margin:0 auto; margin-top:100px;">
    <div class="form-group">
     <label>Select Subject</label><br />
     <select id="first_level" name="first_level[]" multiple class="form-control">
     <?php
     foreach($result as $row)
     {
      echo '<option value="'.$row["subject_id"].'">'.$row["subject_name"].'</option>';
     }
     ?>
     </select>
    </div>
    <div class="form-group">
     <label>Select Module</label><br />
     <select id="second_level" name="second_level[]" multiple class="form-control">

     </select>
    </div>
    <div class="form-group">
     <label>Select Chapter</label><br />
     <select id="third_level" name="third_level[]" multiple class="form-control">

     </select>
    </div>
    <div>
          <button type="submit" class="btn btn-primary " name = "generate">Show Questions</button>
        </div>
   </div>
          
           
           
       </div>
       
       
       
        
    </div>
       
          
          
      </form>

    </section>
    
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017-2018 Vesit Students.</strong> All rights
    reserved.
  </footer>

  
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
    <script>
$(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select Subject',
  buttonWidth:'400px',
  onChange:function(option, checked){
      
    
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
   console.log(selected);

    
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_second_level.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
     }
    })
   }
  }
 });
    


 $('#second_level').multiselect({
  nonSelectedText: 'Select Module',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
      console.log(selected);
      
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_third_level.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#third_level').html(data);
      $('#third_level').multiselect('rebuild');
     }
    });
   }
  }
 });

 $('#third_level').multiselect({
  nonSelectedText: 'Select Chapter',
  buttonWidth:'400px',
     onChange:function(option,checked){
         var selected = this.$select.val();
      console.log(selected);
     }
 });

});
        
        
        
        



</script>


<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../dist/js/demo.js"></script>

<!--

-->



</body>
</html>

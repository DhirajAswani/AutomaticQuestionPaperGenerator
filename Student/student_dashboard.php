<?php
session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$student_id=$_SESSION['student_id'];
   ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | Dashboard</title>
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
  <style>
    .button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    margin-top: 50px;
    border: 1px solid;
        
}
      .button2{
          font-size: 20px;
      }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php require_once("student_header.php");  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once("student_sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
           
           
            <div style="padding-top:10px;
            padding-bottom:10px;
            padding-left:15px;
            padding-right:30px;
  margin-top: 8px;
  margin-right: 0;
  margin-left:11px;
  background: #ddd;
  font-size: 17px;
  border: none;
  ">
               <i class="fa fa-search" style="padding-right:8px;"></i>
                <input type="text" onkeyup="showResult(this.value)" onclick="off()" onemptied="on()" placeholder="Search...">
            
           
            </div>
            <div id="show"></div>
            
            
            
           <div id="display">
            <?php
            global $connection;
            global $student_id;
//            $student_id = $_GET['id'];
//        echo $student_id;
        
        $query = " select s.generated_question_paper_id,s.share_id,g.group_name,t.teacher_name,gpt.generated_paper_name,sub.subject_name from share s,group_student gs,student st,group_name g,teacher t,generated_paper_by_teacher gpt,subject sub where gs.group_id=s.group_id and st.student_id=gs.student_id and g.group_id = s.group_id and t.teacher_id=s.teacher_id and  gpt.subject_id=sub.subject_id and s.generated_question_paper_id=gpt.generated_paper_id and st.student_id=$student_id";
        
        $result_set = mysqli_query($connection,$query);
        
        $num=mysqli_num_rows($result_set);
        
//        echo $num;
        $count=0;
        
//        $query=;
        while($count != $num){
            $row=mysqli_fetch_assoc($result_set);
            $teacher_name = $row['teacher_name'];
//            echo $teacher_name;
            $subject = $row['subject_name'];
            $paper_name = $row['generated_paper_name'];
            $group_name = $row['group_name'];
            $paper_id=$row['generated_question_paper_id'];
            echo "<a class='button2' href='view_paper.php?id={$paper_id}' style='background: rgba(242,245,245);color: #202124; margin: 10px; padding-left:25px; width:100%; height:55px;text-align:left; border-radius:4px; border:solid 2px buttonface; line-height:2.5em; display:inline-block; border-style:outset'>$teacher_name<span style='padding-left:30%;'>$subject . $paper_name</span><span style='padding-left:20%;'>Shared with:$group_name </span></a>";
            $count = $count +1;
        }
            ?>
        
        
        
    </div>
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
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

<script src="../dist/js/demo.js"></script></body>


<script type="text/javascript">

   
    function showResult(str){
        if (str.length==0)
  { 
    document.getElementById("show").innerHTML="";
    document.getElementById("show").style.border="0px";
    return;
  }
        xmlhttp = new XMLHttpRequest();
//                window.alert();

        xmlhttp.onreadystatechange = function(){
//                    window.alert();

            if (this.readyState==4 && this.status==200) {
      document.getElementById("show").innerHTML=this.responseText;
//      document.getElementById("show").style.border="1px solid #A5ACB2";
        }
    }
        
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
    
}


    function off(){
//        window.alert();
        var x= document.getElementById("display");
//        if (x.style.display === "none") {
//        x.style.display = "block";
//        } else {
//        x.style.display = "none";
//        }
        x.style.display = "none";
}
// 
//    function on(){
////        window.alert();
//        var x= document.getElementById("display");
//        x.style.display = "block";
//        
//}   
    
    </script>    


</html>

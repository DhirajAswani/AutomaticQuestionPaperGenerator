<?php
session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$student_id=$_SESSION['student_id'];



function fetch_data(){
        global $connection;
        
        $paper_id=$_GET['id'];
//        echo $paper_id;
        $output = '';
        $query="select * from generated_paper where generated_paper_id = $paper_id";
        $result_set=mysqli_query($connection,$query);
        $num_rows = mysqli_num_rows($result_set);
        $count=0;
        while($num_rows != $count){
            $row = mysqli_fetch_assoc($result_set);
            $main_questionNumber= $row['question_number'];
            $sub_question = $row['question_number_sub'];
            $question_statement = $row['question_statement'];
            $question_marks = $row['question_marks'];
            $question_id = $row['question_id'];
            $output .= "<tr><td><strong>$main_questionNumber</strong></td>
                       <td>$sub_question</td>
                       <td>$question_statement</td>
                       <td>$question_marks</td>
                       </tr>";
            $count=$count+1;
            
        }
            return $output;
}


if(isset($_POST["create_pdf"]))  
 {  
      require_once('../pdfgenerator/TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <br>
      <h3 align="centre">Vivekanada Education Society Institute Of Technology</h3><br>
      <h4 align="right" > Q.P CODE:---- </h4> 
 
      <h3 align="right" > Time:---- </h3> 
      
      <h4 align="center">Question Paper</h4><br /><br />  
      <table cellspacing="0" cellpadding="5">
        
        <tr>
        <th width="7%"></th>
        <th width="7%"></th>
        <th width="65%"><strong>Question</strong></th>
        <th width="10%"><strong>Marks</strong></th>
        </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 
      ob_end_clean();
      $obj_pdf->Output('QuestionPaper.pdf', 'I');  
 } 



















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
        <li><a href="student_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
           <div style="margin-left:300px; margin-top:50px">
    <table class="table table-bordered table-hover table-responsive">
<!--        <col width ="50">-->
        <col width ="30">
       <col width = "480">
<!--       <col width = "10">-->
        <tr>
        
           <?php
//        $id=$_GET['id'];
//        require_once("../includes/db.php");
        require_once("display_paper.php");
//          echo fetch_data();          
        
        
            ?>
          
        
        
    <form action="" method="post">
                    <div class="col-md-12">
                         
<!--                            <div class="col-md-10">-->
                                <button style="margin-left:400px;margin-bottom:0px;"type="Submit" name="create_pdf"class="btn btn-info btn-lg">Download as Pdf</button>
<!--                            </div>-->
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

    
    </script>    


</html>

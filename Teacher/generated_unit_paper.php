<?php
error_reporting(0);
require_once("db.php");


session_start();




//session_start();
include_once("../includes/db.php");
global $connection;
if(isset($_POST['save'])){
//    echo "in save";
$generated_paper_name = $_POST['generated_paper_name'];
$save_question_id=$_SESSION['question_id'];
$save_question_number=$_SESSION['question_number'];
$save_question_sub=$_SESSION['question_sub'];
$save_question_marks=$_SESSION['question_statement'];
$save_question_statement=$_SESSION['question_marks'];
$save_question_subject =$_SESSION['subject']; 
$generated_by=$_SESSION['teacher_id'];
    
    
$query="insert into generated_paper_by_teacher (generated_by,subject_id,generated_paper_name) values ($generated_by,$save_question_subject,'$generated_paper_name')";
$result_set = mysqli_query($connection,$query);
$generated_paper_id = mysqli_insert_id($connection);
//$_SESSION['testid'] = $generated_paper_id;
$number_of_questions = sizeof($save_question_id);
$count=0;
while($count != $number_of_questions){
$query = "insert into generated_paper(generated_paper_id,question_id,question_number,question_number_sub,question_statement,question_marks) values ($generated_paper_id , $save_question_id[$count] , '$save_question_number[$count]',
'$save_question_sub[$count]' , '$save_question_statement[$count]' , $save_question_marks[$count] )";
$result_set = mysqli_query($connection,$query);
$count=$count+1;
}//echo "Saved to database";

unset($_POST['save']);
header("Location: paper_to_pdf.php?id=$generated_paper_id");
exit();
}





















if(isset($_POST['generate']))
{   
    
    $subject_id = $_POST['first_level'];
    //echo"<h1>Subject ids</h1>";
    //echo"<br>";
     //print_r($subject_id);
     $subject_ids = implode(",",$subject_id);
    //echo $subject_ids;
    //echo"<br>";
    
    $module_id = $_POST['second_level'];
    //echo"<h1>Module ids</h1>";
    //echo"<br>";
     $module_ids = implode(",",$module_id);
    //echo $module_ids;
    //echo"<br>";
    $chapter_id = $_POST['third_level'];
    //echo"<h1>Chapter_id / Sub_topic_ids</h1>";
    //echo"<br>";
    $chapter_ids = implode(",",$chapter_id);
    //echo $chapter_ids;
    
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-edit"></i>Create Test</li>
        <li class="fa fa-circle-o">Unit Test</li>
        <li class="fa fa-circle-o">Generated Unit Paper</li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-10">


            <table class="table table-bordered table-hover table-responsive" >
                <thead>
                    <tr class="info">
                        <th>Serial No</th>
                        <th>Question Paper</th>
                        <th>Marks</th>

                    </tr>

                </thead>
                <tbody>
                    <?php


/*-----------------------5,5,5,5 Marks --------------------------------*/
 function question_1_type_1($question_1_count,$counts,$total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_1_6;
     
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
     global $subject_ids;
     global $module_ids;
     global $chapter_ids;
            
            
            
     
            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
            echo "<td>"."<strong>"."Attempt any five"."</strong>"."</td></tr>";
            
            while($question_1_count != 6){
            
            $val = rand(1,50);
            
            $counts=$counts+1;    

            $query = "select * from question where question_id=$val and subject_id=$subject_ids and chapter_id in ($chapter_ids) and module_id in ($module_ids) and history != 1";
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $i=0;
                $question_1_count=$question_1_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                
                
                
                
                
                echo "<tr><td>".$question_number[$question_1_count -1]."</td>";
                echo "<td>".$question_statement."</td>";
                echo "<td>"."2"."</td>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                
                
                
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_1_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,2);
                
                
            }
        }
        
    }
/*-----------------------10 Marks --------------------------------*/


    function question_1_type_2($question_1_count,$counts,$total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_1_6;
        
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
        global $subject_ids;
     global $module_ids;
     global $chapter_ids;
            
     
            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
            echo "<td>"."<strong>"."Attempt any one"."</strong>"."</td></tr>";
            
        
            while($question_1_count != 2){

            $val = rand(1,50);
            $counts=$counts+1;    

            $query = "select * from question where question_id=$val and subject_id=$subject_ids and chapter_id in ($chapter_ids) and module_id in ($module_ids) and history != 1";
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                
                $question_1_count=$question_1_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                echo "<tr><td>".$question_number[$question_1_count -1]."</td>";
                echo "<td>".$question_statement."</td>";
                echo "<td>"."5"."</td>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_1_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,5);
                
                
            }
        }
        
    }
function reset_history(){
    global $connection;
    $query = "Update question set history=0";
    $rested_history=mysqli_query($connection,$query);
    
}
        
        
/*************************************************************************************/
        
        
/*************************************Global Variables********************************/
    
$ques_no_1 = array("Q1");

$ques_no_2_3 =array("Q2","Q3");
$question_number=array("a)","b)","c)","d)","e)","f)");
$total_main_questions=array("Q1","Q2","Q3");

$save_question_id=array();
$save_question_number=array();
$save_question_sub=array();
$save_question_marks=array();
$save_question_statement=array();

//-------------------------------Function Calls---------------------------------

question_1($total_main_questions[0]);  
question_2_3($total_main_questions[1]);
question_2_3($total_main_questions[2]);
reset_history();

        
        
///********************************************Question 1****************************************/
function question_1($total_main_questions){
    global $ques_no_1;
    $question_1_count=0;

    $counts=0;
    question_1_type_1($question_1_count,$counts,$total_main_questions);
}
        
 function question_2_3($total_main_questions){
    global $ques_no_2_3;
    
    $question_1_count=0;

    $counts=0;
    question_1_type_2($question_1_count,$counts,$total_main_questions);
}
                    

    $_SESSION['question_id']=$save_question_id;
    $_SESSION['question_number']=$save_question_number;
    $_SESSION['question_sub']=$save_question_sub;
    $_SESSION['question_statement']=$save_question_marks;
    $_SESSION['question_marks']=$save_question_statement;
    $_SESSION['subject']=$subject_ids;
//    print_r ($_SESSION['question_id']);                
//    $_SESSION['my session']="sanjay";

    
        
?>

                </tbody>
            </table>
        </div>
        <form action="" method="post">
                    <div class="col-md-12">
                         <div class="col-md-10">
                        <!--    <button id="myModal" type="button" class="btn btn-success pull-right ">Save</button>-->
                           
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Save</button>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Please Confirm!</h4>
                                        </div>
                                        
                                <div class="modal-body">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="generated_paper_name" class="form-control" placeholder="Question Paper name">
                        <!--                <span class="glyphicon glyphicon-user form-control-feedback"></span>-->
                                      </div>

                              </div>
                                        <div class="modal-footer">
                                          
                                           <button type="Submit" name="save" class="btn btn-success btn-default">Save</button>
                                           
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                            
                    </div>     
                </form>

        


    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
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
</html>



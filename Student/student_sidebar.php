<?php

//session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$id=$_SESSION['student_id'];
   
$query = "select * from student where student_id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$student_name = $row["student_name"];
$student_email = $row["student_email"];
$division_id = $row["division_id"];

$query = "select division_name from division where division_id = $division_id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$division_name = $row["division_name"];
echo "in side bar";
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
<!--        <li class="header">MAIN NAVIGATION</li>-->
        <li style="margin-left:70px;">
          <a href="teacher_dashboard.php">
            <i class="fa fa-user-circle fa-5x"></i>
<!--
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
-->
          </a>
          
        </li>
        <li>
          <p style="text-align:center; color:#b8c7ce; margin-top:10px; margin-bottom:10px; ">Name: <?php echo $student_name; ?> </p>
          
        </li>
        <li>
          <p style="text-align:center; color:#b8c7ce; margin-top:10px; margin-bottom:10px; ">Email: <?php echo $student_email; ?></p>
          
        </li>
        <li>
           <p style="text-align:center; color:#b8c7ce; margin-top:10px;">Div: <?php echo $division_name; ?> </p>
          
        </li>
       
    

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   


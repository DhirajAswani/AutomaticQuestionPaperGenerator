<?php

require_once("../includes/db.php");
$student_id = intval($_GET['delete']);
//echo"<h1>$student_id</h1>";
//echo"<br>";
$group_id = intval($_GET['click']);
//echo"<h1>$group_id</h1>";


    
//     $query = "delete from student where student_id = {$student_id}";
//     $delete_query = mysqli_query($connection,$query);

    $query1 = "delete from group_student where group_id = {$group_id} and student_id = {$student_id}";
    $delete_query = mysqli_query($connection , $query1);
//     header("Location: http://localhost/adminLTE-master/Admin/group_students.php");
//     exit();    
//    


require_once("group_students.php");

?>
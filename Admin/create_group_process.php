<?php
//echo "insave padge";
include_once("../includes/db.php");
session_start();

global $connection;

if(isset($_POST['create_group'])){
    
    $group_name = $_POST['group_name'];
    $branch_id = $_POST['branch_id'];
    echo $group_name;
    
    $query = "insert into group_name (group_name,branch_id) values('$group_name',$branch_id)";
    $result_set = mysqli_query($connection,$query);
    echo $query;
    
    $created_group_id = mysqli_insert_id($connection);
    
    
    
    
    $student_id = $_POST['student'];
//    echo $student_name;
    echo "<br>";
    print_r($student_id);
    echo "<br>.$student_id";
    
    $number_of_questions = sizeof($student_id);
    echo "<br>";
    echo $number_of_questions;
    
    foreach($student_id as $student){
        
    $query = "insert into group_student (group_id,student_id) values($created_group_id,$student)";
    $result_set = mysqli_query($connection,$query);
    echo $query;
    
    }
//    $query = "insert into group_student (group_id,student_id) values($created_group_id,$student_id)";
//    $result_set = mysqli_query($connection,$query);
//    echo $query;
    
    header("Location: create_group.php");
        exit();
    
}
?>
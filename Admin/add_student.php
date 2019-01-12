<?php
require_once("../includes/db.php");
ob_start();
if(isset($_POST['add_student'])){
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];
    $hashed_password = password_hash($student_password, PASSWORD_DEFAULT);
    $division_id = $_POST['division_id'];
    $branch_id = $_POST['branch_id'];
    
//    $query = "select division_id from division where division_name = '$division_name'";
//    $result= mysqli_query($connection,$query);
//    if(mysqli_num_rows($result)>0){
//        $row = mysqli_fetch_assoc($result);
//        $division_id = $row['division_id']; 
//    }
//    
    //echo $division_id.$student_name.$student_password.$student_email.$division_name;
    
    $query = "Insert into student(student_name,student_email,student_password,division_id,branch_id) values ('$student_name','$student_email','$hashed_password',$division_id,$branch_id)";
    $result = mysqli_query($connection,$query);
    
    echo $query;
    $query = "Insert into user values ('$student_email','$hashed_password',1)";
    $result = mysqli_query($connection,$query);
    
   header("Location: ../phpmailer/my_mail.php?mail=$student_email&password=$student_password");
    exit;
    
}
?>

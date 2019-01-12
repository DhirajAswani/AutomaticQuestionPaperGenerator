<?php
require_once("../includes/db.php");
if(isset($_POST['add_teacher'])){
    $teacher_name = $_POST['teacher_name'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_branch = $_POST['branch'];
    $hashed_password = password_hash($teacher_password, PASSWORD_DEFAULT);
    
    $query = "Insert into teacher(teacher_name,teacher_email,teacher_password,branch_id) values ('$teacher_name','$teacher_email','$hashed_password',$teacher_branch)";
    $result = mysqli_query($connection,$query);
    
    $query = "Insert into user values ('$teacher_email','$hashed_password',2)";
    $result = mysqli_query($connection,$query);
    
    header("Location: teacher_register.php");
    exit;
    
}
?>

<?php

session_start();
require_once("../includes/db.php");
global $connection;
$student_id=$_SESSION['student_id'];
echo $student_id;
$query ="select * from student where student_id = $student_id";
$result = mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$student_email = $row['student_email'];
//echo $db_password;
$first_password=$_POST['first_password'];
echo $first_password;

$second_password=$_POST['second_password'];
echo $second_password;

//
if ($first_password == $second_password){
    $student_password = $_POST['first_password'];
    $hashed_password = password_hash($student_password, PASSWORD_DEFAULT);
    
    $query="Update student set student_password ='$hashed_password' where student_id=$student_id";
    echo $query;
    $result=mysqli_query($connection,$query);
    echo "<br>";
    $query="Update user set user_password ='$hashed_password' where user_email='$student_email'";
    echo $query;
    $result=mysqli_query($connection,$query);
    
    header("Location: student_change_password.php?s=2 ");
    exit();
}
else{
    header("Location: student_confirm_password.php?q=1");
    exit();
}
?>
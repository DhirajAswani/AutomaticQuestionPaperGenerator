<?php

session_start();
require_once("../includes/db.php");
global $connection;
$student_id=$_SESSION['student_id'];
echo $student_id;
$query ="select * from student where student_id = $student_id";
$result = mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$db_password = $row['student_password'];
echo $db_password;
$input_password=$_POST['password'];
echo $input_password;

if (password_verify($input_password, $db_password)){
    header("Location: student_confirm_password.php");
    exit();
}
else{
    header("Location: student_change_password.php?q=1");
    exit();
}
?>
<?php

session_start();
require_once("../includes/db.php");
global $connection;
$teacher_id=$_SESSION['teacher_id'];
echo $teacher_id;
$query ="select * from teacher where teacher_id = $teacher_id";
$result = mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$db_password = $row['teacher_password'];
echo $db_password;
$input_password=$_POST['password'];
echo $input_password;

if (password_verify($input_password, $db_password)){
    header("Location: teacher_confirm_password.php");
    exit();
//    echo "done";
}
else{
//    echo "prblm";
    header("Location: teacher_change_password.php?q=1");
    exit();
}
?>
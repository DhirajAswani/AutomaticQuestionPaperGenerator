<?php
require_once("includes/db.php");
global $connection;
session_start();
if(isset($_POST['login'])){
    
        $user_email_input = $_POST['user_email'];
        $user_password_input = $_POST['user_password'];
        $query = "select * from user where user_email = '$user_email_input'";
        $result_set = mysqli_query($connection,$query);

    
    $result_set1 = mysqli_fetch_assoc($result_set);
    $user_email = $result_set1['user_email'];
    $user_password = $result_set1['user_password'];
    $user_type = $result_set1['user_type'];
    //$user_id = $result_set1['user_id'];
//    echo $user_email;
//    echo $user_password;
//    $password = password_verify($user_password_input, $user_password); 
//    echo $password;
    if($user_email_input == $user_email && password_verify($user_password_input, $user_password))
    {
    echo "loggedin";
    echo $user_type;
        if($user_type == 1){
            $query="select student_id from student where student_email = '$user_email_input'";
            $result=mysqli_query($connection,$query);
            if($row=mysqli_fetch_assoc($result))
            {
            $id = $row['student_id'];
            echo $id;
            }
              $_SESSION['student_id'] = $id;
              echo "<br>";
              $id =  $_SESSION['student_id'];
              echo $id;
              header("Location: Student/student_dashboard.php");
              exit();
        }
        else if($user_type == 2){
            $query="select teacher_id from teacher where teacher_email = '$user_email_input'";
            $result=mysqli_query($connection,$query);
            if($row=mysqli_fetch_assoc($result))
            {
            $id = $row['teacher_id'];
            echo $id;
            }
            $_SESSION['teacher_id'] = $id;
            echo "<br>";
            $id =  $_SESSION['teacher_id'];
            echo $id;
            header("Location: Teacher/teacher_dashboard.php?id=$id");
            exit();
        }
        else if($user_type == 3){
            header("Location: Admin/index.php");
            exit;
        }

    }
    
    
    
    
    
    
    else{
        $in="ivalid";
        header("Location: login.php?q=1");
        exit();
        echo "incorrect";
    }
    
}
?>
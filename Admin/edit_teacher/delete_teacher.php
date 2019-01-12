<?php
require_once("../../includes/db.php");
    global $connection;
    
    if(isset($_GET['delete']))
    {
    $teacher_id = $_GET['delete'];
    $teacher_email=$_GET['mail'];
    echo $teacher_id;
    echo $teacher_email;
     $query = "delete from teacher where teacher_id = $teacher_id";
        echo $query;
    $result = mysqli_query($connection,$query);
        
        
    $query = "delete from user where user_email = '$teacher_email'";
        $result=mysqli_query($connection,$query);
    echo "<br>$query";    
                                    header("Location: ../teacher_inft.php");
                                    exit();    
    }
?>

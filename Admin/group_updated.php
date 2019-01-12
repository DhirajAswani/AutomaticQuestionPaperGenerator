<?php

require_once("../includes/db.php");
session_start();
$group_id = $_SESSION['group_id'];
echo $group_id;
$deletegroup = $_SESSION['deletegroup'];
$addgroup=$_SESSION['add'];


if(isset($_GET['update']))
            {
                $student_id = $_GET['student_id'];
                $student_name = $_GET['student_name'];
                $student_email = $_GET['student_email'];
                echo "<h1>$student_id</h1>";
                echo "<h1>$student_name</h1>";
                echo $student_email;
                $query = "update student set student_name = '$student_name',student_email = '$student_email' where student_id = $student_id";
                echo"<br>";
                echo $query;
                $update_student = mysqli_query($connection , $query);
                if(!$update_student)
                {
                    die("query failed".mysqli_error($connection));
                  
                }
                  header("Location: group_students.php?click={$group_id}&deletegroup={$deletegroup}&add={$addgroup}");
//                
            }

//require_once("group_students.php");

?>

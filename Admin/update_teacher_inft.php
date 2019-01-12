<?php
require_once("../includes/db.php");

            if(isset($_GET['update']))
            {
                $teacher_id = $_GET['teacher_id'];
                $teacher_name = $_GET['teacher_name'];
                $teacher_email = $_GET['teacher_email'];
                echo "<h1>$teacher_id</h1>";
                echo "<h1>$teacher_name</h1>";
                echo $teacher_email;
                $query = "update teacher set teacher_name = '$teacher_name',teacher_email = '$teacher_email' where teacher_id = $teacher_id";
                echo $query;
                $update_teacher = mysqli_query($connection , $query);
                if(!$update_teacher)
                {
                    die("query failed".mysqli_error($connection));
                  
                }
                  header("Location: teacher_inft.php");
                
            }
                
            ?>
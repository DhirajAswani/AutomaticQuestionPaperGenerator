<?php require_once("../includes/db.php"); 

function display_group_students(){
    global $connection;
$group_id = intval($_GET['click']);
//echo "<h1>$group_id</h1>";


                $query = "select * from group_student where group_id = $group_id";
//                echo $query;
                $show_student_id = mysqli_query($connection , $query);
                while($row = mysqli_fetch_array($show_student_id)){
                            
                                $student_id = $row['student_id'];
                    echo"<br>";
//                                echo $student_id;
                    $query1  = "select * from student where student_id = $student_id";
                    $result = mysqli_query($connection , $query1);
                    $row1 = mysqli_fetch_array($result);
                    $student_name = $row1['student_name'];
                    $student_email = $row1['student_email'];
//                    echo"<br>";
//                    echo $student_name;
                    
                    echo"<tr>";
                                        echo"<td>{$student_name}</td>";
                                        echo"<td>{$student_email}</td>";
                                        echo"<td><a href = 'group_student_delete.php?delete={$student_id}'>Delete</a></td>";
                                        echo"<td><a href = 'group_student_update.php?edit={$student_id}'>Edit</a></td>";
                                    echo"</tr>";
                    
                    
       
                                 
                                 }
                
}

<?php

require_once("../includes/db.php");

session_start();
$paper_id = $_SESSION['paper_id'];
echo"Paper id $paper_id";
if(isset($_POST['edit']))
{   
    
    $question_id=$_POST['question_id'];
    $question_number = $_POST['question_number'];
    $question_number_sub = $_POST['question_number_sub'];
    $question_statement = $_POST['question_statement'];
    $marks = $_POST['marks'];
    
    echo $question_statement;
    echo $marks;
    echo $question_id;
    echo $question_number;
    echo $question_number_sub;
    
    
    
    $query = "update generated_paper set question_number = '$question_number',question_number_sub = '$question_number_sub',question_statement = '$question_statement',question_marks = $marks where question_id = $question_id";
    echo $query;
    $result = mysqli_query($connection , $query);
    
    header("Location: paper_to_pdf.php?id={$paper_id}");
}

?>
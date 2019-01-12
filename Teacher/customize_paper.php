<html>

<head></head>

<body>
    <div style="margin-left: 50px; margin-top: 50px;">
        <table class="table table-bordered table-hover table-respponnsive">
           <col width ="50">
       <col width = "300">
       <col width = "60">
            <tr class="info">
                <th></th>
                <th>Question</th>
                <th>Marks</th>
<?php
require_once("../includes/db.php");


//$total_main_questions=array("Q1","Q2","Q3","Q4","Q5","Q6");

$save_question_id=array();
$save_question_number=array();
$save_question_sub=array();
$save_question_marks=array();
$save_question_statement=array();
$subject_id=1;            
                
                
                
                
                
                
                
//echo"latika";
if(isset($_POST['generate'])){
    $no_of_questions = $_POST['no_of_questions'];
    $total_marks = $_POST['total_marks'];
     $subject_id = $_POST['first_level'];
    //echo"<h1>Subject ids</h1>";
    //echo"<br>";
     //print_r($subject_id);
     $subject_ids = implode(",",$subject_id);
    //echo $subject_ids;
    //echo"<br>";
    
    $module_id = $_POST['second_level'];
    //echo"<h1>Module ids</h1>";
    //echo"<br>";
     $module_ids = implode(",",$module_id);
    //echo $module_ids;
    //echo"<br>";
    $chapter_id = $_POST['third_level'];
    //echo"<h1>Chapter_id / Sub_topic_ids</h1>";
    //echo"<br>";
    $chapter_ids = implode(",",$chapter_id);
    //echo $chapter_ids;
}

$marks_to_each_ques = intval($total_marks/$no_of_questions);
$remaining_marks = $total_marks%$no_of_questions;

//echo $marks_to_each_ques;
//echo $remaining_marks;

    $count = 0;
    $total = 0;
    while($count != $no_of_questions){
       $val = rand(1,50);
        //echo $val;
        
        $query = "select * from question where question_id=$val and subject_id=$subject_ids and chapter_id in ($chapter_ids) and module_id in ($module_ids) and history != 1";
        $result = mysqli_query($connection, $query);
        $no_of_row = mysqli_num_rows($result);
        if($no_of_row == 1){
            $count = $count + 1;
            $row=mysqli_fetch_assoc($result);
            $question_statement = $row['question_statement'];
            $chapter_id = $row['chapter_id'];
            $module_id = $row['module_id'];
            $question_id = $row['question_id'];
            $total_main_questions = "Q".$count;
            $sub_ques ="";
            echo "<tr><td>".$total_main_questions."</td>";
            echo "<td>".$question_statement."</td>";
            echo "<td><div id = '$count'>".$marks_to_each_ques."</div></td> </tr>";
//            echo "<td><button class='edit fa fa-pencil btn blue' id='$question_id' data toggle='modal' data-target='#editModal'></button></td></tr>";
            $total = $total + $marks_to_each_ques; 
            
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
            
            
            array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$sub_ques);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,$marks_to_each_ques);
                
            
            
        }
    }
    
    //echo $total;
    if($total < $total_marks){
        $count = 0;
        while($count != $remaining_marks){
            $count += 1;
?>
<script>
    document.getElementById("<?php echo $count; ?>").innerHTML = "<?php echo $marks_to_each_ques + 1 ;?>";
</script>
<?php
            //echo $count."<br>";
            $total = $total + 1; 
            //echo $total ."<br>";
            
//            
//    print_r($save_question_id);
//    print_r($save_question_number);
//    echo "<br>";
//    print_r($save_question_sub);
//    print_r($save_question_marks);
//    print_r($save_question_statement);
            
            
    
        }
    }
//echo $count;
//echo $total;

?>
            </tr>
        </table>
    </div>
    <div style="margin-left: 350px;">
        <p><strong>Total = <?php echo $total; ?></strong></p>
    </div>
<?php
    $query = "Update question set history=0";
    $rested_history=mysqli_query($connection,$query);
    
    
    
    $_SESSION['question_id']=$save_question_id;
    $_SESSION['question_number']=$save_question_number;
    $_SESSION['question_sub']=$save_question_sub;
    $_SESSION['question_statement']=$save_question_marks;
    $_SESSION['question_marks']=$save_question_statement;
    $_SESSION['subject']=$subject_id;
    
//    print_r($_SESSION['question_id']);

?>
</body>

</html>

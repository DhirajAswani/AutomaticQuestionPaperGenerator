<html>
    <head>
        
    </head>
    <body>
<!--      style="margin-left:200px margin-top:50px"-->
       <div style="margin-left:300px; margin-top:50px">
    <table class="table table-bordered table-hover table-responsive">
<!--        <col width ="50">-->
        <col width ="30">
       <col width = "480">
<!--       <col width = "10">-->
        <tr>
        
        <th></th>
        <th >Question</th>
        <th>Marks</th>
<!--        <th>Edit</th>-->
        <?php
        require_once("../includes/db.php");
//        session_start();
        global $connection;
        
        $paper_id=$_GET['id'];
//        echo $paper_id;
        
        $query="select * from generated_paper where generated_paper_id = $paper_id";
        $result_set=mysqli_query($connection,$query);
        $num_rows = mysqli_num_rows($result_set);
        $count=0;
        $ques_num=array("Q1","Q2","Q3","Q4","Q5","Q6");
            $var=0;
//        echo "<tr><td>$ques_num[0]</td></tr>";    
        while($num_rows != $count){
            $row = mysqli_fetch_assoc($result_set);
            $main_questionNumber= $row['question_number'];
            $sub_question = $row['question_number_sub'];
            $question_statement = $row['question_statement'];
            $question_marks = $row['question_marks'];
            $question_id = $row['question_id'];
            
            if($sub_question == "a)" )
            { 
                
                echo "<tr><td><strong>$ques_num[$var]</strong></td><tr>";
                $var=$var+1;
            }
            else if($sub_question == '')
            {
                echo "<tr><td><strong>$main_questionNumber</strong></td></tr>";
                
            }
            
            echo "<tr><td>$sub_question</td>";
            echo "<td>$question_statement</td>"; 
            echo "<td>$question_marks</td>";
//            echo "<td><a href ='teacher_blank.php?edit=$question_id'>Edit</a></td></tr>";
            echo "<tr></tr>";
            $count=$count+1;
            
        }
        
        ?>
        </table>
    </div>

    </body>
</html>
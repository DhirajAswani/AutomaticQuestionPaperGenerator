<?php
session_start();
require_once("../includes/db.php");
$id=$_GET['q'];

            global $connection;
            global $student_id;
            $student_id = $_SESSION['student_id'];
//        echo $student_id;
        
        $query = " select s.generated_question_paper_id,s.share_id,g.group_name,t.teacher_name,gpt.generated_paper_name,sub.subject_name from share s,group_student gs,student st,group_name g,teacher t,generated_paper_by_teacher gpt,subject sub where gs.group_id=s.group_id and st.student_id=gs.student_id and g.group_id = s.group_id and t.teacher_id=s.teacher_id and  gpt.subject_id=sub.subject_id and s.generated_question_paper_id=gpt.generated_paper_id and st.student_id=$student_id and t.teacher_name like '$id%' ";
        
        $result_set = mysqli_query($connection,$query);
        
        $num=mysqli_num_rows($result_set);
        
//        echo $num;
        $count=0;
        
//        $query=;
        while($count != $num){
            $row=mysqli_fetch_assoc($result_set);
            $teacher_name = $row['teacher_name'];
//            echo $teacher_name;
            $subject = $row['subject_name'];
            $paper_name = $row['generated_paper_name'];
            $group_name = $row['group_name'];
            $paper_id=$row['generated_question_paper_id'];
            echo "<a class='button2' href='view_paper.php?id={$paper_id}' style='background: rgba(242,245,245);color: #202124; margin: 10px; padding-left:25px; width:100%; height:55px;text-align:left; border-radius:4px; border:solid 2px buttonface; line-height:2.5em; display:inline-block; border-style:outset'>$teacher_name<span style='padding-left:30%;'>$subject . $paper_name</span><span style='padding-left:25%;'>Shared with:$group_name </span></a>";
            $count = $count +1;
        }
            
?>
<?php
//echo "This is written in check.php";
//$subject_id = $_GET["question_id"];
require_once("../includes/db.php");
if(isset($_POST['next'])){
    $no_of_chapters = $_POST['no_of_chapters'];
    $subject_id = $_POST['subject_id'];
    //echo $no_of_chapters;
    for($i=1;$i<=$no_of_chapters;$i++){
        $chapter_id = $_POST['chapter_id_'.$i];
        $topic_name = $_POST['topic_name_'.$i];
        $pieces = explode("," , $topic_name);
        //echo $i;
        //echo "<br>";
        foreach ($pieces as $element){
            //echo $element."<br>";
            $query = "Select * from chapter where chapter_id = $chapter_id";
            $result = mysqli_query($connection,$query);
            $row= mysqli_fetch_assoc($result);
            $module_id = $row['module_id'];
            $subject_id = $row['subject_id'];
            //echo $element." ".$module_id." ".$subject_id."<br>";
            $query = "Insert into topic(topic_name,chapter_id,module_id,subject_id) values ('$element',$chapter_id,$module_id,$subject_id)";
        $result = mysqli_query($connection,$query);
        }
    }
    }
header("Location: teacher_dashboard.php");
exit();
?>


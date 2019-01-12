<?php

//fetch_third_level_category.php

include('db.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT * FROM chapter 
 WHERE module_id IN ('".$id."')
 "; 
 $statement = $connection->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["chapter_id"].'">'.$row["chapter_name"].'</option>';
 }
 echo $output;
}




?>
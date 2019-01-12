<?php

//fetch_second_level_category.php

include('db.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT * FROM module 
 WHERE subject_id IN ('".$id."')
 ";
 $statement = $connection->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["module_id"].'">'.$row["module_name"].'</option>';
 }
 echo $output;
}

?>
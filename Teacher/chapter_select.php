<?php
require_once("../includes/db.php");
global $connection;

$id=$_GET['q'];

echo "<option>$id</option>";

//$query="select * from module where subject_id=$id";
//$result_set=mysqli_query($connection,$query);
//                  $num=mysqli_num_rows($result_set);
//                  echo num;
//
//                  $count=0;
//                  while($count != $num){
//                      $row=mysqli_fetch_assoc($result_set);
//                      $name=$row['module_name'];
//                      $id = $row['module_id'];
//                      echo "<option value='$id'>$name</option>";
//                      $count = $count+1;
//                  }
//
//

?>
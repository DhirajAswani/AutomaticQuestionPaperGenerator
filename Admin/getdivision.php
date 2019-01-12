<?php

$connection =mysqli_connect("localhost","Dhiraj","Dhiraj@123","qpgen5");
if(!$connection)
{
    echo "prblm";
}

$id=$_GET['q'];

//echo "<option>$id</option>";

$query="select * from division where branch_id=$id";
$result_set=mysqli_query($connection,$query);
                  $num=mysqli_num_rows($result_set);
                  echo num;

                  $count=0;
                  while($count != $num){
                      $row=mysqli_fetch_assoc($result_set);
                      $name=$row['division_name'];
                      $id = $row['division_id'];
                      echo "<option value='$id'>$name</option>";
                      $count = $count+1;
                  }


?>
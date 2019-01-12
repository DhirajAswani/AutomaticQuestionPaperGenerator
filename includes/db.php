<?php

require_once("constants.php");

$connection  = mysqli_connect(SERVER, USER , PASSWORD , DB);
if(!$connection){
    die("We are connected".DB);
}

//if($connection)
//{
//    echo"<h1>Connected</h1>";
//}
//else
//{
//    echo"<h1>Not Connected</h1>";
//}

?>
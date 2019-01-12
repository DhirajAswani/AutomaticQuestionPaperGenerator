<html>
<body>
<?php
session_start();
require_once("../includes/db.php");
global $connection;
$student_id=$_SESSION['student_id'];
echo $student_id;
$query = "update student set notification_status = 0 where student_id = $student_id";
$result=mysqli_query($connection,$query);
header ("Location: ../login.php");
exit();
session_destroy();
?>

</body>

</html>
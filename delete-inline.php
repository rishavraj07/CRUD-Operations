<?php

$student_id=$_GET['id'];

include 'connection.php';

$sql="DELETE FROM student WHERE sid={$student_id}";
$result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");

//Redirecting to the given page location after successfully inserting the data.
header("Location: http://localhost/CRUD/index.php");

//Closing the connection.
mysqli_close($conn);

?>
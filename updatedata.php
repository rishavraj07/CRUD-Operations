<?php
    $id=$_POST['sid'];
    $name=$_POST['sname'];
    $address=$_POST['saddress'];
    $class=$_POST['sclass'];
    $phone=$_POST['sphone'];

    // making the connection to the DB
    $server="localhost";
    $username="root";
    $password="";
    $database="crud";

    $conn=mysqli_connect($server,$username,$password,$database) or die("Connection failed!ERROR");
    
    $sql="UPDATE student SET sid='{$id}',sname='{$name}',saddress='{$address}',sclass='{$class}',sphone='{$phone}' WHERE sid={$id}";
    //Running the query on the given connection.
    $result=mysqli_query($conn,$sql) or die("Failed to load the Query! ERROR");

    //Redirecting to the given page location after successfully inserting the data.
    header("Location: http://localhost/CRUD/index.php");

    //Closing the connection.
    mysqli_close($conn);

?>
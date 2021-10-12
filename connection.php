<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="crud";
    //Making the connection with the databasr MYSql.
    $conn=mysqli_connect($server,$username,$password,$database) or die("Connection failed.");
?>
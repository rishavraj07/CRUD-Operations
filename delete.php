<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD: Delete</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud (Delete)</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="index.php">Read</a>
                </li>
                <li>
                    <a href="add.php">Create</a>
                </li>
                <li>
                    <a href="update.php">Update</a>
                </li>
                <li>
                    <a href="delete.php">Delete</a>
                </li>
            </ul>
        </div>



<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
    <?php
    if(isset($_POST['deletebtn'])){
        include 'connection.php';
        $id=$_POST['sid'];
        $sql="DELETE FROM student WHERE sid={$id}";
        $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
        //Redirecting to the given page location after successfully inserting the data.
        header("Location: http://localhost/CRUD/index.php");

        //Closing the connection.
        mysqli_close($conn);
    }
    ?>

</div>
</div>
</body>
</html>

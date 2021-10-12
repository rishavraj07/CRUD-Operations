<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD: Add</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud (Create)</h1>
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
    <h2>Create New Record</h2>
    
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
    <?php 
        $server="localhost";
        $username="root";
        $password="";
        $database="crud";

        $conn=mysqli_connect($server,$username,$password,$database) or die("Connection failed!ERROR");
        $sql="SELECT * FROM studentclass";
        $result=mysqli_query($conn,$sql) or die("Failed to load the Query! ERROR");
    ?>
        <div class="form-group">
            <label>Course</label>
            <select name="class">
                <option value="" selected disabled>Select Course</option>
                <?php 
                    while($row=mysqli_fetch_assoc($result)){
                 ?>
                <option value="<?php echo $row['cid'] ?>"><?php echo $row['cname'] ?></option>
                <?php  }  ?>
            </select>
           
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>

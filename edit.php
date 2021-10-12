<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD:Edit</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud (Edit)</h1>
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
    <h2>Edit Record</h2>
    <form class="post-form" action="updatedata.php" method="post">
        <?php 
        // making the connection to the DB
        $server="localhost";
        $username="root";
        $password="";
        $database="crud";

        $conn=mysqli_connect($server,$username,$password,$database) or die("Connection failed!ERROR");
        $id=$_GET['id'];
        $sql="SELECT * FROM student WHERE sid={$id} ";
        //Running the query on the given connection.
        $result=mysqli_query($conn,$sql) or die("Failed to load the Query! ERROR");
        if(mysqli_num_rows($result)>0){
        ?>
      <div class="form-group">
        <?php 
            while($row=mysqli_fetch_assoc($result)){
        ?>
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>"/>
          <input type="text" name="sname" value="<?php echo $row['sname'] ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $row['saddress'] ?>"/>
      </div>
      <div class="form-group">
        <label>Class</label>
          <select name="sclass">
                <?php
                    $sql1="SELECT * FROM studentclass";
                    $result1=mysqli_query($conn,$sql1) or die("Failed to load the Query! ERROR");
                    if(mysqli_num_rows($result1)>0){
                        while($row1=mysqli_fetch_assoc($result1)){
                            if($row['sclass']==$row1['cid']){
                                $select='selected';

                            }else{
                                $select='';
                            }
                            echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
                        }
                    }
                ?>
          </select>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row['sphone'] ?>"/>
      </div>
      <?php } ?>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php } ?>
</div>
</div>
</body>
</html>

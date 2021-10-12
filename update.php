<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD: Update</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud (Update)</h1>
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
    <h2>Update Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
        if(isset($_POST['showbtn'])){
            $server="localhost";
            $username="root";
            $password="";
            $database="crud";
            $conn=mysqli_connect($server,$username,$password,$database) or die("Connection to Database Failed!");
            $id=$_POST['sid'];
            $sql="SELECT * FROM student WHERE sid={$id}";
            $result=mysqli_query($conn,$sql) or die("Query Failed!");
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){

    ?>

    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid'] ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress'] ?>" />
        </div>
        <div class="form-group">
        <label>Course</label>
        <select name="sclass">
            <!-- <option value="" selected disabled>Select Class</option> -->
            <?php
                $sql1="SELECT * FROM studentclass";
                $result1=mysqli_query($conn,$sql1) or die("Query Failed !!");
                if(mysqli_num_rows($result1)>0){
                    while($row1=mysqli_fetch_assoc($result1)){
                        if($row['sclass']==$row1['cid']){
                            $select="selected";
                        }else{
                            $select="";
                        }
                        echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
                    }
                }
            ?>
        </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone'] ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
        }
    }
}
    ?>
</div>
</div>
</body>
</html>

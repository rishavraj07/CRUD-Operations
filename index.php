<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD: Operations</title>

  <!-- Bootstrap css style cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud (Read)</h1>
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
    <h2>All Records</h2>
    <!-- PHP coding -->
    <?php
        $server="localhost";
        $username="root";
        $password="";
        $database="crud";
        //Making the connection with the databasr MYSql.
        $conn=mysqli_connect($server,$username,$password,$database) or die("Connection failed.");
        //giving the query for the desire work (for exmaple we are going to read form database so thats why SELECT * FROM table_name.....................................)
        $sql="SELECT * FROM student JOIN studentclass WHERE student.sclass=studentclass.cid";
        //Running the SQL query.
        $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
        // echo "<pre>";
        // print_r(mysqli_num_rows($result));
        // echo "</pre>";

        //mysqli_num_rows($result) this function is used to fing the no of rows in the database .
        if(mysqli_num_rows($result)>0){
    ?>
    <table  cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Course</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php 
                
                while($row=mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <td><?php echo $row['sid'] ?></td>
                <td><?php echo $row['sname'] ?></td>
                <td><?php echo $row['saddress'] ?></td>
                <td><?php echo $row['cname'] ?></td>
                <td><?php echo $row['sphone'] ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid'] ?>'><i class="bi bi-pen text-dark"></i></a>
                    <a href='delete-inline.php?id=<?php echo $row['sid'] ?>'><i class="bi bi-trash text-dark"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }else{
         echo "<h2> No record is there in the Database.</h2>";
         } 
         mysqli_close($conn); 
    ?>
    
</div>
<div id="header">
            <h1>Thank You.</h1>
        </div>
</div>

<!-- Bootstrap Javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

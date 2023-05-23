<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blank page</title>
    <style>
        .container {
           
            
            text-align: center;
        }
        h1{
            color: green;
        }
        .card{
            text-align: right;
            padding-top: 0%;
        }
        
    </style>
    
</head>
<body>
<div class="card">

 
 <a href="form.php"> <input type="submit" value="submit" name="submit" class="btn btn-danger" /></a>
</div class="container">
<div class="row">
    <div class="col-lg-12">
        <form action="blank.php" method="post">
            <input type="search" name="searchbox">
            <input type="submit" value="search" name="search">
        </form>
    </div>
</div>
<div>

</div>    
</body>
</html>
<?php
include './include/database.php';
if (isset($_POST['search'])) {
    $searchbox = $_POST['searchbox'];
    $sql = "SELECT * FROM `form_test` WHERE id='$searchbox'";
    $result = mysqli_query($connection, $sql); ?>
    <table border="1px" style="text-align:center;">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr><td>id</td><td>'.$row['id'].'</td></tr>
                <tr><td>first name</td> <td>'.$row['first_name'].'</td></tr>
                <tr><td>Last Name</td><td>'.$row['last_name'].'</td></tr>
                <tr><td>email</td> <td>'.$row['email'].'</td></tr>
            <tr><td>mobile number</td><td>'.$row['mob_no'].'</td></tr>
                <tr><td>gender</td> <td>'.$row['gender'].'</td></tr>
                <tr><td>status</td><td>'.$row['status'].'</td></tr>
                <tr><td><a href="edit.php">EDit</a></td><td><a href="delete.php">Delete</a></td></tr>
                
                
                ';
            }
        } ?>
        </table>

       <?php
}
?>
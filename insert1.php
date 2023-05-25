<?php

include './include/database.php';
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mob_no = $_POST['mobile'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $sql="INSERT INTO `form_test`(`first_name`, `last_name`, `email`, `mob_no`, `gender`, `status`) VALUES ('$first_name','$last_name','$email','$mob_no','$gender','$status')";
    if ($connection->query($sql) === true) {
        echo 'database submit successfully';
        header('location:blank.php');
    } else {
        echo'database submit failed';
    }
}
?>

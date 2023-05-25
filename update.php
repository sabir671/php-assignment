<?php
include('./include/database.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['email'];
    $mob_no = $_POST['mob_no'];
    $gender = $_POST['gender'];
    $status=$_POST['status'];
    
    // Update the row in the database
    $sql = "UPDATE form_test SET first_name = '$first_name', last_name = '$last_name',email='$email',mob_no='$mob_no',gender='$gender',status='$status' WHERE id = '$id'";
    if (mysqli_query($connection, $sql)) {
        echo "Record with ID $id updated successfully.";
        header('location:');
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

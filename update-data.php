<?php 
        include("./include/database.php");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $mob_no = $_POST['mob_no'];
            $gender = $_POST['gender'];
            $status = $_POST['status'];

            $sql = "UPDATE form_test SET first_name='$first_name', last_name='$last_name', email='$email', mob_no='$mob_no', gender='$gender', status='$status' WHERE id='$id'";
            if ($connection->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $connection->error;
            }
            }
            $connection->close();
?>


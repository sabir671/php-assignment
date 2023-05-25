<?php 
include('./include/database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM form_test WHERE id = '$id'";
    if (mysqli_query($connection, $sql)) {
        echo "Record with ID deleted successfully.";
        header('location:blank.php');
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
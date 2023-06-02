<?php
include('./include/database.php');
$id = $_POST['id'];
$query = "SELECT * FROM form_test WHERE id='$id'";
$exec = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($exec);
echo json_encode($row);


?>
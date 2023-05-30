<?php 
include('./include/database.php');
error_reporting(0);
$ID=$_POST['id'];
echo $ID;
 $first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$mob_no=$_POST['mob_no'];
$gender=$_POST['gender'];
$status=$_POST['status'];
// echo $gender,$status;
$sql=" UPDATE form_test SET first_name='$first_name', last_name='$last_name', email='$email', mob_no='$mob_no', gender='$gender', status='$status' WHERE id='$ID' ";


$result = mysqli_query($connection,$sql) or die('query failed');
header('location:blank.php');
mysqli_close($connection);
?>

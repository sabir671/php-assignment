<?php
include('./include/database.php');

$id=$_GET['id'];
    $sql ="SELECT*FROM form_test WHERE id=$id";
    $result=mysqli_query($connection,$sql);
   
    
   

if(mysqli_query($connection, $sql)) {
    while($row=mysqli_fetch_assoc($result)) {
?>

<div class="card" style="width:400;">
  
  <div class="card-body">
    <h1>REGISTER</h1>
    <form action="update.php" method="post">
     
    <input type="hidden" placeholder="First Name" style="border-radius: 100px;" name="id" value="<?php echo $row['id']; ?>"><br><br>
 <input type="text" placeholder="First Name" style="border-radius: 100px;" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>
 <input type="text" placeholder="Last Name" style="border-radius:100px;" name="last_name" value="<?php echo $row['last_name']; ?>"/><br><br>
 <input type="text" placeholder="Email" style="border-radius:100px;" name="email" value="<?php echo $row['email']; ?>"><br><br>
  <input type="number"  placeholder="Mobile Number" style="border-radius:100px;" name="mob_no" value="<?php echo $row['mob_no']; ?>"><br><br>
  <label>Male
  <input type="radio"  value="male" name="gender" value="<?php echo $row['gender']; ?>">
</label>
<label>Female
  <input type="radio"  value="female" name="gender" value="<?php echo $row['gender']; ?>">
</label><br><br>
<label for="" name="status">Status</label>
<select name="status" id="">
    <option value="0" name="status" <?php if ($row['status'] == 'active') echo 'selected'; ?>>active</option>
    <option value="1" name="status" <?php if ($row['status'] == 'active') echo 'selected'; ?>>inactive</option>
</select>
<br><br>
  <input type="submit" value="update" name="submit" class="btn btn-danger" style="border-radius: 100px;">
</form>

    
  </div>
</div>
<?php 
}
}
?>

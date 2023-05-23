<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        h1{
            color: goldenrod;
        }

        .card-body {
            text-align: center;
            width:360px;           
            
        }
        .card{
        
  display: inline-block;
  text-align: center;
  margin-left: 500px;
  margin-top: 70px; 

}



    </style>

</head>
<body>
   
<div class="card" style="width:400;">
  
  <div class="card-body">
    <h1>REGISTER</h1>
    <form action="insert1.php" method="post">
     
 
 <input type="text" placeholder="First Name" style="border-radius: 100px;" name="first_name"><br><br>
 <input type="text" placeholder="Last Name" style="border-radius:100px;" name="last_name"/><br><br>
  <input type="text" placeholder="Email" style="border-radius:100px;" name="email"><br><br>
  <input type="number"  placeholder="Mobile Number" style="border-radius:100px;" name="mobile"><br><br>
  <label>Male
  <input type="radio"  value="male" name="gender">
</label>
<label>Female
  <input type="radio"  value="female" name="gender">
</label><br><br>
<label for="" name="status">Status</label>
<select name="status" id="">
    <option value="0" name="status">active</option>
    <option value="1" name="status">inactive</option>
</select>
<br><br>
  <input type="submit" value="submit" name="submit" class="btn btn-danger" style="border-radius: 100px;">
</form>

    
  </div>
</div>
    
    
</body>
</html>
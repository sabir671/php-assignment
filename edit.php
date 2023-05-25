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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
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
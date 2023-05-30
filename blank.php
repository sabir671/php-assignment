<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
  <title>blank page</title>
  <style>
    .cont a {
      margin-left: 80%;

    }
  </style>

</head>

<body>


  <div class="container">
    <h1>Users List</h1>
    <div style="text-align:right;">
      <button class="btn btn-success" data-target="#myModal" data-toggle="modal">create</button>
      <div class="modal" id="myModal" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">


            <h1 style="text-align: left;">REGISTER</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <div class="card-body">

              <form action="insert1.php" method="post" style="text-align: center;" onclick="loadDoc()" id='myForm'>


                <input type="text" placeholder="First Name" style="border-radius: 100px;" name="first_name"><br><br>
                <input type="text" placeholder="Last Name" style="border-radius:100px;" name="last_name" /><br><br>
                <input type="text" placeholder="Email" style="border-radius:100px;" name="email"><br><br>
                <input type="number" placeholder="Mobile Number" style="border-radius:100px;" name="mobile"><br><br>
                <label>Male
                  <input type="radio" value="male" name="gender">
                </label>
                <label>Female
                  <input type="radio" value="female" name="gender">
                </label><br><br>
                <label for="" name="status">Status</label>
                <select name="status" id="">
                  <option value="0" name="status">active</option>
                  <option value="1" name="status">inactive</option>
                </select>
                <br><br>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                  <input type="submit" value="submit" name="submit" class="btn btn-danger" style="border-radius: 100px;" id="example">
                </div>
              </form>

            </div>



          </div>
        </div>

      </div>

    </div>
  </div>
  </div>


  <?php
  include './include/database.php';

  $sql = "SELECT * FROM form_test";
  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    echo "<table  border=1px style='border-collapse:collapse;' class='table'>
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Gender</th>
    <th>Status</th>
    <th>Action</th>
    </tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["first_name"] . " </td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mob_no"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["status"] . "</td><td><a  class='btn btn-danger' href='delete.php?first_name=" . $row["first_name"] . "'>Delete</a></td><td><a class='btn btn-info edit-btn' href='edit1.php?id=" . $row['id'] . "'>Edit</a></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $connection->close();


  ?>
  <script>
    $(document).ready(function() {
      $('#example').click(function() {
        var formData = $("#myForm").serialize();
        $.ajax({
          type: "POST",
          url: "insert1.php",
          data: formData,
          success: function(response) {
            console.log(response);
            $('#myModal').modal('hide');
          },
          error: function(error) {
            console.log(error);
          }
        });
      });
    });



    $(document).ready(function() {
      $('#sab').on(click, function() {
        let dataId = $(this).attr("data-id");
        alert("The data-id of clicked item is: " + dataId);


        $.ajax({
          type: "GET",
          url: "insert1.php",
          data: {
            id: dataId
          },
          success: function(response) {
            console.log(response);
            $('[name="first_name"]').val(response.first_name); // Update this line with the correct field name
            $('[name="last_name"]').val(response.last_name); // Update this line with the correct field name
            // Similarly, update the above lines for other form fields
          },
          error: function(error) {
            console.log(error);
          }
        });
      });
    });
  </script>


</body>

</html>






<!-- // <div class="card-body">
//     <h1>REGISTER</h1>
//     <form action="insert1.php" method="post">
     
 
//  <input type="text" placeholder="First Name" style="border-radius: 100px;" name="first_name"><br><br>
//  <input type="text" placeholder="Last Name" style="border-radius:100px;" name="last_name"/><br><br>
//   <input type="text" placeholder="Email" style="border-radius:100px;" name="email"><br><br>
//   <input type="number"  placeholder="Mobile Number" style="border-radius:100px;" name="mobile"><br><br>
//   <label>Male
//   <input type="radio"  value="male" name="gender">
// </label>
// <label>Female
//   <input type="radio"  value="female" name="gender">
// </label><br><br>
// <label for="" name="status">Status</label>
// <select name="status" id="">
//     <option value="0" name="status">active</option>
//     <option value="1" name="status">inactive</option>
// </select>
// <br><br>
//   <input type="submit" value="submit" name="submit" class="btn btn-danger" style="border-radius: 100px;">
// </form>

    
//   </div>
// </div>
    
//    -->
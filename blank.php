<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div   style="text-align:right;">
      <button class="btn btn-success" data-target="#myModal" data-toggle="modal">create</button>
      <div class="modal" id="myModal" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <h1 style="text-align: left;">REGISTER</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <form action="insert1.php" method="post" style="text-align: center;" id='myForm'>
              <input type="hidden" name="id" id="id">
              <input type="text" placeholder="First Name" style="border-radius: 100px;" name="first_name"><br><br>
              <input type="text" placeholder="Last Name" style="border-radius:100px;" name="last_name" /><br><br>
              <input type="text" placeholder="Email" style="border-radius:100px;" name="email"><br><br>
              <input type="number" placeholder="Mobile Number" style="border-radius:100px;" name="mob_no"><br><br>
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
                <button type="submit" class="btn btn-secondary btn-default pull-left" data-dismiss="modal"><span
                    class="glyphicon glyphicon-remove"></span> Cancel</button>

                <input type="submit" value="submit" name="submit" class="btn btn-danger" style="border-radius: 100px;"
                  id="example">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
  </div>


  <?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  
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
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["first_name"] . " </td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mob_no"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["status"] . "</td>
      <td><a  class='btn btn-danger' href='delete.php?id=" . $row["id"] . "' id='sweetalert'>Delete</a></td>
      <td><a class='btn btn-info edit-btn'  data-eid='{$row['id']}' data-target='#myModal' data-toggle='modal' >Edit</a></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $connection->close();


  ?>

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $('#example').click(function () {
        var formData = $("#myForm").serialize();
        $.ajax({
          type: "POST",
          url: "insert1.php",
          data: formData,
          success: function (response) {
            console.log(response);
            $('#myModal').modal('hide');
          },
          error: function (error) {
            console.log(error);
          }
        });
      });
    });
  </script>
  <script>
    $(document).on('click', '.edit-btn', function () {
      var record = $(this).attr("data-eid");
      $("#myModal").show();
      $.ajax({
        url: 'edit1.php',
        type: 'post',
        data: { id: record },
        success: function (data) {
          var userData = JSON.parse(data);
          $("input[name='id']").val(userData.id);
          $("input[name='first_name']").val(userData.first_name);
          $("input[name='last_name']").val(userData.last_name);
          $("input[name='email']").val(userData.email);
          $("input[name='mob_no']").val(userData.mob_no);
          if (userData.gender === 'male') {
            $('input:radio[name=gender][value="male"]').prop('checked', true);
          } else if (userData.gender === 'female') {
            $('input:radio[name=gender][value="female"]').prop('checked', true);
          }
        
          $('select[name=status]').val(userData.status);

          // $('input:radio[name=gender]:nth()').attr('checked',true);
          // $('input:radio[name=gender][value="female"]').prop('checked', true);
          // $('input:radio[name=gender][value="male"]').prop('checked', true);
          // $("select:option[name='status']:nth()").attr(checked,true);
        }
      })
    });
    $(document).on('submit', '#myForm,#updateForm', function () {
      var formData = $(this).serialize(); 
      $.ajax({
        url: 'update-data.php',
        type: 'POST',
        data: formData,
        success: function (response) {
          console.log(response);
          $('#myModal').modal('hide');
          location.reload();
        },
        error: function (error) {
          console.log(error);
        }
      });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Are you sure!",
            text: "Do you really want to remove user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Yaa! User successfully deleted!", {
                    icon: "success",
                });
            } else {
                swal("User not deleted your user is safe!", {
                    icon: "error",
                });
            }
        });
    });
</script>
</body>
</html>
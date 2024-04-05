<?php

 include('connection.php');
 error_reporting(0);

  $id = $_GET['id'];
  echo $id;
  
  $query = "SELECT * FROM fileupload WHERE id = $id";

  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $mobile       = $_POST['mobile'];
    $password     = $_POST['password'];
    $con_password = $_POST['confirm_password'];
    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $folder   = "image/".$filename;
    move_uploaded_file($tempname, $folder);


    // $sql = "INSERT INTO fileupload(name, email, contact, password,confirm_password,file) VALUES ('$name', '$email', '$mobile','$password','$con_password','$folder')";

     $sql = "UPDATE fileupload SET name = '".$name."', email = '".$email."', contact = '".$mobile."', password = '".$password."', confirm_password = '".$con_password."', file ='".$folder."'  where id = $id";    
    $insertData = mysqli_query($conn,$sql);
 
    if($insertData){
      echo "<script>alert('Data Updated Successfully..')</script>";
      echo "<meta http-equiv='refresh' content='0;URL=http://localhost/fileupload/listing.php'>";
    } else {
      echo "<script>alert('Data Not Updated Successfully..')</script>";
    }

}
  
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Validation</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form id="registerForm" enctype="multipart/form-data" method="POST" action="">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $result['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $result['confirm_password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            <img src="<?php echo $result['file'];?>" style="height: 20px; width: 20px;" alt="Italian Trulli">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#registerForm').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                digits: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: '#password'
            },
            file: {
                required: true
            }
        },
        messages: {
            name: 'Please enter your name',
            email: {
                required: 'Please enter your email address',
                email: 'Please enter a valid email address'
            },
            mobile: {
                required: 'Please enter your mobile number',
                digits: 'Please enter a valid mobile number'
            },
            password: {
                required: 'Please enter a password',
                minlength: 'Password must be at least 6 characters long'
            },
            confirm_password: {
                required: 'Please confirm your password',
                minlength: 'Password must be at least 6 characters long',
                equalTo: 'Passwords do not match'
            },
            file: 'Please select a file'
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>

</body>
</html>


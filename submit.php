<?php
    error_reporting(0);
    include("connection.php");
    
    include('function.php');


    
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


    $sql = "INSERT INTO fileupload(name, email, contact, password,confirm_password,file) VALUES ('$name', '$email', '$mobile','$password','$con_password','$folder')";
    $insertData = mysqli_query($conn,$sql);
 
    if($insertData){

      echo $name;
      echo $email;
      echo $mobile;
      echo $last_id = mysqli_insert_id($conn);
      
      echo 'to mail'.    $to   = $email;


          $subject =  "Welcome to join ABC technology";
          $msg     =  "Subject: Welcome to ABC technology - Employee Registration Confirmation
          <br>
          <br>
          Dear $name,
          <br>
                Congratulations! We're delighted to inform you that your registration with ABC technology 
            has been successfully processed. Welcome to our team!
          <br>
          Here are the details of your registration:
          <br>
          Employee ID: $last_id <br>
          Full Name: $name <br>
          Mobile Number: $mobile <br>
          We're thrilled to have you on board and look forward to supporting you in your life journey. As a registered Employee, you now have access to a wide range of resources, facilities, and support services designed to help you.

          If you have any questions or need assistance, please don't hesitate to reach out to our employee services team at HR. We're here to help you every step of the way.

          Once again, welcome to ABC technology. We wish you all the best and hope you have a rewarding and successful experience with us.
          <br><br>
          Best regards,
          <br><br>
          Surendra Kumar<br>
          ABC technology<br>
          Mob - 9670498949";

          smtp_mailer($to,$subject, $msg);
          
       echo "<script>alert('Data Submitted Successfully..')</script>";          
       echo "<meta http-equiv='refresh' content='0;URL=index.php'>";

    } else {
      echo "<script>alert('Data Not Submitted Successfully..')</script>";
    }

}
?>

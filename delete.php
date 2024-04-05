<?php
 include('connection.php');

 $id = $_GET['id'];
 
$query = "DELETE FROM fileupload WHERE id = $id";
$data  = mysqli_query($conn, $query);
if($data){
    echo "<script>alert('Data Delete Successfully!..');</script>";
    ?>
      <meta http-equiv = "refresh" content = "0; url =http://localhost/fileupload/listing.php" />       
    <?php
} else{
    echo "<script>alert('Data Not! Deleted..')</script>";
}
 


?>
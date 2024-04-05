<?php  

 include('connection.php');
 //include('tcpdf_6_2_13/tcpdf/tcpdf.php'); 
 error_reporting(0);



  $id = $_GET['id'];
  
  $query = "SELECT * FROM fileupload WHERE id = $id";

  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);

  //echo $result['file'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<h2 align="center">View Record</h2>
   <table align="center" width="50%">
	  <tr>
	  	<th>Name</th>
	    <td><?php echo $result['name']; ?></td>	   	    
	  </tr>
	  <tr>
	  	<th>Email</th>
	    <td><?php echo $result['email']; ?></td>	   	    
	  </tr>
	  <tr>
	  	<th>Contact</th>
	    <td><?php echo $result['contact']; ?></td>	   	    
	  </tr>
	  <tr>
	  	<th>Document</th>
	    <td><embed src='<?php echo $result['file']; ?>' type='application/pdf' width='100%' height='600px' /></td>	   	    
	  </tr>
	 
	</table>
</body>
</html>

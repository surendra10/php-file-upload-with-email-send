<?php
    include('connection.php');

    $query = "SELECT * FROM fileupload";
        
        $data = mysqli_query($conn, $query);   
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Record</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="heading"><h2><mark>Display Record</h2></mark></div>   
    <center><table class="table table-bordered" cellspacing="7">
        <thead>
           <th>ID</th>
           <th>Image</th>
           <th>Name</th>
           <th>Email</th>
           <th>Mobile</th>
           <th>Operations</th>
        </thead>
        <tbody>
            <?php 
                       
            while($result = mysqli_fetch_assoc($data))
            {
                             
            echo "<tr>
            <th>". $result['id'] ."</th>
            <th><img src='". $result['file'] ."' alt='Pdf' height='70px' width='70px'></th>
            <td>". $result['name']. "</td>
            <td>". $result['email']." </td>
            <td>". $result['contact']."</td>
            <td><a href='update_detail.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
            <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick=' return checkdelete()'></a>
            <a href='view.php?id=$result[id]'><input type='submit' value='View' class='update'></a></td>
            
            </tr>";            
            }
          ?>
        </tbody>
        </table>
    </center>
    </body>
</html>
<script>
    function checkdelete(){
        return confirm('Are you sure want to delete this data ?');
    }
</script>
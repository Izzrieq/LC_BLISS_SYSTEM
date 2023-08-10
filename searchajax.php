<?php 
  include("config/db_conn.php");
  
   $cname = $_POST['cname'];
  
   $sql = "SELECT * FROM complaintbliss WHERE cname LIKE '$cname%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr>
       <td>".$row['id']."</td>
       <td>".$row['date']."</td>
       <td>".$row['cname']."</td>
       <td>".$row['cnohp']."</td>
       <td>".$row['category']."</td>
       <td>".$row['type']."</td>    
   
       </tr>";
   }
    echo $data;
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP MySQL Ajax Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline">
  <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName"/>
        </div>
    </div> 
  </form>
</nav>
<?php
include('config/db_conn.php')
?>
<div class="container mt-4">
    <!-- <p><h2>Test function</h2></p>
    <h6 class="mt-5"><b>Search Name</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName"/>
        </div>
    </div>                    -->
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>No.HP</th>
            <th>Category</th>
            <th>Type</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT * FROM complaintbliss";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6>".$row['id']."</h6></td>";
                   echo"<td><h6>".$row['date']."</h6></td>";
                   echo"<td>".$row['cname']."</td>";
                   echo"<td>".$row['cnohp']."</td>";
                   echo"<td>".$row['category']."</td>";
                   echo"<td>".$row['type']."</td>";
                  echo"</tr>";   
                  
                }
            ?>
        </tbody>
    </table>
</div>
<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchajax.php',
       data:{cname:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
</body>
</html>
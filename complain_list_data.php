<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP MySQL Ajax Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
        <div class="left-nav">
            <img src="assets/images/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="right-nav">
            <h1>bliss customer service e-log</b></h1>
        </div>
    </header>
<?php
include('config/db_conn.php')
?>
<div class="container mt-4">
    
    <h6 class="mt-5"><b>Search Name</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName"/>
        </div>
    </div>                   
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>No.HP</th>
            <th>Category</th>
            <th>Type</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT * FROM complaintbliss";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                ?>
                <tr>
                    <td class="border-r"><?php echo $r['id']; ?></td>
                    <td class="border-r"><?php echo $r1['date']; ?></td>
                    <td class="border-r"><?php echo $r1['cname']; ?></td>
                    <td class="border-r"><?php echo $r1['cnohp']; ?></td>
                    <td class="border-r"><?php echo $r1['category']; ?></td>
                    <td class="border-r"><?php echo $r1['type']; ?></td>
                    <td>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='update.php?id=<?php echo $r['id'];?>'>UPDATE</a>
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 border border-red-700 rounded">
                            <a href='delete.php?id=<?php echo $r1['id'];?>'>DELETE</a>
                        </button>
                    </td>
                </tr>
             <?php     
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
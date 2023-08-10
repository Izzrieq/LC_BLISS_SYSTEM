<?php
include_once "config/db_conn.php";

$result = mysqli_query($conn, "SELECT * FROM datalc ORDER BY id DESC");
 
//  if (isset($_POST['Submit'])) {
//      $id = $_POST['id'];
  
//      // Insert data ke database
//      $add = mysqli_query($mysqli, "INSERT INTO datalc(id,waktu_kehadiran) VALUES('$ndp', NOW())");
//      if ($add) {
//          header("Refresh:0");
//      }

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLCP DATA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 </head>
 <body>
 <center class="underline font-bold text-xl pt-6">SENARAI PELAJAR </center>
 <div class="overflow-hidden">
     <div class="flex flex-col pt-6 pr-12 pl-12">
     <div class="overflow-x-auto sm:-mx-8 lg:-mx-8">
         <div class="py-2 inline-block min-w-full sm:px-8 lg:px-8">
         
             <table class="min-w-full border text-center">
             <thead>
                 <tr class="border-b bg-gray-700">
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     ID
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     STATE ID
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     BIZ TYPE
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     LITTLE CALIPH ID 
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     OPERATOR NAME
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     OWNER NAME
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     EDU EMAIL
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     KINDERGARTEN NUMBER
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     
                 </th>
                 </tr>
                <?php
                $result = mysqli_query($conn,"SELECT * FROM datalc"); 
                $bil = 1;
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr>
                    <td class="border-r"><?php echo $r['id']; ?></td>
                    <td class="border-r"><?php echo $r['stateid']; ?></td>
                    <td class="border-r"><?php echo $r['bizstype']; ?></td>
                    <td class="border-r"><?php echo $r['lcid']; ?></td>
                    <td class="border-r"><?php echo $r['operatorname']; ?></td>
                    <td class="border-r"><?php echo $r['ownername']; ?></td>
                    <td class="border-r"><?php echo $r['eduemail']; ?></td>
                    <td class="border-r"><?php echo $r['kindernohp']; ?></td>
                    <td>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='tlcp-info.php?id=<?php echo $r['id'];?>'>INFO</a>
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='update.php?id=<?php echo $r['id'];?>'>UPDATE</a>
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 border border-red-700 rounded">
                            <a href='delete.php?id=<?php echo $r['id'];?>'>Delete</a>
                        </button>
                    </td>
                </tr>
                <?php $bil = $bil + 1; 
                }
                ?>
             </thead>
             </table>       
         </div>
     </div>
     </div>
 </div> 
</body>
 </html>
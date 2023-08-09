<?php
include "config/db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <header>
        <div class="left-nav">
            <img src="assets/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="right-nav">
            <h1>bliss customer service e-log</b></h1>
        </div>
    </header>

    <table class="w-full text-sm text-center text-grey-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    DATE/TIME
                </th>
                <th scope="col" class="px-6 py-3">
                    CUSTOMER NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    DETAILS
                </th>
                <th scope="col" class="px-6 py-3">
                    LCID
                </th>
                <th scope="col" class="px-6 py-3">
                    OWNER
                </th> 
                <th scope="col" class="px-6 py-3">
                    LC OWNER NO.HP
                </th> 

                <!-- action -->
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
                <!-- add on post n fetch email -->
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
             <?php
                $id = $_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM complaintbliss WHERE id = '$id'"); 
                while ($r = mysqli_fetch_array($result))

                // $query = "SELECT * FROM complaintbliss  "
                // $statement = $conn -> prepare($query);
                // if($statement->rowCount()>0){
                //     $result =$statement->fetchAll();
                //     foreach($result as $row)
                //     {
                //         $output .= '
                //         <tr>
                //             <td>'.$row["details"].'</td>
                //         </tr>
                //         ';
                //     }
                // }
                // else{
                //     $output .= '
                //   <tr>
                //     <td>No Data Found</td>
                //   </tr> 
                //     ';
                // }
                {
                ?>  
                <tr>
                    <td class="border-r text-l"><?php echo $r['date']; ?></td>
                    <td class="border-r text-l"><?php echo $r['cname']; ?></td>
                    <td class="border-r text-l"><?php echo $r['details']; ?></td>
                    <td class="border-r text-l"><?php echo $r['lcid']; ?></td>
                    <td class="border-r text-l"><?php echo $r['lcowner']; ?></td>
                    <td class="border-r text-l"><?php echo $r['ownernohp']; ?></td>
                    <td>
                    <input class="checkbox" type="checkbox" name="checkbox" id="checkbox">
                    </td>
                </tr>
                <?php
                }
                ?>
    </table> 
</body>

</html>
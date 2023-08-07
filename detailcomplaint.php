<?php
include "component/db_conn.php";
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
                    NAME
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
                    STATUS
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
             <?php
                $result = mysqli_query($conn,"SELECT * FROM complaintbliss LIMIT 0, 10"); 
                $bil = 1;
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr>
                    <td class="border-r text-l"><?php echo $r['date']; ?></td>
                    <td class="border-r text-l"><?php echo $r['name']; ?></td>
                    <td class="border-r text-l"><?php echo $r['details']; ?></td>
                    <td class="border-r text-l"><?php echo $r['lcid']; ?></td>
                    <td class="border-r text-l"><?php echo $r['lcowner']; ?></td>
                    <td>
                        
                    </td>
                </tr>
                <?php $bil = $bil + 1; 
                }
                ?>
    </table> 
</body>

</html>
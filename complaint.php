<?php
include "config/db_conn.php";

$result = mysqli_query($conn, "SELECT * FROM complaintbliss ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles/style.css">

</head>
<body>
<header class="d-flex justify-content-between ">
        <div class="w-25 p-0 h-75 d-inline-block">
            <img  class="w-100 m-0 h-100 d-inline-block" src="assets/images/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="p-0 ">
            <h1 class="mt-3 m-3 h1 text-white">BLISS CUSTOMER E-LOG</h1>
        </div>
    </header>

    <h1 class="font-bold h1 pt-6 text-center text-white mb-3">REPORT LIST</h1>
    <div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-center text-grey-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-white dark:bg-gray-700 dark:text-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    DATE/TIME
                </th>
                <th scope="col" class="px-6 py-3">
                    CUSTOMER NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    CUSTOMER NO.HP
                </th>
                <th scope="col" class="px-6 py-3">
                    CATEGORY
                </th>
                <th scope="col" class="px-6 py-3">
                    TYPE
                </th> 
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
            </tr>
        </thead>
        <tbody class="bg-white text-black">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
             <?php
                $result = mysqli_query($conn,"SELECT * FROM complaintbliss LIMIT 0, 10"); 
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr>
                    <td class="border-r text-l"><?php echo $r['id']; ?></td>
                    <td class="border-r text-l"><?php echo $r['date']; ?></td>
                    <td class="border-r text-l"><?php echo $r['cname']; ?></td>
                    <td class="border-r text-l"><?php echo $r['cnohp']; ?></td>
                    <td class="border-r text-l"><?php echo $r['category']; ?></td>
                    <td class="border-r text-xl"><?php echo $r['type']; ?></td>
                    <td class="d-flex justify-content-center">
                        <a href='update.php?id=<?php echo $r['id'];?>'><img src="assets/images/update.png" alt=""></a>
                        <a href='delete.php?id=<?php echo $r['id'];?>'><img src="assets/images/delete.png"></a>
                        <a href='detailcomplaint.php?id=<?php echo $r['id'];?>'><img src="assets/images/more.png"></a>
                        <!-- <input class="checkbox" type="checkbox" name="checkbox" id="checkbox"> -->
                    </td>
                </tr>
                <?php
                }
                ?>
    </table>  
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 border border-blue-700 rounded">
        <a href="issue.php">ADD ISSUE</a>
    </button>        
    <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
        <ul class="inline-flex -space-x-px text-sm h-8">
            <li>
                <a href="" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
            </li>
        </ul>
    </nav>
</div>
               
         </div>
     </div>
     </div>
 </div>
</body>
</html>

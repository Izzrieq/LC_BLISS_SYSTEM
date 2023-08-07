<?php
include "component/db_conn.php";

$result = mysqli_query($conn, "SELECT * FROM complaintbliss ORDER BY name DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <link rel="stylesheet" href="styles/style.css">

</head>
<body>
    <center class="underline font-bold text-xl pt-6">SENARAI ADUAN</center>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <!-- <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"> -->
            <tr>
                <th scope="col" class="px-6 py-3">
                    NO.
                </th>
                <th scope="col" class="px-6 py-3">
                    DATE/TIME
                </th>
                <th scope="col" class="px-6 py-3">
                    NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    NO.HP
                </th>
                <th scope="col" class="px-6 py-3">
                    CATEGORY
                </th>
                <th scope="col" class="px-6 py-3">
                    TYPE
                </th> 
                <th scope="col" class="px-6 py-3">
                    DETAILS
                </th>
                <th scope="col" class="px-6 py-3">
                    LC ID
                </th>
                <th scope="col" class="px-6 py-3">
                    LC OWNER
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
                    <td class="border-r"><?php echo $bil; ?></td>
                    <td class="border-r"><?php echo $r['date']; ?></td>
                    <td class="border-r"><?php echo $r['name']; ?></td>
                    <td class="border-r"><?php echo $r['nohp']; ?></td>
                    <td class="border-r"><?php echo $r['category']; ?></td>
                    <td class="border-r"><?php echo $r['type']; ?></td>
                    <td class="border-r"><?php echo $r['details']; ?></td>
                    <td class="border-r"><?php echo $r['lcid']; ?></td>
                    <td class="border-r"><?php echo $r['lcowner']; ?></td>
                    <td>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 border border-red-700 rounded">
                            <a href='delete.php?name=<?php echo $r['name'];?>'>DELETE</a>
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='update.php?name=<?php echo $r['name'];?>'>UPDATE</a>
                        </button>
                    </td>
                    <td><input type="checkbox" class="appearance-none checked:bg-blue-500" /></td>
                </tr>
                <?php $bil = $bil + 1; 
                }
                ?>
    </table>           
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
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
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

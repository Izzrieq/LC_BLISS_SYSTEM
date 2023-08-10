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
<nav class="bg-white dark:bg-white">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
  <div class="flex md:order-2">
    <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
      </svg>
    </button>
  </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
      <div class="relative mt-3 md:hidden">
        <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
      </div>
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border md:flex-row md:space-x-8 md:mt-0 md:border-0">
        <li>
        <a href="home.php"><i class="material-icons block py-2 pl-2 pr-2 text-black text-xl">home</i></a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-2 pr-2 text-black">DATA</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-2 pr-2 text-black">COMPLAINT</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-2 pr-2 text-black">INFO</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <center class="underline font-bold text-xl pt-6">REPORT LIST</center>
    <div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-center text-grey-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-black">
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
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
             <?php
                $result = mysqli_query($conn,"SELECT * FROM complaintbliss LIMIT 0, 10"); 
                $bil = 1;
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr>
                    <td class="border-r text-l"><?php echo $r['id']; ?></td>
                    <td class="border-r text-l"><?php echo $r['date']; ?></td>
                    <td class="border-r text-l"><?php echo $r['cname']; ?></td>
                    <td class="border-r text-l"><?php echo $r['cnohp']; ?></td>
                    <td class="border-r text-l"><?php echo $r['category']; ?></td>
                    <td class="border-r text-xl"><?php echo $r['type']; ?></td>
                    <td class="icon-status">
                        <a href='update.php?id=<?php echo $r['id'];?>'><img src="assets/update.png" alt=""></a>
                        <a href='delete.php?id=<?php echo $r['id'];?>'><img src="assets/delete.png"></a>
                        <a href='detailcomplaint.php?id=<?php echo $r['id'];?>'><img src="assets/more.png"></a>
                        <input class="checkbox" type="checkbox" name="checkbox" id="checkbox">
                    </td>
                </tr>
                <?php $bil = $bil + 1; 
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

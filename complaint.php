<center class="underline font-bold text-xl pt-6">SENARAI PELAJAR </center>
 <div class="overflow-hidden">
     <div class="flex flex-col pt-6 pr-12 pl-12">
     <div class="overflow-x-auto sm:-mx-8 lg:-mx-8">
         <div class="py-2 inline-block min-w-full sm:px-8 lg:px-8">
         
             <table class="min-w-full border text-center">
             <thead>
                 <tr class="border-b bg-gray-700">
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     Bil.
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     Nama
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     NDP
                 </th>
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     Tindakan
                 </th>
                 </tr>
                <?php
                $result = mysqli_query($mysqli,"SELECT * FROM student"); 
                $bil = 1;
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr>
                    <td class="border-r"><?php echo $bil; ?></td>
                    <td class="border-r"><?php echo $r['nama']; ?></td>
                    <td class="border-r"><?php echo $r['ndp']; ?></td>
                    <td>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='info.php?ndp=<?php echo $r['ndp'];?>'>INFO</a>
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 border border-gray-700 rounded">
                            <a href='update.php?ndp=<?php echo $r['ndp'];?>'>UPDATE</a>
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 border border-red-700 rounded">
                            <a href='delete.php?ndp=<?php echo $r['ndp'];?>'>Delete</a>
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
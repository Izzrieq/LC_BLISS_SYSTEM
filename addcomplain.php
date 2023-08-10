<?php
    include("config/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
    
<script>
    //jquery search2
     $(document).ready(function () {
        $("#lcid").select2();
    });

    // JavaScript to handle cascading dropdowns
document.getElementById("lcid").addEventListener("change", function() {
    var lcid = this.value;
    
    // Clear previous options in ownername dropdown
    document.getElementById("ownername").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    // Clear previous options in operatornohp dropdown
    document.getElementById("operatornohp").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    if (lcid !== "") {
        // Make an AJAX request to fetch owner names based on selected lcid
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_owner_names.php?lcid=" + lcid, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("ownername").innerHTML += xhr.responseText;
            }
        };
        xhr.send();
    }
});

document.getElementById("ownername").addEventListener("change", function() {
    var ownername = this.value;
    
    // Clear previous options in operatornohp dropdown
    document.getElementById("operatornohp").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    if (ownername !== "") {
        // Make an AJAX request to fetch operator numbers based on selected ownername
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_operator_numbers.php?ownername=" + ownername, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("operatornohp").innerHTML += xhr.responseText;
            }
        };
        xhr.send();
    }
});
</script>
<body>
    <header class="d-flex justify-content-between bg-white ">
        <div class="w-25 p-0 h-75 d-inline-block">
            <img  class="w-100 m-0 h-100 d-inline-block" src="assets/images/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="p-0 ">
            <h1 class="mt-3 m-3 h1 text-primary">BLISS CUSTOMER E-LOG</h1>
        </div>
    </header>
    <ul class="nav bg-white px-5">
  <li class="nav-item">
    <a class="nav-link active text-black" href="home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-black" href="home.php">Return</a>
  </li>
</ul>
<section class=" py-1 bg-blueGray-50">
<div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-center flex justify-between">
        <h6 class="text-blueGray-700 text-xl font-bold">
          ISSUE COMPLAIN
        </h6>
      </div>
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <form>
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
          Customer Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Customer Name
              </label>
              <input type="text" required class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Customer NO.HP
              </label>
              <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="011-222-3456" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Category
              </label>
              <select name="category" id="category" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                <option value="#" disabled selected>Select: </option>
                <option value="complaint">Complaint</option>
                <option value="suggestion">Suggestion</option>
                <option value="general">General</option>
                <option value="enquiry">Enquiry</option>
            </select>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Type
              </label>
              <select name="type" id="type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"      >
                <option value="#" disabled selected>Select:</option>
                <option value="management">Management</option>
                <option value="sales">Sales</option>
                <option value="registration">Registration</option>
                <option value="payment">Payment</option>
                <option value="kindy">kindy</option>
            </select>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Details
              </label>
              <textarea type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4"></textarea>
            </div>
          </div>
        </div>

        <hr class="mt-6 border-b-1 border-blueGray-300">

        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
          LC Details
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                LC ID
              </label>
              <!-- <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"> -->
              <select name="lcid" id="lcid"class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
                <option disabled selected value> -- select an option -- </option>  
                <?php
                    $sql = "SELECT DISTINCT lcid FROM lcdetails";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row['lcid']."'>".$row['lcid']."</option>";
                    }
                    ?>
                </select>
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Owner Name
              </label>
                 <select name="ownername" id="ownername" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
                    <option disabled selected value> -- select an option -- </option>  
                </select>
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Owner No Hp
              </label>
              <select name="operatornohp" id="operatornohp" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                <option disabled selected value> -- select an option -- </option>  
                </select>
            </div>
          </div>
        <hr class="mt-6 border-b-1 border-blueGray-300">
        <button class="bg-pink-500 w-full h-10 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">
          SUBMIT
        </button>
      </form>
    </div>
  </div>
</div>
</section>
   
    <footer class="fixed-bottom bg-dark text-white p-2 align-middle text-center">
            <p>© 2023 Niko & Nassy</p>
    </footer>
    

</body>
</html>
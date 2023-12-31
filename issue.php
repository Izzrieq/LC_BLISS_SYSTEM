<?php
include('config/db_conn.php'); 
date_default_timezone_set("Asia/Kuala_Lumpur");
if(isset($_POST['cname'])) {    
    $id = (isset($_POST['id']) ? $_POST['id'] : '');
    $date = date("Y-m-d H:i:s");  
    $cname = $_POST['cname'];
    $cnohp = $_POST['cnohp'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $details = $_POST['details'];
    $lcid = $_POST['lcid'];
	$lcowner = $_POST['lcowner'];
    $ownernohp = $_POST['ownernohp'];
    $sql = "INSERT INTO complaintbliss (id, date, cname, cnohp, category, type, details, lcid, lcowner, ownernohp)
    VALUES ('$id', '$date', '$cname', '$cnohp', '$category', '$type', '$details', '$lcid', '$lcowner', '$ownernohp')";
    $result = mysqli_query($conn, $sql); 
    if ($result)
        echo "<script>alert('Berjaya kemaskini')</script>";
    else 
        echo "<script>alert('Tidak berjaya kemaskini')</script>";
    echo "<script>window.location='complaint.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

</head>
<script>
    $(document).ready(function () {
        $("select").select2();
    });


    //     document.addEventListener('DOMContentLoaded', function() {
    //     // Your code here

    //     const lcid = document.getElementById('lcid');
    //     const lcownerf = document.getElementById('lcowner');
    //     const ownernohpf = document.getElementById('ownernohp');
    //     // Add references to other input fields as needed

    //     lcid.addEventListener('change', function() {
    //         const selectedValue = lcid.value;
    //         if (selectedValue !== '') {
    //             // Make an AJAX request to fetch data based on the selected option
    //             fetch('component/ajax.php?lcid=' + selectedValue)
    //                 .then(response => response.json())
    //                 .then(data => {
    //                     // Autofill input fields with data received from the server
    //                     lcownerf.value = data.lcowner;
    //                     ownernohpf.value = data.ownernohp;
    //                     // Update other input fields as needed
    //                 });
    //         } else {
    //             // Clear input fields if no option is selected
    //             lcownerf.value = '';
    //             ownernohpf.value = '';
    //             // Clear other input fields as needed
    //         }
    //     });
    //   }); 
</script>

<body>
    <header>
        <div class="left-nav">
            <img src="assets/images/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="right-nav">
            <h1>bliss customer service e-log</b></h1>
        </div>
    </header>
    <form id="issueform" class="issue" action="issue.php" method="POST">
        <div class="customer_complain">
            <h1>Customer Complain</h1> <br>
            <label for="cname">Name:</label>
            <input type="text" id="cname" name="cname">
            <label for="cnohp">Customer No.HP:</label>
            <input type="tel" id="cnohp" name="cnohp" placeholder="011-222-3456" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                required><br><br>
            <label id="category" for="category">Category:</label>
            <select name="category" id="category">
                <option value="#" disabled selected>Select: </option>
                <option value="complaint">Complaint</option>
                <option value="suggestion">Suggestion</option>
                <option value="general">General</option>
                <option value="enquiry">Enquiry</option>
            </select>
            <label id="type" for="type">Type:</label>
            <select name="type" id="type">
                <option value="#" disabled selected>Select:</option>
                <option value="management">Management</option>
                <option value="sales">Sales</option>
                <option value="registration">Registration</option>
                <option value="payment">Payment</option>
                <option value="kindy">kindy</option>
            </select> <br> <br>
            <label for="details">Details Complaint:</label>
            <textarea id="details" name="details" rows="3" cols="40">
            </textarea> <br> <br>
            <button type="button" class="btn btn-outline-warning"><a href="complaint.php">Return</a></button>
        </div>

        <div class="detail_lc">
            <h1>Detail LC Complain</h1> <br>

            <?php
                $query = "SELECT * FROM lcdetails";

                $result1 = mysqli_query($conn, $query);
                
            ?>
            <label for="lcid">LC ID:</label><br>
            <select name="lcid" id="lcid">
                <option disabled selected>Select: </option>
                <option value="-">-</option>
                <?php
                while($row1 = mysqli_fetch_array($result1)):;
                ?>
                <option><?php echo $row1[3]; ?></option>
                <?php endwhile; ?>
            </select> <br>
            <br> <br>
            <label for="lcowner">LC Owner Name:</label> <br>
            <input type="text" id="lcowner" name="lcowner" required><br><br>
            <label id="ownernohp" for="ownernohp">LC Owner No.Hp:</label><br>
            <input type="tel" id="ownernohp" name="ownernohp" placeholder="011-222-3456"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br> <br>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            <button type="reset" class="btn btn-outline-danger">Reset</button>
        </div>
    </form>
    <footer>
        <center>
            <p>© 2023 Little Caliph International</p>
        </center>
    </footer>
</body>

</html>
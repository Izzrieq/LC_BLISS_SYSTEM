<?php
include('component/db_conn.php'); 
if(isset($_POST['name'])) {    
    $id = $_POST['id'];
    $date = date("Y-m-d H:i:s");     
    $name = $_POST['name'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $nohp = $_POST['nohp'];
    $details = $_POST['details'];
    $lcid = $_POST['lcid'];
	$lcowner = $_POST['lcowner'];
    $sql = "INSERT INTO complaintbliss (id, date, name, category, type, nohp, details, lcid, lcowner)
    VALUES ('$id', '$date', '$name', '$category', '$type', '$nohp', '$details', '$lcid', '$lcowner')";
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
    <form class="issue" action="issue.php" method="POST">
        <fieldset>
            <legend>New Issue</legend>
            <!-- make id auto increment -->
             <label for="id">ID:</label> <br>
            <input type="text" id="id" name="id"><br><br>
            <label for="name">Name:</label> <br>
            <input type="text" id="name" name="name"><br><br>
            <label id="category" for="category">Category:</label> <br>
            <select name="category" id="category">
                <option value="#" disabled selected>Select: </option>
                <option value="complaint">Complaint</option>
                <option value="suggestion">Suggestion</option>
                <option value="general">General</option>
                <option value="enquiry">Enquiry</option>
            </select> <br> <br>
            <label id="category" for="type">Type:</label> <br>
            <select name="type" id="type">
                <option value="#" disabled selected>Select:</option>
                <option value="management">Management</option>
                <option value="sales">Sales</option>
                <option value="registration">Registration</option>
                <option value="payment">Payment</option>
                <option value="kindy">kindy</option>
            </select> <br> <br>
            <label for="details">Details Complaint:</label> <br>
            <textarea id="details" name="details" rows="3" cols="40">
  </textarea> <br> <br>
  <!-- drop up -->
            <label for="lcid">LC ID:</label>
            <input type="text" id="lcid" name="lcid"> <br> <br>
            <!-- fetch num phone -->
            <label for="nohp">NO. HP:</label>
            <input type="text" id="nohp" name="nohp"><br><br>
            <!-- fetch num owner -->
            <label for="lcowner">LC OWNER:</label><br>
            <input type="text" id="lcowner" name="lcowner"><br><br>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            <button type="reset" class="btn btn-outline-danger">Reset</button>
        </fieldset>
    </form>

    <footer>
        <center>
            <p>© 2023 Little Caliph International</p>
        </center>
    </footer>
</body>

</html>
<?php
    include ("config/db_conn.php");
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <!-- Include your CSS styles here -->
</head>
<body>
    <?php
    // Check if the ID parameter is provided in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch data based on the provided ID
        $sql = "SELECT * FROM complaintbliss WHERE id = $id";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update-process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="date">Date:</label>
                <input type="text" name="date" value="<?php echo $row['date']; ?>"><br>
                <label for="name">Name:</label>
                <input type="text" name="cname" value="<?php echo $row['cname']; ?>"><br>
                <label for="nohp">No HP:</label>
                <input type="text" name="cnohp" value="<?php echo $row['cnohp']; ?>"><br>
                <label for="category">Category:</label>
                <input type="text" name="category" value="<?php echo $row['category']; ?>"><br>
                <label for="type">Type:</label>
                <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
                <button type="submit">Update</button>
                <button><a href="test_delete.php">DELETE</a></button>
            </form>
    <?php
        } else {
            echo "No data found for the provided ID.";
        }

        // Close the connection
        $conn->close();
    } else {
        echo "No ID provided.";
    }
    ?>
    <!-- Include your JavaScript scripts here -->
</body>
</html>
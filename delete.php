<?php
include "component/db_conn.php";
$name = $_GET['name'];
$sql = "DELETE FROM complaintbliss WHERE name='$name'";
$result = mysqli_query($conn, $sql);
     echo "<script>window.location='complaint.php'</script>";

?>
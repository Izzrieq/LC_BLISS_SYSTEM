<?php
include('config/db_conn.php');

if (isset($_GET['lcid'])) {
    $lcid = $_GET['lcid'];
    
    $sql = "SELECT DISTINCT ownername FROM lcdetails WHERE lcid = '$lcid'";
    $result = mysqli_query($conn, $sql);
    
    $options = "";
    while ($row = mysqli_fetch_array($result)) {
        $options .= "<option value='".$row['ownername']."'>".$row['ownername']."</option>";
    }
    
    echo $options;
}
?>

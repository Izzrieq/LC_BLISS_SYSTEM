<?php
include('config/db_conn.php');
include('function.php');
if(isset($_POST["member_id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM complaintbliss WHERE id = '".$_POST["member_id"]."' LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["id"] = $row["id"];
        $output["date"] = $row["date"];
        $output["cname"] = $row["cname"];
        $output["cnohp"] = $row["cnohp"];
        $output["category"] = $row["category"];
        $output["type"] = $row["type"];
    }
    echo json_encode($output);
}
?>
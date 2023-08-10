<?php
include('config/db_conn.php');
include('function.php');
 
if(isset($_POST["member_id"]))
{
    $statement = $connection->prepare(
        "DELETE FROM complaintbliss WHERE id = :id"
    );
    $result = $statement->execute(
 
        array(':id' =>   $_POST["member_id"])
         
        );
}
?>
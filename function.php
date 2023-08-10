
<?php
function get_total_all_records()
{
    include('config/db_conn.php');
    $statement = $connection->prepare("SELECT * FROM complaintbliss");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}
?>
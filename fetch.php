<?php
include('config/db_conn.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM complaintbliss ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE cname LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR cnohp LIKE "%'.$_POST["search"]["value"].'%" ';
} 
 
if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id ASC ';
}
 
if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
} 
$statement = $conn->prepare($query);
$statement->execute();

$resultSet = $statement->get_result();
$result = $statement->fetchAll(MYSQLI_ASSOC);
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $sub_array = array();
     
    $sub_array[] = $row["id"];
    $sub_array[] = $row["date"];
    $sub_array[] = $row["cname"];
    $sub_array[] = $row["cnohp"];
    $sub_array[] = $row["category"];
    $sub_array[] = $row["type"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-pencil"> </i>Edit</button></button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"              =>   intval($_POST["draw"]),
    "recordsTotal"      =>   $filtered_rows,
    "recordsFiltered"   =>   get_total_all_records(),
    "data"              =>   $data
);
echo json_encode($output);
?>
<?php

$response = array('success' => false, 'message' => 'Unknown error');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blissdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response['message'] = 'Connection failed: ' . $conn->connect_error;
    } else {
        // Perform the delete query
        $sql = "DELETE FROM complaintbliss WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $response['success'] = true;
            $response['message'] = 'Record deleted successfully';
        } else {
            $response['message'] = 'Error deleting record: ' . $conn->error;
            // Debugging: Add the following line to see the exact SQL query being executed
            // $response['debug'] = 'Query: ' . $sql;
        }

        // Close the connection
        $conn->close();
    }
} else {
    $response['message'] = 'No ID provided';
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);

?>

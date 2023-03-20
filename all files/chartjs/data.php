<?php
include("../verification/connection.php");
mysqli_select_db($sql,'project');

// Query the database to get the data
$s = "SELECT COUNT(*) as num_events, eventDate FROM requestletter_info GROUP BY eventDate";
$result = mysqli_query($sql, $s);
$data = array();
$data1 = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row["num_events"];
    $data1[] = $row["eventDate"];
}

// Close the connection
mysqli_close($sql);

// Store both arrays in a single associative array
$output = array(
    "data" => $data,
    "data1" => $data1
);

// Return the data as a single JSON-encoded object
echo json_encode($output);
?>

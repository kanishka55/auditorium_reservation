<?php
include("../verification/connection.php");
mysqli_select_db($sql,'project');

$s = "SELECT DATE_FORMAT(paymentDate, '%Y-%m') as month, SUM(total_amount) as total_income
FROM full_payment
GROUP BY DATE_FORMAT(paymentDate, '%Y-%m')";
$result = mysqli_query($sql, $s);
$data = array();
$data1 = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row["month"];
    $data1[] = $row["total_amount"];
}
mysqli_close($sql);

// Store both arrays in a single associative array
$output = array(
    "data" => $data,
    "data1" => $data1
);

// Return the data as a single JSON-encoded object
echo json_encode($output);
?>
<?php
    include("../verification/connection.php");
    
    mysqli_select_db($sql,"project");

    session_start();


if (isset($_POST['submit'])) {
    
    //mysqli_real_escape_string () returns a legal string which can be used with SQL queries.
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./upload/" . $filename;

    $query1  = "INSERT INTO upload_slip(name) VALUES ('$filename')";
    
    $result1 = mysqli_query($sql, $query1);
    if (move_uploaded_file($tempname, $folder)) {
        // echo "<h3>  Image uploaded successfully!</h3>";
    /*} else {
        // echo "<h3>  Failed to upload image!</h3>";
    }
    if (!$result1)
        die("Inavlid query" . mysqli_error($sql));*/
    

}
}
// mysqli_close($conn);

?>

<?php
    require 'vendor/autoload.php'; // Include the PayPal SDK library

    // Set up the PayPal API client
    $client = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AWB4TkdywS4EcPburIlDH5BwsBUYMcUqv_r7IQ1hf_g9n-6MtLayKxgHfuLtbmNm_Sh4QYXPQk1bFYYP',     // Client ID
        'EML4CmKn5l8wFttTw5HCrgp1jYqAsqEpbegX6dgmW15aBc1_dU3AnBJSsXRdD2ZjkyKXmT8PUIzqKR5j'  // Client secret
    )
    );

    $client->setConfig([
    'mode' => 'sandbox',   // Use the PayPal sandbox environment
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => false,
    'log.FileName' => '',
    'log.LogLevel' => 'FINE',
    'validation.level' => 'log'
    ]);

   // Retrieve the payment details
    $payment_id = $_GET['paymentID'];
    $payment = \PayPal\Api\Payment::get($payment_id, $client);

    // Store the payment details in the database
    $user_id = $_SESSION['user_id'];
    $total = $_SESSION['total'];
    $payment_date = date('Y-m-d H:i:s', strtotime($payment->create_time));
    $transaction_id = $payment->transactions[0]->related_resources[0]->sale->id
    


?>
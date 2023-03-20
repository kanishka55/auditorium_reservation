<?php
    include("../verification/connection.php");
    mysqli_select_db($sql,"project");
    session_start();


    if(isset($_POST['payedrefund']))
    {
        $refundAmount = $_POST['refundableAmount'];
        $bookingid = $_POST['bookingid'];

        $refundtable = "INSERT INTO refundable_payment(refundable_amount, booking_id) VALUES('$refundAmount','$bookingid')";

        $queryRefundTable = mysqli_query($sql,$refundtable);

        if(!$queryRefundTable)
        {
            die("Invalid query".mysqli_error($sql));
        }
        else
        {
            //echo "data inserted to the table";
        }

    } 
       
            
?>  


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        
        <script type="text/javascript" src="paymentamount.js"></script>

        <script src="https://www.paypal.com/sdk/js?client-id=AWB4TkdywS4EcPburIlDH5BwsBUYMcUqv_r7IQ1hf_g9n-6MtLayKxgHfuLtbmNm_Sh4QYXPQk1bFYYP&currency=USD"></script>

        <script>

            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function is called when the button is clicked
                    return actions.order.create({
                    purchase_units: [{
                        amount: {
                        value: "<?php echo $refundAmount; ?>",
                        currency_code: 'USD'
                        }
                    }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function is called when the payment is approved
                    return actions.order.capture().then(function(details) {
                    // Success! Payment is complete.
                    // You can show a confirmation message to the user.
                    alert('Payment successful!');
                    });
                },
        onError: function(error) {
            // This function is called when there's an error with the payment
            // You can show an error message to the user
            alert('There was an error processing your payment: ' + error);
        }
        }).render('#paypal-button-container');

        </script>

    </head>

    <body>

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2>Upload The Bank Slip</h2>
                </div>

                <div class="col-12 col-md-6">
                    <h2>Pay via online</h2>  
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <form method="post" action="stepthreerefund.php" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="uploadfile" value="" />
                        <input type="submit" class="form-control btn btn-secondary mt-1" name="submit" value="Upload">
                    </form>
                </div>

                <div class="col-12 col-md-6">
                <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        
        
        

    </body>
</html>
<?php
    include("../verification/connection.php");
    mysqli_select_db($sql,"project");
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {


    if(isset($_POST['submitvalue']))
    {
        //finally, let's store our posted values in the session variables
        $packageprice = $_POST['packageprice'];
        $decorationprice = $_POST['decoration_price'];
        $rehearsalprice = $_POST['rehearsalprice'];
        $securityprice = $_POST['securityPrice'];
        $value = $_POST['total_price'];
        $bookingid = $_POST['bookingid'];

        $_SESSION['packageprice'] = $packageprice;
        $_SESSION['decoration_price'] = $decorationprice;
        $_SESSION['rehearsalprice'] = $rehearsalprice;
        $_SESSION['securityPrice'] = $securityprice;
        $_SESSION['total_price'] = $value;

        //$value = $_SESSION['total_price'];

        $fullPayment = "INSERT INTO full_payment(rehearsal_amount, decoration_amount,security_amount,total_amount,booking_id) VALUES('$rehearsalprice','$decorationprice','$securityprice','$value','$bookingid')";

        $queryFullpayment = mysqli_query($sql,$fullPayment);

        if(!$queryFullpayment)
        {
            die("Invalid query".mysqli_error($sql));
        }
        else
        {
            //echo "data inserted to the table";
        }

    } 
    
    //$totalValue = $_POST['totalValue'];
    //echo "The total value is: " . $value;        
            
?>  


<!DOCTYPE html>
<html lang="en">
<style>
            body{
                background-image:url(centre3.png);
               
            }
            h1{
                font-family:sans-serif;
                color: rgb(250, 250, 250);
            }
            b{
                background-color: rgba(165, 42, 42, 0.784);
            }
            .new{
                background-color: rgb(208, 125, 125);
            }
            button{
                width: 600px;
                text-align: center;
            }
            .na{
                background-color: rgba(98,29,29,1);
            }
            
            h5{
                color:white;
            }
            .na
            {
                background-color:rgba(98,29,29,1);
            }
            h6
            {
                color:white;
            }
            ul,li{
                list-style-type:none;
            }

          </style>
    
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
                        value: "<?php echo $value; ?>",
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

    <div class="na">

        <nav class="navbar navbar-expand-sm p-0">
                    <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                                        <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calander</h6></a></li>
                                        <li class="nav-item"><a href="../verification/booking.php" class="nav-link"><h6>Booking</h6></a></li>
                                        <li class="nav-item"><a href="../contact_us/contact1.php" class="nav-link"><h6>Contact Us</h6></a></li>
                                        <li class="nav-item"><a href="../Gallery/gallary.php" class="nav-link"><h6>Gallery</h6></a></li>
                                            <?php 
                                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==TRUE) {
                                            if($_SESSION['role_id'] == 0)
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../verification/booking.php'><h6>Reservation</h6></a>
                                        </li>";
                                        if ($_SESSION['role_id'] == 1) {
                                                    echo "<li class='nav-item'>
                                            <a class='nav-link' href='../verification/adminpanel.php'>Admin panel</a>
                                        </li>";
                                        }
                                        if ($_SESSION['role_id'] == 2) {
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../vcpannel/vcpanel.php'>Vice Chancellor Panel</a>
                                        </li>";
                                        }
                                        if ($_SESSION['role_id'] == 3) {
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../workingEngineer/WE.php'>Working Engineer</a>
                                             </li>";
                                        }
                                        if ($_SESSION['role_id'] == 4) {
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../technicalOfficer/TO.php'>Technical Officer</a>
                                             </li>";
                                        }
                                        if ($_SESSION['role_id'] == 5) {
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../rgistrarpanel/registrar.php'>Deputy Registrar</a>
                                             </li>";
                                        }
                                        if ($_SESSION['role_id'] == 6) {
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../securityOfficer/CSO.php'>Cheif Security Officer</a>
                                             </li>";
                                        }

                        ?>
                        

                       <?php }

                    ?>
                            
                            </ul>
                            

                            <?php
                                if (isset($_SESSION['logged_in']) == FALSE) {
                            ?>
                    
                            <ul class="navbar-nav ml-auto list-unstyled">
                                
                            <li class="nav-item float-end">
                                <a class='nav-link' href="../verification/index.php"  data-bs-toggle  ='modal'  style = "color: white;"><i class="fa fa-fw fa-user" ></i><h6>Login</h6></a>
                            </li>
                            <li class="nav-item float-end">
                                <a class='nav-link' href="../verification/index.php" data-bs-toggle  ='modal'><i class="fa fa-fw fa-user" style = "color: white;"></i><h6>Register</h6></a>
                            </li>

                            <?php
                               }

                               else
                               {
                            ?>
                            <li class="nav-item float-end">
                                <a class='nav-link' href="#"  data-bs-toggle  ='modal' data-bs-target='#loginModal' style = "color: white;"><i class="fa fa-fw fa-user" ></i><h6><?php echo $_SESSION['username']?></h6></a>
                            </li>

                            <li class="nav-item float-end">
                                <a href='../verification/logout.php' class='link-light'>Logout</a>
                            </li>
                            

                            <?php
                               }
                            ?>
                    
                    </ul>
                </div>
        </nav>

    </div>


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
                    <form method="POST" action="paymentprocess.php" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="uploadfile" value="" />
                        <input type="submit" class="form-control btn btn-secondary mt-1" name="submit" value="Upload">
                    </form>
                </div>

                <div class="col-12 col-md-6">
                <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        
        
        <?php
    }
    else{
     echo'<script>alert("log-in before requesting refund.")</script>';
     echo '<script type = "text/javascript">';
     echo 'window.location.href = "../verification/index.php";';
     echo '</script>';
    }?>

    </body>
</html>
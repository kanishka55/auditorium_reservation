<?php 
    session_start();
    require ('connection.php');

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
          <style>
            body{
                background-image:url(centre3.png);
               
            }
            h1{
                font-family:sans-serif;
                color: rgb(250, 250, 250);
                text-align:center;
            }
            b{
                background-color: rgba(165, 42, 42, 0.784);
            }
            .new{
                background-color: rgb(208, 125, 125);
            }
            button{
                width: 400px;
                float:left;
                background-color: rgb(158,158,158); 
                border: none;
                color:rgb(98,29,29) ;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
            nav{
                background-color: rgba(98,29,29,1);
            }
            
            h3{
                color:rgb(98,29,29);
                text-align:center;
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
            td{
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
            }
            .card{
              width:600px;
              
            }

          </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body style="background-color:rgb(158,158,158);">




        <nav class="navbar navbar-expand-sm p-0">
                    <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                                        <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calendar</h6></a></li>
                                        <!-- <li class="nav-item"><a href="../verification/booking.php" class="nav-link"><h6>Booking</h6></a></li> -->
                                        <li class="nav-item"><a href="../contact_us/contact1.php" class="nav-link"><h6>Contact Us</h6></a></li>
                                        <li class="nav-item"><a href="../Gallery/gallary.php" class="nav-link"><h6>Gallery</h6></a></li>
                                            <?php 
                                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==TRUE) {
                                            if($_SESSION['role_id'] == 0)
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='../verification/booking.php'><h6>Dashboard</h6></a>
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
        <form>
                  <div class="text-center">
                  <h1>
                    Welcome to RTMA
                  </h1>
                  </div>

                  <div class="container mt-5">


                  <table>
                  <tr><th></th><th></th></tr>
                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="../scheduletime/index1.php">
                  <button type="button" class="btn-lg btn-block ms-5">View calendar</button>
                  </a> 
                  </td>
                  <td rowspan="8">
                  
                  <div class="card">
                  
                  <div class="card-body">
                    <h3 class="card-title">Reservation Guidlines</h3>
                    <p class="card-text"><strong>Step 1</Strong><br>User should register and verify through email to login and start reservation proccess<br>
                    <strong>Step 2</strong><br>user should submit reservation request through "Request your booking tab" to get reservation approval<br>
                    <strong>Step 3</strong><br>After submitting the data "place your booking" tab shows the approval status of the request<br>
                    <strong>Step 4</strong><br>If request approved then "book now"  button is available for user.User should enter details of the reservation though this button.<br>
                    <strong>Step 5</strong><br>User adding event details user should pay advance payment through "Go to payment "--->"Advance payment" tab<br>
                    <strong>Step 6</strong><br>User should pay full payment through  "Go to payment "--->"Full payment"<br>
                    <strong>Step 7</strong><br>After the event user is able to request refund through "Request refund" tab<br>
                    <strong>Step 8</strong><br>Refundable payment released by the university it will be displyaed in "Released refundable payments" tab<br>
                  </p>
                    
                  </div>
                </div>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="../requestletter/ReForm.php">
                  <button type="button" class="btn-lg btn-block ms-5">Request your booking</button>
                  </a>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="../booking/checkoutrqsthall.php">
                  <button type="button" class="btn-lg btn-block ms-5">place your booking</button>
                  </a>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="../payment/paymentint.php">
                  <button type="button" class="btn-lg btn-block ms-5">Go to the payments</button>
                  </a> 
                  </td>
                  </tr>

                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="../requestrefund/checkoutevents.php">
                  <button type="button" class="btn-lg btn-block ms-5"> Request refund</button>
                  </a>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  <a style="text-decoration: none;" href="seat.jpg">
                  <button type="button" class="btn-lg btn-block ms-5">View seat structure</button>
                  </a>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  </td>
                  </tr>

                  <tr>
                  <td>
                  </td>
                  </tr>
                  </table>

                


                  </div>
                            </form>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    
    </body>
</html>
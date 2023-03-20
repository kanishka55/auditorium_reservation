<?php

    include("../verification/connection.php");
    //include_once("createtable.php");
    mysqli_select_db($sql,"project");

    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
    
    $customerid = $_SESSION['customer_id'];
            
    if(isset($_POST['fullPayment']))
    {
          $bookingId = $_POST['bookingid'];      
        
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
    
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
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $fetch_info['name'] ?> | Home</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript" src="paymentamount.js"></script>
        
    </head>

    <body>
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

        <!--this is for full payment total calculation-->
        <div class="container mt-4">
            <h2>Additional Requirements</h2>
            <form class="form-group" action="uploadslip.php" method="post">
                <div class="table-responsive-md">
                    <table class="table table-hover">
                        <thead>    <!--table heading-->
                            <tr>
                            <th scope="col">Package</th>
                            <th scope="col">Option</th>
                            <th scope="col">Hours</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <tr>
                                <td>Hall Package</td>
                                <td>

                                    <select id="inputState" class="form-select form-select-sm">
                                        <option selected value="yes">Yes</option>
                                    </select>
                                </td>
                                <td>
                                
                                    <select id="package" class="form-select form-select-sm qty" name="Package" onChange="getPackagetype(this.value)" required>
                                        <!--<option selected value="0">----</option>-->
                                        <option selected value="4000">4 Hours</option>
                                        <option value="8000">8 Hours</option>
                                    </select>   <!--choose for wich package comfotable for client-->
                                </td>
                                <td>
                                    <input type="number" name="packageprice" class="form-control form-control-sm" readonly value="4000" id="package_price">
                                </td>
                            </tr>

                            <tr>
                                <td>Decorations (In Hours)</td>  <!--option select hall decorations nessecery or not-->
                                <td>
                                    <select id="is_decoration" class="form-select form-select-sm" name="decoration_option" onChange="decorationCheck(); calculateTotal();" required>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm qty" name="decoration" id="decoration_hours" min="1" max="24">
                                </td>
                                <td>
                                    <input type="number" name="decoration_price" class="form-control form-control-sm" readonly min="0" id="dec_price" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>Rehearsal (In Hours)</td>  <!--option select for rehearsal nessecery or not-->
                                <td>
                                    <select id="is_rehearsal" class="form-select form-select-sm" name="rehearsal_option" onChange="rehearsalCheck(); calculateTotal();" required>
                                        <option selected value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm qty" name="rehearsal" id="rehearsal_hours" min="2" max="24">
                                </td>
                                <td>
                                    <input type="number" name="rehearsalprice" class="form-control form-control-sm" readonly min="0" id="rehearsal_price">
                                </td>
                            </tr>

                            <tr>
                                <td>University Security (In Hours)</td>  <!--option select for take security by university security or not-->
                                <td>
                                    <select id="is_security" class="form-select form-select-sm" name="security_option" onChange="securityCheck(); calculateTotal();" required>
                                        <option selected value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="security_hours" class="form-select form-select-sm qty" name="security_hours_option">
                                        <option selected value="0">----</option>
                                        <option value="7">7 Hours</option>
                                        <option value="11">11 Hours</option>
                                    </select>
                                    <!--<input type="number" class="form-control form-control-sm qty" name="security" id="security_hours" placeholder="0" min="2" max="24">-->
                                </td>
                                <td>
                                    <input type="number" name="securityPrice" class="form-control form-control-sm" readonly value="0" id="security_price">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" class="total">Total Amount</td>
                                <td>
                                    <input type="number" name="total_price" class="form-control form-control-sm" readonly id="total_id" value='4000'> 
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <input type="hidden" name="bookingid" id="bookingid" value="<?php echo $bookingId; ?>">

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit"  name="submitvalue" class="btn btn-warning">Proceed to pay</button>
                </div>
            </form>

        </div>
        <?php
    }
    else{
     echo'<script>alert("log-in before requesting refund.")</script>';
     echo '<script type = "text/javascript">';
     echo 'window.location.href = "../verification/index.php";';
     echo '</script>';
    }
    ?>
        
    </body>



</html>
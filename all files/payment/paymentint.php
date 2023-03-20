<?php
include("../verification/connection.php");
mysqli_select_db($sql,"project");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {

// $name=$eventname=$eventdate=$eventtime=$comment=" ";



?>
<!DOCTYPE html>
    <html lang="en">
    <head>
          <style>
            body{
                background-image:url(../verification/centre3.png);
               
            }
            h1{
                font-family:sans-serif;
                color: white;
            }
            b{
                background-color: rgba(165, 42, 42, 0.784);
            }
            .new{
                background-color: rgb(208, 125, 125);
            }
            button{
                width: 700px;
                text-align: center;
                margin: top 20%;
                margin: bottom 20%;
                

            }
            .na
            {
                background-color:rgba(98,29,29,1);
                height: 42px;
                display: block;
            }
            h6
            {
                color:white;
            }
            ul,li{
                list-style-type:none;
            }
          </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                    <a class='nav-link' href='booking.php'><h6>Reservation</h6></a>
                </li>";
                if ($_SESSION['role_id'] == 1) {
                            echo "<li class='nav-item'>
                    <a class='nav-link' href='adminpanel.php'>Admin panel</a>
                </li>";
                }
                if ($_SESSION['role_id'] == 2) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='../vcpannel/vcpanel'>Vice Chancellor Panel</a>
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
                        <a class='nav-link' href="#"  data-bs-toggle  ='modal' data-bs-target='#loginModal' style = "color: white;"><i class="fa fa-fw fa-user" ></i><h6>Login</h6></a>
                    </li>
                    <li class="nav-item float-end">
                        <a class='nav-link' href="#" data-bs-toggle  ='modal' data-bs-target='#RegisterModal'><i class="fa fa-fw fa-user" style = "color: white;"></i><h6>Register</h6></a>
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
                        <a href='logout.php' class='link-light'>Logout</a>
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
        <a style="text-decoration: none;" href="../advanced payment/stepone.php">
        <button onclick="myFunction()" type="button" class="btn btn-light btn-lg btn-block ms-5 mt-5">Advance payment</button>
        </a>

        <a style="text-decoration: none;" href="../refundable payment/steponerefund.php">
        <button type="button" class="btn btn-light btn-lg btn-block ms-5 mt-2"> Refund payment</button>
        </a>

        <a style="text-decoration: none;" href="paymentdetail.php">
        <button type="button" class="btn btn-light btn-lg btn-block ms-5 mt-2">Full payment</button>
        </a>

        </div>
        </form>
        <script>
function myFunction() {
  alert("You have to pay only LKR100000.00");
}
</script>
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
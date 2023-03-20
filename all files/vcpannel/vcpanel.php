<?php
require ('../verification/connection.php');
mysqli_select_db($sql,"project");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 2) {

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
          
    <!--meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/bootstrap.css"-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Register with Email Verification in PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
            body{
                
               
            }
            /*h1{
                font-family:sans-serif;
                color: rgb(250, 250, 250);
            }
            b{
                background-color: rgba(151, 45, 45, 0.784);
            }
            new{
                background-color: rgb(208, 125, 125);
            }*/
            
            
           
            body
        {
            background-color:rgb(158,158,158);
                /* background-image:url(1.jpg); */
               
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
        .card{
            background-color:rgb(98,29,29);
            color:rgb(255,255,255);
        }
        h4{
            color:rgb(255,255,255);
        }
            
            
          </style>
    </head>
    <body style="background-color:rgb(158,158,158);">
        

        
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
                        <a href='../verification/logout.php' class='link-light'>Logout</a>
                    </li>
                    

                    <?php
                       }
                    ?>
            
            </ul>
        </div>
</nav>

</div>
        
                <div class="text-center">
                     <h1 style="text-align:center;">
                        Welcome to the RTMA
                    </h1>
                </div>
                <div class="container mt-5">
                  <div class="d-flex flex-wrap gap-2" >
                  

                  <div class="card text-white  mb-3" style="max-width: 18rem;">
                  <div class="card-header">
                      <h4>Approved requests</h4>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text"><a href="allapprovedrequest.php" style="text-decoration: none;color:white; ">Please click here to  approve request for booking Rabindranath Tagore Memorial Auditorium</a></p>
                  </div>
                  </div>
                  <div class="card text-white  mb-3" style="max-width: 18rem;">
                  <div class="card-header">
                      <h4>Not approved requests</h4>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text"><a href="allnotapprovedrequest.php" style="text-decoration: none;color:white; ">Click here to see not approved requests</a></p>
                  </div>
                  </div>
                  <div class="card text-white mb-3" style="max-width: 18rem;">
                  <div class="card-header">
                      <h4>Refund requests</h4>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text"><a href="../approve/commentVc.php" style="text-decoration: none;color:white; ">Click here to approve refundable payment</a></p>
                  </div>
                  </div>

                  
                    
                    <div class="card text-white mb-3" style="max-width: 18rem;">
                    <div class="">
                    <div class="card-header">
                          <h4>View monthly Income</h4>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text"><a href="../chartjs/graph2.php" style="text-decoration: none;color:white; ">Please click here to view monthly income</a></p>
                      </div>
                      </div>
                      </div>

                       
                    <div class="card text-white mb-3" style="max-width: 18rem;">
                    <div class="">
                    <div class="card-header">
                          <h4>View monthly events</h4>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text"><a href="../chartjs/graph.php" style="text-decoration: none;color:white; ">Please click here to view monthly events</a></p>
                      </div>
                      </div>
                      </div>

                     
                    </div>
                <div class="text-center">
                  <h1>Thankyou for collaborating with us</h1>
                </div> 
                </div>


            
                

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <?php
        }
        else{
          echo'<script>alert("You are not authorized this page!")</script>';
          echo '<script type = "text/javascript">';
          echo 'window.location.href = "../verification/index.php";';
          echo '</script>';
        }
        ?>
    
    </body>
</html>
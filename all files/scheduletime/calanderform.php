<?php 
require ('../verification/connection.php');
mysqli_select_db($sql,"project");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 1) {


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Register with Email Verification in PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        body
        {
                background-color:rgb(158,158,158);
               
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
            background-color:rgb(255,255);
        }
    </style>
</head>

<body >

    <div class="na">

        <nav class="navbar navbar-expand-sm p-0">
                    <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                        <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calendar</h6></a></li>
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
    <div class="container py-5 d-flex justify-content-center" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient text-light">
                        <h5 class="card-title" style="color:rgb(98,29,29);">Add Events</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="container-">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-secondary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-secondary btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
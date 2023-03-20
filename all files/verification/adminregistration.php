<?php 

    require ('connection.php');
    mysqli_select_db($sql,"project");
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 1) {
?>
<html lang="en">
<head> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Register with Email Verification in PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        .na
        {
            background-color:rgba(98,29,29,1);
            
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
</head>

<body class="bg-light" style="height:850px;max-width: 100%; overflow-x: hidden;">
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
                        <a class='nav-link' href="#"  data-bs-toggle  ='modal' data-bs-target='#loginModal' style = "color: white; padding: 10px;"><i class="fa fa-fw fa-user" ></i><h6><?php echo $_SESSION['username']?></h6></a>
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

    <div class="body">
    <div class="form">
        <div class="h4">
            <span class="title">Registration</span>
            
        </div>

        
    <form action="registration.php"method="post">
            <div class="mb-3">
            <label for=role_id>Role Type</label>
            <select name="role_id" id="role_id">
            <option selected value="2">Vice Chancellor</option>
            <option value="3">Engineer</option>
            <option value="4">Technical Officer</option>
            <option value="5">Registrar</option>
            <option value="6">Chief Security Officer</option>
            </select>
            </div>
        <div class="form-floating ">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Enter your name" required>
            <label for="floatingInput">Name</label>
            
    
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
            <label for="floatingInput">Email address</label>
           
        
        </div>
        <div class="form-floating ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Jhon" name="first_name" required>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Wane" name="last_name" required>
                        <label for="floatingInput">Last Name</label>
                    </div>

        <div class="form-floating">
            <input type="tel" name="telnum" class="form-control" id="floatingInput" placeholder="Enter your Tele-Phone Number " required>
            <label for="floatingInput">TelePhone Number</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" required id="floatingPassword" placeholder="Create Your Password" attern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <label for="floatingPassword">Password</label>
            
         </div>

        <div class="form-floating">
            <input type="password" required class="form-control" name="confirmpassword" id="floatingPassword" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
           
        
        </div>
        <div class="">
        <!--label for=role_id>Role Type</label>
            <select name="role_id" id="role_id">
            <option value="2">Vice Chancellor</option>
            <option value="3">Engineer</option>
            <option value="4">Technical Officer</option>
            <option value="5">Registrar</option>
            <option value="6">Chief Security Officer</option>
        </select-->

       
         <div class="input field button">
              <input type="submit" name="registration" value="register">
         </div>
        
       
</div>
                    </form>
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

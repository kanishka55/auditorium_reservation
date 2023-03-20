<?php
        //include connection file
        include_once("../verification/connection.php");
        //select database
        mysqli_select_db($sql,"project");
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
        $_SESSION['bookingid'];
        $_SESSION['customer_id'];

        $lastbookid = $_SESSION['bookingid'];
        $customerid = $_SESSION['customer_id'];

        if(isset($_POST['nextpage3'])){
			
            $lightning=$_POST['lightning'];
            $sound=$_POST['sound'];
            $generators=$_POST['generators'];
            $decorations=$_POST['decorations'];
            $tickets=$_POST['ticket'];

            /*insert data from checkbox about security guard for the function
            $checkd="";
            $defence=$_POST['defence'];
            foreach($defence as $checkd1)  
                { 
                    $checkd .= $checkd1.",";  
                } */


            if (isset($_POST['defence'])) 
            {
                $checkd="";
                $defence=$_POST['defence'];
                foreach($defence as $checkd1) 
                { 
                    $checkd .= $checkd1.",";  
                } 
            } else {
                $checkd = ""; // set default value if the checkbox is not selected
            }

            /*insert data from checkbox about agreement sentence in the application
            $agreement="";
            $agree=$_POST['agree'];
            foreach($agree as $agreement1)  
                { 
                    $agreement .= $agreement1.",";  
                }  */

            //insert data to the table booking_details

            $bookdata3="UPDATE booking_details SET lightning='$lightning',
            sound='$sound',
            generators='$generators',
            decorations='$decorations',
            tickets='$tickets',
            controlling_sec='$checkd',
            customer_id = '$customerid'
            WHERE booking_id =  $lastbookid";

			$book3=mysqli_query($sql,$bookdata3);
			if(!$book3){
				die("Invalid query".mysqli_error($sql));
			}else
            {
				//echo "data inserted successfully";	
			}
		}
    ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
          <style>
            h3,h4{
                color:rgba(98,29,29); 
            }
            
            
            button{
                width: 600px;
                text-align: center;
            }
           
            h5{
                color:white;
            }
            nav
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
            input[type=text]{
                width:500px;

            }
            input[type=date]{
                width:400px;
            }
            input[type=time]{
                width:400px;
            }
            input[type=email]{
                width:400px;
            }
            input[type=submit]{
                color:white;
                background-color:rgb(98,29,29);

            }
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
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


    <div class="na">

        <nav class="navbar navbar-expand-sm p-0 fixed-top">
                    <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                        <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calander</h6></a></li>
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




        <div class="container mt-5 p-5">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" id="userform">
        
        <div class="text-center">
        <h3><strong>Details regarding outsourced equipment and services</strong></h3>
        </div>
        
        <div class="form-group">
        <lable for="lightning"><strong>Stage lightning:</strong></label>
        <input type="text" id="lightning" name="lightning" class="form-control"><br>
        </div>
        
        <div class="form-group">
        <label for="nameapplicant"><strong>Stage sound controling:</strong></label>
        <input type="text" id="sound" name="sound" class="form-control"><br>
        </div>
         
        <div class="form-group">
        <label for="nic"><strong>Electric generators:</strong></label>
        <input type="text" id="generators" name="generators" class="form-control"><br>
        </div>
    
        <div class="form-group">
        <label for="address"><strong>Stage decorations:</strong></label>
        <input type="text" id="decorations" name="decorations" class="form-control"><br>
        </div>

        <div class="form-group">
        <label for="phonenumber"><strong>Ticket sales at the auditorium:</strong></label><br>
        <input type="text" id="ticket" name="ticket" class="form-control">
        </div>

        <div class="form-group">
        <label for="phonenumber"><strong>Security for the function:</strong></label><br>
        <input type="checkbox" name="defence[]" value="securityex" class="form-check-input">
        <label class="form-check-label" for="externalsecurity">externally</label>
        <input type="checkbox" name="defence[]" value="securityuni" class="form-check-input">
        <label class="form-check-label" for="securityuni">security division of the university</label>
        </div>
        
        <input type="checkbox" name="agree[]" value="agree" class="form-check-input" checked>
        <strong>I agree to avail the Rabindranath Tagore Memorial Auditorium on payment of the fees charged by Ruhunu University for conducting the above program subject to the conditions or rules to be observed while using the Rabindranath Tagore Memorial Hall.</strong>


        <div class="form-group">
        <div class="text-center">
            <input type="submit" name="nextpage3" value="submit" class="btn">
        </div>
        </div>

        <div class="form-group">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="application2.php">Previous</a></li>
        <li class="page-item"><a class="page-link" href="application1.php">1</a></li>
        <li class="page-item"><a class="page-link" href="application2.php">2</a></li>
        <li class="page-item"><a class="page-link" href="application3.php">3</a></li>
        </ul>

        </form>
        </div>

       
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>

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
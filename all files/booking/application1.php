<?php
        //include connection file
        include_once("../verification/connection.php");
        //select database
        mysqli_select_db($sql,"project");

        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
        $_SESSION['cusfname'];
        $_SESSION['cuslname'];
        $_SESSION['custelephone'];


        if(isset($_POST['bookdate']))
                {

                    $letterNumber = $_POST['myhiddenvalue'];
                    
                    $_SESSION['letterNumber'] = $letterNumber;

                }

        if(isset($_POST['nextpage1']))
        {
            $letterno = $_SESSION['letterNumber'];

            $namecompany=$_POST['namecompany'];
            $nameapplicant=$_POST['nameapplicant'];
            $nicnum=$_POST['nicnum'];
            $address=$_POST['address'];
            $landnum=$_POST['landnum'];
            $mobilenum=$_POST['mobilenum'];
            $email=$_POST['email'];

            //insert data to the table booking_details
            $bookdata="INSERT INTO booking_details(name_company,
            name_applicant,
            nic_applicant,
            address_applicant,
            mobile_applicant,
            landline_applicant,
            email_applicant,
            letterNo) 
            VALUES('$namecompany','$nameapplicant','$nicnum','$address',$mobilenum,'$landnum','$email','$letterno')";

			$book1=mysqli_query($sql,$bookdata);
            if(!$book1)
            {
				die("Invalid query".mysqli_error($sql));
			}else
            {
				//echo "data inserted to the table";	
                $lastbookid = mysqli_insert_id($sql);
                $_SESSION['bookingid'] = $lastbookid;

                
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



        <div class="container mt-5 p-5">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" id="userform">
        
        <div class="text-center">
        <h3><strong>Booking Application of Auditorium</strong></h3>
        <h4><strong>Details of the organization or individual</strong></h4>
        </div>

        <div class="form-group">
        <lable for="namecompany"><strong>Name of the Company:</strong></label>
        <input type="text" id="namecompany" name="namecompany" class="form-control"><br>
        </div>
        
        <div class="form-group">
        <label for="nameapplicant"><strong>Name of the Applicant:</strong></label>
        <input type="text" id="nameapplicant" name="nameapplicant" class="form-control" value = "<?php echo $_SESSION['cusfname']." ".$_SESSION['cuslname'] ?>"><br>
        </div>
         
        <div class="form-group">
        <label for="nic"><strong>NIC Number:</strong></label>
        <input type="text" id="nicnum" name="nicnum" class="form-control"><br>
        </div>
    
        <div class="form-group">
        <label for="address"><strong>Address:</strong></label>
        <input type="text" id="address" name="address" class="form-control" value=""><br>
        </div>

        <div class="form-group">
        <label for="phonenumber"><strong>Phone Number:</strong></label><br>
       
        <div class="col-4">
        <label for="landnum"><strong>Landline Number:</strong></label>
        <input type="tel" id="landnum" name="landnum" class="form-control">
        
        <label for="mobilenum"><strong>Mobile Number:</strong></label>
        <input type="tel" id="mobilenum" name="mobilenum" class="form-control" value ="<?php echo $_SESSION['custelephone'] ?>">
        </div>
        
        <div class="form-group">
        <label for="email"><strong>E-mail:</strong></label>
        <input type="email" id="email" name="email" class="form-control"><br>
        </div>

        <div class="text-center">
        <div class="form-group">
        <input type="submit" name="nextpage1" value="Submit" class="btn">
        </div>
        </div>

        
        <div class="form-group">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="application1.php">1</a></li>
        <li class="page-item"><a class="page-link" href="application2.php">2</a></li>
        <li class="page-item"><a class="page-link" href="application3.php">3</a></li>
        <li class="page-item"><a class="page-link" href="application2.php">Next</a></li>
        </ul>
        

        </div>
        </div>
 
        </form>
        </div>
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
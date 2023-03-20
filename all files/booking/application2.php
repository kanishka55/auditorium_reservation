<?php
        //include connection file
        include_once("../verification/connection.php");
        //select database
        mysqli_select_db($sql,"project");

        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
        //$_SESSION['bookingid'];

        $lastbookid = $_SESSION['bookingid'];
        
        if(isset($_POST['nextpage2']))
           { 
            $mband=$_POST['mband'];
            $psingers=$_POST['psingers'];
            $details_show=$_POST['detailsshow'];
            $req_date=$_POST['req_date'];
            $req_time=$_POST['req_time'];
            
            //insert data from checkbox about matter
           $chk="";  
            $checkbox1=$_POST['matter'];
            foreach($checkbox1 as $chk1)  
                { 
                    $chk .= $chk1.",";  
                }  
            //insert data from checkbox about traditional/speed rhythem
           /* $ch="";
            $check2=$_POST['musicalshow'];
            foreach($check2 as $ch1)  
                { 
                    $ch .= $ch1.",";  
                }  

            */


            if (isset($_POST['musicalshow'])) {
            $check2 = $_POST['musicalshow'];
            $ch = "";
            if (!empty($check2) && is_array($check2)) {
                foreach ($check2 as $ch1) {
                    $ch .= $ch1 . ",";
                }
            } else {
                $ch = "0";
            }
            $ch = rtrim($ch, ",");
        } else {
            // handle the case when the checkbox is not checked
            $ch = "0";
        }
            //$ch = rtrim($ch, ",");

            //insert data from checkbox about viewers of the function
            $checkb="";
            $viewers=$_POST['viewers'];
            foreach($viewers as $checkb1)  
                { 
                    $checkb .= $checkb1.",";  
                }  

            //insert data to the table booking_details

            $bookdata="UPDATE booking_details SET matter='$chk',
            musical_show='$ch',
            band='$mband',
            singers='$psingers',
            guests='$details_show',
            audience='$checkb',
            date_application='$req_date',
            time_application='$req_time' WHERE booking_id = '$lastbookid'";

            
            $book2=mysqli_query($sql,$bookdata);
			if(!$book2){
				die("Invalid query".mysqli_error($sql));
			}else
            {
				//echo "data inserted to the table";	
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
                background-color:rgb(98,29,29);
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="userform">
       
        <div class="text-center">
        <h3><strong>Details regarding the matter of application</strong></h3>
        </div>


        <div class="form-group">
        <lable for="matterapply"><strong>Matter:</strong></label><br>
        
        <input type="checkbox" name="matter[]" value="seminars" class="form-check-input">
        <label class="form-check-label" for="seminarslectures">Seminars/Lectures</label>
        
        <input type="checkbox" name="matter[]" value="stagedrama" class="form-check-input">
        <label class="form-check-label" for="stagedrama">Stage drama</label>

        <input type="checkbox" name="matter[]" value="musicalshow" class="form-check-input">
        <label class="form-check-label" for="musical">Musical show</label>

        <input type="checkbox" name="matter[]" value="celebrations" class="form-check-input">
        <label class="form-check-label" for="atc">Awards/Tributes/Celebrations</label>

        <input type="checkbox" name="matter[]" value="other" class="form-check-input">
        <label class="form-check-label" for="other">Other:</label>
        </div>

        
        <div class="form-group">
        <label for="nameapplicant"><strong>Musical Show:</strong></label><br>

        <input type="checkbox" name="musicalshow[]" value="traditional" class="form-check-input">
        <label for="nameapplicant">Traditional:</label><br>

        <input type="checkbox" name="musicalshow[]" value="fastrhy" class="form-check-input">
        <label for="nameapplicant">Fast Rhythms:</label><br>
        </div>


        <label for="instruction"><strong>Spectators are not allowed to dance in the auditorium.If this is done,the security deposit will be canceled from the relevant concert.</strong></label>
        
        <div class="form-group">
        <label for="mband"><strong>The band:</strong></label>
        <input type="text" id="mband" name="mband" class="form-control"><br>
        </div>

        <div class="form-group">
        <label for="singers"><strong>Participating singers:</strong></label>
        <input type="text" id="psingers" name="psingers" class="form-control"><br>
        </div>


        <div class="form-group">
        <label for="mband"><strong>Stage Plays/ Conferences/ Lectures/ Prizes Main / Awards / Festivals / Resource Donation/People running the program/group/Special guests:</strong></label>
        <input type="text" id="detailsshow" name="detailsshow" class="form-control"><br>
        </div>


        <div class="form-group">
        
        <label for="nameapplicant"><strong>Viewers:</strong></label><br>

        <input type="checkbox" name="viewers[]" value="unistudents" class="form-check-input">
        <label for="nameapplicant"><strong>University students:</strong></label><br>
    
        <input type="checkbox" name="viewers[]" value="schoolstudents" class="form-check-input">
        <label for="nameapplicant"><strong>School students:</strong></label><br>
     
        <input type="checkbox" name="viewers[]" value="staff" class="form-check-input">
        <label for="nameapplicant"><strong>Institute staff:</strong></label><br>
    
        <input type="checkbox" name="viewers[]" value="open" class="form-check-input">
        <label for="nameapplicant"><strong>open:</strong></label><br>
        </div>

        <div class="form-group">
        <label for="singers"><strong>Required date:</strong></label>
        <input type="date" id="req_date" name="req_date" class="form-control"><br>
        </div>

        <div class="form-group">
        <label for="singers"><strong>Required time:</strong></label>
        <input type="time" id="req_time" name="req_time" class="form-control"><br>
        </div>

        <div class="text-center">
        <div class="form-group">
            <input type="submit" name="nextpage2" value="submit" class="btn">
        </div>
        </div>

        <div class="form-group">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="application1.php">Previous</a></li>
        <li class="page-item"><a class="page-link" href="application1.php">1</a></li>
        <li class="page-item"><a class="page-link" href="application2.php">2</a></li>
        <li class="page-item"><a class="page-link" href="application3.php">3</a></li>
        <li class="page-item"><a class="page-link" href="application3.php">Next</a></li>
        </ul>
        

        </div>

        </div>
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
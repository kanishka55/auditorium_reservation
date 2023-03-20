<?php
        include("../verification/connection.php");
        session_start();
        mysqli_select_db($sql,"project");
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
		
// $name=$eventname=$eventdate=$eventtime=$comment=" ";
        
    


        $_SESSION['customer_id'];
        $customerid = $_SESSION['customer_id'];
        //

        if(isset($_POST['getbookingid']))
        {

            $bookingid = $_POST["bookingid"];
            $_SESSION['bookingid'] = $bookingid;
        }

        else
        {

        }

        if(isset($_POST['submit'])){
	
			$name=$_POST["name"];
			$eventname=$_POST["eventname"];
			$eventdate=$_POST["eventdate"];
            $eventtime=$_POST["eventtime"];
            $comment = $_POST["commentsClient"];
            
            $bookingid = $_SESSION['bookingid'];
            
           // echo $name;

			$sql6="INSERT INTO requestrefund_info(
                CustName, 
                EventName,
                EventDate,
                EventTime,
                Comment,
                customer_id,
                booking_id) 
                VALUES('$name','$eventname','$eventdate','$eventtime','$comment','$customerid','$bookingid')";
			
            $q6=mysqli_query($sql,$sql6);

			if(!$q6){
                die("error".mysqli_error($sql));
				//echo '<script>alert("error occured")</script>';
			}
            
            else{
				
				//echo '<script>alert("Your request submitted successfully!")</script>';
                //echo '<script type = "text/javascript">';
                //echo 'window.location.href = "../verification/booking.php";';
               // echo '</script>';
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
            nav{
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



    <div class="container-fluid p-5 my-0 mt-5 ">
       <div class="form1">
            <div>
               
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="userform">
                    <div class="h2">
                     <span class="title" style="color:rgb(98,29,29);">Request refund form</span>
                    </div>
                    <div>
                        <div>
                            <label><strong>Name:</strong> </label> <input type="text" name="name" class="form-control"><br><br>
                            <label><strong>Event Name:</strong> </label> <input type="text" name="eventname" class="form-control"><br><br>
                            <label><strong>Event Date: </strong></label> <input type="date" name="eventdate" class="form-control"><br><br>
                            <label><strong>Event Time:</strong> </label> <input type="time" name="eventtime" class="form-control"><br><br>

                            <label><strong>Comment:</strong> </label><textarea id="commentsClient" name="commentsClient" class ="form-control" rows ="10" cols="100"></textarea><br>
                        
                        </div>
                        
                    
                    </div>

                    <div class="">
                      <center><input type="submit" name="submit" class="btn btn-light" value="Submit"><center/>
                   </div>
                </form>
                       
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
    }
    ?>
</body>
</html>
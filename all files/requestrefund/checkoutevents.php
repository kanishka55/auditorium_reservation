<?php

include_once("../verification/connection.php");
mysqli_select_db($sql,"project");
session_start();
$_SESSION['customer_id'];
$customerid = $_SESSION['customer_id'];




$dateNow = date("Y-m-d"); // Get the current date in the format 'YYYY-MM-DD'

$selectbookings = "SELECT * FROM booking_details INNER JOIN requestletter_info ON booking_details.letterNo=requestletter_info.letterNo WHERE booking_details.customer_id ='$customerid' AND date_application < '$dateNow'";

$qryforbooking = $sql -> query($selectbookings);


$selectcustomername = "SELECT * FROM customer WHERE customer_id =$customerid";
$qryforname = $sql->query($selectcustomername); 

if($qryforname)
{
    while($row = $qryforname -> fetch_assoc())
    {
        $cusfname = $row['first_name'];
        $cuslname = $row['last_name'];
        $custelephone = $row['telephone_num'];

        

        
    }
}

else
{
 die("error".mysqli_error($sql));
}



?>



<!DOCTYPE html>
<html>

<title>

</title>

<head>
<meta charset="UTF-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <style>
        p{
            color:red;
        }

        .na{
                background-color: rgba(98,29,29,1);
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
                    <a class='nav-link' href='adminpanel.php'></a>
                     </li>";
                }

                ?>
                

               <?php }

            ?>
                    
                    </ul>
                    

                    <?php
                        if (isset($_SESSION['logged_in']) == FALSE) {
                    ?>
            
                    <ul class="navbar-nav ml-auto">
                        
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

</div>


        
    <div class="container">
        <?php
        if($qryforbooking -> num_rows > 0)
        {  
            while($row = $qryforbooking->fetch_assoc())
            {
                $bookingId = $row['booking_id'];

                
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <div class="card">
                                <h5 class="card-header"><?php echo $row['eventName'] ?></h5>

                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Applicant Name</th>
                                                <td><?php echo $cusfname." ".$cuslname ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Event Date</th>
                                                <td><?php echo $row['date_application'] ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Event Time</th>
                                                <td><?php echo $row['time_application'] ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Categery</th>
                                                <td><?php echo $row['matter'] ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                        
                                    <form action="requestrefund.php" method="post">
                                        <input type="hidden" name= "bookingid" value="<?php echo $bookingId; ?>">
                                        <input type="submit" name = "getbookingid" value="Release Refund Payment" class="btn btn-primary float-end">
                                    </form>
                                        <!-- <a href="application1.php" class="btn btn-primary float-end">Book Now</a>   -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                    
                <?php
                
                
            }

        }

        else
        {
            //die("error".mysqli_error($sql));
        }

       ?>
        
    </div>
</body>

</html>
<?php
include("../verification/connection.php");
mysqli_select_db($sql,"project");
                //$fetctdata='SELECT * FROM request letter info table';
 $result = mysqli_query($sql, "SELECT * FROM requestletter_info where is_approved=0");
                // $sql->query('SELECT * FROM request letter info table');
                session_start();
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 2) {


                if(!$result)
                {
                    die("Invalied query");
                }
                //read data of database
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
                    
                            body{
                                background-image:url();
                               
                            }
                            h1{
                                font-family:sans-serif;
                                color: rgb(250, 250, 250);
                            }
                            b{
                                background-color: rgba(151, 45, 45, 0.784);
                            }
                            new{
                                background-color: rgb(208, 125, 125);
                            }
                            h2{
                              color:black;
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
                            
                            
                          
                    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
                            .row.content {height: 550px}
                    
                    /* Set gray background color and 100% height */
                            .sidenav {
                            background-color: #f1f1f1;
                            height: 100%;
                            }
                        
                            /* On small screens, set height to 'auto' for the grid */
                            @media screen and (max-width: 767px) {
                           .row.content {height: auto;} 
                           }
                
                    
                  .switch {
                  position: relative;
                  display: inline-block;
                  width: 80px;
                  height: 34px;
                }
                
                .switch input { 
                  opacity: 0;
                  width: 0;
                  height: 0;
                }
                
                .slider {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: red;
                  -webkit-transition: .4s;
                  transition: .4s;
                }
                
                .slider:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  right: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                }
                
                input:checked + .slider {
                  background-color: green;
                  
                }
                
                input:focus + .slider {
                  box-shadow: 0 0 1px #2196F3;
                }
                
                input:checked + .slider:before {
                  -webkit-transform: translateX(46px);
                  -ms-transform: translateX(46px);
                  transform: translateX(46px);
                  
                }
                
                /* Rounded sliders */
                .slider.round {
                  border-radius: 500px;
                }
                
                .slider.round:before {
                  border-radius: 500%;
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
                                                <a href='../verification/logout.php' class='link-light'>Logout</a>
                                            </li>
                                            
                
                                            <?php
                                               }
                                            ?>
                                    
                                    </ul>
                                </div>
                        </nav>
                
                    </div>
<div class="container-fluid">
  <div class="row content" >
    


    <br>
    <div class="col-sm-9">

      <h2>Reservation Approval</h2>


    <?php


    while ($row = $result->fetch_assoc()) {

      ?>                      
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        
    <table class="table table-striped">
    <thead>
    <th>Letter No</th>
        <th>Senders Address</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Start Time</th>
        
        <th>Approval status</th>
        <th>Approval</th>

      </tr>
    </thead>
    <tbody>
      <tr>
                                    <td><?php echo $row['letterNo']; ?></td>
                                    <td><?php echo $row['senderAddress']; ?></td>
                                    <td><?php echo $row['eventName']; ?></td>
                                    <td><?php echo $row['eventDate']; ?></td>
                                    <td><?php echo $row['eventStartTime']; ?></td>
                                    <td class="text-danger">Not Approved</td>
                                    
                                    
                       <input type="hidden" name="latterid" value=<?php echo $row['letterNo']; ?>>
                       <td><input type='submit' class='btn btn-info' name='submit' value='Approve'></td>

                        
                                    
                                    
                                   </tr>
                                   </tbody>
            </table>
                                  </form>
    
                                  <?php


                                 
    }
    if (isset($_POST["submit"])) {

      $letterid = $_POST['latterid'];
      $_SESSION['letterid']=$letterid;
      echo "$letterid";
      $sql6 = "UPDATE requestletter_info set is_approved ='1' where letterNo = $letterid";
      $q6 = mysqli_query($sql, $sql6);

      if ($q6) {
        echo "approved";
      } else {
        echo "error";
      }

    }}
    else{
      echo'<script>alert("You are not authorized this page!")</script>';
      echo '<script type = "text/javascript">';
      echo 'window.location.href = "../verification/index.php";';
      echo '</script>';
    }
    

  
                        ?>
                        

                    
                
  </div>
  </div>
        </body>
</html>
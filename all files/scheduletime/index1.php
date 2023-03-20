<?php 
require_once('../verification/connection.php');
mysqli_select_db($sql,"project");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
       
          
           
            h6
            {
            color:white;
            }
            ul,li{
            list-style-type:none;
            }
            nav
            {
            background-color:rgba(98,29,29,1);
            }
            
        :root {
            --bs-success-rgb: 98, 29, 29 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            background-color:rgb(255,255,255);
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: rgba(98,29,29) !important;
            border-style: solid;
            border-width: 2px !important;
        }
        h5,button{
            background-color:rgb(118,181,197);
        }
        h3{
            color:rgb(98,29,29);
            text-align:center;
        }
    </style>
</head>
    <body style="height:850px;max-width: 100%; overflow-x: hidden;background-color:rgb(158,158,158);">
        

        
   

        <nav class="navbar navbar-expand-sm p-0 fixed-top">
            <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calendar</h6></a></li>
                <!-- <li class="nav-item"><a href="../verification/booking.php" class="nav-link"><h6>Dashboard</h6></a></li> -->
                <li class="nav-item"><a href="../contact_us/contact1.php" class="nav-link"><h6>Contact Us</h6></a></li>
                <li class="nav-item"><a href="../Gallery/gallary.php" class="nav-link"><h6>Gallery</h6></a></li>
                    <?php 
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==TRUE) {
                    if($_SESSION['role_id'] == 0)
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='booking.php'><h6>Dashboard</h6></a>
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
    <div class="container py-5 mt-5" id="page-container">
        <div class="row">
            <div class="col-md-6">
                <div id="calendar"></div>
            </div>
            <div class="col-md-6">
                <div id="guidlines"><div class="card">
                  
                  <div class="card-body">
                    <h3 class="card-title">Reservation Guidlines</h3>
                    <p class="card-text"><strong>Step 1</Strong><br>User should register and verify through email to login and start reservation proccess<br>
                    <strong>Step 2</strong><br>user should submit reservation request through "Request your booking tab" to get reservation approval<br>
                    <strong>Step 3</strong><br>After submitting the data "place your booking" tab shows the approval status of the request<br>
                    <strong>Step 4</strong><br>If request approved then "book now"  button is available for user.User should enter details of the reservation though this button.<br>
                    <strong>Step 5</strong><br>User adding event details user should pay advance payment through "Go to payment "--->"Advance payment" tab<br>
                    <strong>Step 6</strong><br>User should pay full payment through  "Go to payment "--->"Full payment"<br>
                    <strong>Step 7</strong><br>After the event user is able to request refund through "Request refund" tab<br>
                    <strong>Step 8</strong><br>Refundable payment released by the university it will be displyaed in "Released refundable payments" tab<br>
                  </p>
                    
                  </div>
                </div></div>
            </div>
           <!-- <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient text-light">
                        <h5 class="card-title">Add Events</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
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
            </div>-->
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                       <!--<button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                       <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>-->
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $sql->query("SELECT * FROM `schedule_list`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
     $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
     $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
 } 
if(isset($sql)) $sql->close();
?>


   
</body>


<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>


</html>
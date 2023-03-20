<?php
        include("../verification/connection.php");
		//include_once("createtable.php");
        mysqli_select_db($sql,"project");

        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 0) {
		
        $customerid = $_SESSION['customer_id'];
        
        
        if(isset($_POST['submit'])){
			
            $senderName = $_POST["person_name"];
            $senderAddress = $_POST["sendersadd"];
            $senderId = $_POST["person_id"];
            $eventName = $_POST["eventname"];
			$eventdate= $_POST["eventdate"];
			$eventStartTime= $_POST["start_time"];
            $eventEndTime= $_POST["end_time"];
			$comments = $_POST["comments"];
            
          
		
		

			$sql6="INSERT INTO RequestLetter_info(customer_name, senderAddress, senderId, eventName, eventDate, eventStartTime, eventEndTime, comments, customer_id) VALUES('$senderName','$senderAddress','$senderId','$eventName','$eventdate','$eventStartTime','$eventEndTime','$comments','$customerid')";
			$q6=mysqli_query($sql,$sql6);

			if(!$q6){
				die("Invalid query".mysqli_error($sql));
			}else{
				#echo "<h1>For requesting permission to reserve the Rabindranath Tagore Memorial Auditorium, University of Ruhuna</h1>";
				$_SESSION['reqstletterid'] = mysqli_insert_id($sql);
                
			}
		}

 function fetch_data()  
 {

    
      $customerid = $_SESSION['customer_id'];
      $output = '';  
      $sql = mysqli_connect("localhost", "root", "", "project"); 
      $fetch = "SELECT * FROM requestletter_info WHERE customer_id=$customerid";  
      $result = mysqli_query($sql,$fetch);  
      while($row = mysqli_fetch_array($result))  
      {
        $senderName = $row['customer_name'];
        $senderAddress = $row['senderAddress'];
        $senderId = $row['senderId'];
        $eventName = $row['eventName'];
        $eventdate= $row['eventDate'];
        $eventStartTime= $row['eventStartTime'];
        $comments = $row['comments'];
        $sendDate = $row['sendDate'];
      
        
      }  
    //   return $senderAddress;  
 }  
        if(isset($_POST["submit"]))  
        {  
            ob_start();
            require_once('tcpdf/tcpdf.php');  
            $obj_pdf = new TCPDF('P','mm','A4', true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Requesting RTMA");  
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            $obj_pdf->setPrintHeader(false);  
            $obj_pdf->setPrintFooter(false);  
            $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            $obj_pdf->SetFont('helvetica', '', 12);  
            $obj_pdf->AddPage();  
            $content = '';  
            $content .= '<p style="text-align:center";><img src="../verification/asset/download.jpg" border="0" height="60" width="110" style="align:center"; /></p><h1 style="text-align:center";>University of Ruhuna</h1>
             <h3 style="text-align:center";>Rabindranath Tagore Auditorium</h3><br /><br /><hr>
            
           
             
             <br>
             
             <p>Name of the applicant: '.$senderName.'
             <p>Address of the applicant: '.$senderAddress.'
             <p>NIC Number: '.$senderId.'
             <p>Event Name: '.$eventName.'
             <p>Event Date: '.$eventdate.'
             <p>Event Start Time: '.$eventStartTime.'
             <p>Comments: '.$comments.'
             
            
             '; 
 
              $content .= fetch_data();  
                
              $obj_pdf->writeHTML($content);  
              $obj_pdf->Output('REquestLetter.pdf', 'I'); 
              ob_end_flush(); 
            
        }  
       

    ?>



<!DOCTYPE html>
    <html lang="en">
    <head>
          <style>
            h3{
                font-family:sans-serif;
                color: rgb(98,29,29);
            }
            b{
                background-color: rgba(165, 42, 42, 0.784);
            }
            .new{
                background-color: rgb(208, 125, 125);
            }
           
                
            
            nav{
                background-color: rgba(98,29,29,1);
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
            
            .formsize{
                width:600px;
                height:800px;
              
            }
            form{
                display:inline-block;
                margin-top:480px;
            }
            .container-fluid{
                position: relative;
            
            }
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top:80px;
            }
            form{
                position: absolute;               
                top: 50%;                         
                transform: translate(0, -50%);
            }
            label{
                color:black;
            }
            input[type=submit]{
                color:white;
                background-color:rgb(98,29,29);
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


   
        <nav class="navbar navbar-expand-sm p-0 fixed-top">
                    <!--<a class="navbar-brand " href="#">University of Ruhuna</a>-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Calendar</h6></a></li>
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



    <div class="container-fluid p-5 my-0 text-white">
    <div class="container">
    <h3><strong>Requesting permission to reserve the Auditorium</strong></h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="userform">
            
        <label><strong>Applicant Name:</strong> </label><input type="text" class="form-control" id="person_name" name="person_name"><br>
        <label><strong>Address of Applicant: </strong><input type="text" class="form-control" id="sendersadd" name="sendersadd"  >
        <br>
        <lable><strong>NIC Number: </strong></lable><input type="text" class="form-control" id="person_id" name="person_id"><br>
        <label><strong>Event Name:</strong></lable> <input type="text" name="eventname" id="eventname" class="form-control"><br>
        <label><strong>Event Date:</strong></lable> <input type="date" name="eventdate" id="eventdate" class="form-control"><br>
        <label><strong>Event Start Time:</strong></lable> <input type="time" name="start_time" class="form-control"><br>
        <label><strong>Event End Time:</strong></lable> <input type="time" name="end_time" class="form-control"><br>
        <label><strong>Comments:</strong> </label><textarea id="comments" name="comments" class ="form-control" rows="1" cols="5"></textarea><br>
           

           <input type="submit" name="submit" class="btn"></button>

        </form>
    </div>
</div>
       
</div>
    <?php
}
    else{
     echo'<script>alert("log-in before requesting.")</script>';
     echo '<script type = "text/javascript">';
     echo 'window.location.href = "../verification/index.php";';
     echo '</script>';
    }
    ?>

</body>

        
</html>

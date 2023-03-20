<?php
require ('../verification/connection.php');
mysqli_select_db($sql,"project");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <style>
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
            
        </style>
        
    </head>

   
        
    <body style="background-color:rgb(208,208,208);">


        <nav class="navbar navbar-expand-sm p-0 fixed-top">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="../verification/index.php" class="nav-link"><h6>Home</h6></a></li>
                        <li class="nav-item"><a href="../scheduletime/index1.php" class="nav-link"><h6>Calendar</h6></a></li>
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
                        }
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
                                <a class='nav-link' href="#"  data-bs-toggle  ='modal' style = "color: white; padding:10px;"><h6><i class="fa fa-fw fa-user" ></i><?php echo $_SESSION['username']?></h6></a>
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


        <div class="container p-5 my-5">
            <h1 style="font-family: additional; font-weight: bolder; color:black;text-align:center">GALLERY</h1>

            
            <div class="row">
                <div class="col-md-4 ">
                    <img src="asset/img1.jpg" class="img-thumbnail" alt="hall" width="600" height="480">
                </div>
                <div class="col-md-4"> 
                    <img src="asset/img11.jpg" class="img-thumbnail" alt="hall" width="600" height="480">
                </div>
                <div class="col-sm-4">
                    <img src="asset/img7.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
            </div><br>

            <div class="row">
                <div class="col-sm-4">
                    <img src="asset/img3.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div> 
                <div class="col-sm-4">
                    <img src="asset/img2.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
                <div class="col-sm-4">
                    <img src="asset/img4.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
            </div><br>

            <div class="row">
                <div class="col-sm-4">
                    <img src="asset/img6.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
                <div class="col-sm-4">
                    <img src="asset/img0.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
                <div class="col-sm-4">
                    <img src="asset/img8.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
            </div><br>

            <div class="row">
                
                <div class="col-sm-4">
                    <img src="asset/img5.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
                <div class="col-sm-4">
                    <img src="asset/img9.jpg" class="img-thumbnail" alt="hall" width="400" height="280">
                </div>
            </div><br><br>

            <h2>Pictures from previous events</h2>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgK1.jpg" alt="Kings">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title" style="color:white">KINGS OF 70S UNPLUGGED</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY ROPA</p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgK2.jpg" alt="Kings">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">KINGS OF 70S UNPLUGGED</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY ROPA</p>
                          
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgK3.jpg" alt="Kings">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">KINGS OF 70S UNPLUGGED</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY ROPA</p>
                          
                        </div>
                    </div>
                </div>
            </div><br>

            <div id="display-image">
   
    </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgS1.jpg" alt="songs">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">සිංදු හැන්දෑව</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY GLAZE GLOBAL (PVT) LTD</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgS3.jpg" alt="songs">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">සිංදු හැන්දෑව</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY GLAZE GLOBAL (PVT) LTD</p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgS2.jpg" alt="songs">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">සිංදු හැන්දෑව</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY GLAZE GLOBAL (PVT) LTD</p>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgT1.jpg" alt="Thabarawila">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">THABARAWILA</h4>
                          <p class="card-text"style="color:white" >ORGANIZED BY FACULTY OF ENGINEERING</p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgT2.jpg" alt="Thabarawila">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">THABARAWILA</h4>
                          <p class="card-text"style="color:white" >ORGANIZED BY FACULTY OF ENGINEERING</p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width:380px">
                        <img class="card-img-top" src="asset/imgT3.jpg" alt="Thabarawila">
                        <div class="card-body" style="background-color:black;">
                          <h4 class="card-title"style="color:white">THABARAWILA</h4>
                          <p class="card-text" style="color:white">ORGANIZED BY FACULTY OF ENGINEERING</p>
                          
                        </div>
                    </div>
                </div>
            </div>

    <div class="row">

            <?php
	
	/*-- we included connection files--*/
	require ('../verification/connection.php');
	mysqli_select_db($sql,"project");
    
	$image_query = mysqli_query($sql,"select img_name,img_path from image_table");
	while($rows = mysqli_fetch_array($image_query))
	{
		$img_name = $rows['img_name'];
		$img_src = $rows['img_path'];
	?>
	            <div class="column">
                <div class="col-sm-4">
                    <div class="card" style="width:400px">
	                    <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" class="card-img-top" />
	                    <div class="card-body" style="background-color:black;">
                        <h4 class="card-title"><?php echo $img_name; ?></h4></div>
	                    </div>
                    </div>
                </div>
                </div>
	<?php
	}
?>

		

          

            <?php
	
	/*-- we included connection files--*/
	require ('../verification/connection.php');
	mysqli_select_db($sql,"project");
    
	$image_query = mysqli_query($sql,"select img_name,img_path from image_table");
	while($rows = mysqli_fetch_array($image_query))
	{
		$img_name = $rows['img_name'];
		$img_src = $rows['img_path'];
	?>
	            <div class="column">
                <div class="col-sm-4">
                    <div class="card" style="width:400px">
	                    <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" class="card-img-top" />
	                    <div class="card-body" style="background-color:black;">
                        <h4 class="card-title"><?php echo $img_name; ?></h4></div>
	                    </div>
                    </div>
                </div>
                </div>
	<?php
	}
?>

		

            </div>

        
    </body>
</html>    

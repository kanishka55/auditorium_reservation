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
        h1{
                font-family:sans-serif;
                color: rgb(250, 250, 250);
            }
            b{
                background-color: rgba(165, 42, 42, 0.784);
            }
            new{
                background-color: rgb(208, 125, 125);
            }
            .container{
              
              margin-top: 100px;
            }
            .card{
              width:600px;
              
            }
            h5{
              color:rgb(98,29,29);
            }
            .btn{
              background-color:rgb(98,29,29);
              color:white;
            }
    </style>
</head>
<body style="background-color:rgb(208,208,208);">

<nav class="navbar navbar-expand-sm p-0 fixed-top">
                    
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
 

    <div class="container">
      <div class="card d-flex aligns-items-center justify-content-center card text-center w-75 mx-auto">
            <div class="card-header">
            <h5><strong>Audio Visual Technical Officer</strong></h5>
            </div>

            <div class="card-body">
            <img class="card-img-top" src="1.jpg" alt="Card image" style="width: 200px;">

        
            <p class="card-text">Rabindranath Tagore Memorial Auditorium,<br>
            University of Ruhuna,<br>
            Wellamadama,<br>
            Matara<br></p>
            <p class="card-text">(041) 2222681 Ex. 12160</p>
            <p class="card-text">deepalavto@gmail.com</p>
            <a href="http://paravi.ruh.ac.lk/rtma/" class="btn">See Profile</a>
            </div>
      </div>
    

<!--<div class="container">
  <h3>Deputy Registrar</h3>
  
  <div class="card" style="width:200px" >
    <img class="card-img-top" src="piyal.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">General Administration Branch,University of Ruhuna, Wellamadama, Matara.</p>
      <p class="card-text">(041) 2222681 Ex. 2180</p>
      <p class="card-text">General administration office (041) 203-3254 Ex. 12014</p>
      <p class="card-text">piyal@admin.ruh.ac.lk</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
  <br>-->
  <div class="card d-flex aligns-items-center justify-content-center card text-center w-75 mx-auto mt-5">
  <div class="card-header">
  <h5><strong>Deputy Registrar</strong></h5>
  </div>

  <div class="card-body">
  <img class="card-img-top" src="piyal.png" alt="Card image" style="width: 200px;">

    
    <p class="card-text">General Administration Branch,<br>University of Ruhuna,<br> Wellamadama, Matara.</p>
      <p class="card-text">(041) 2222681 Ex. 2180</p>
      <p class="card-text">General administration office (041) 203-3254 Ex. 12014</p>
      <p class="card-text">piyal@admin.ruh.ac.lk</p>
      <a href="#" class="btn">See Profile</a>
    </div>
 
  </div>
</div><br><br>
</div></div>

  <!--<div class="container">
  <h3>Vice Chancellor</h3>
  
  <div class="card" style="width:200px">
    <img class="card-img-top" src="V.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <p class="card-text">(041) 2222681 Ex. 2180</p>
      <p class="card-text">General administration office (041) 203-3254 Ex. 12014</p>
      <p class="card-text">piyal@admin.ruh.ac.lk</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>-->
  <!--<br><br>
  <div class="card text-center">
  <div class="card-header">
  Senior Prof Sujeewa Amarasena
  </div>

  <div class="card w-100">
  <div class="card-body" >
  <img class="card-img-top" src="V.jpg" alt="Card image" style="width: 200px;">

    <h5 class="card-title"></h5>
    <p class="card-text">General Administration Branch,University of Ruhuna, Wellamadama, Matara.</p>
      <p class="card-text">(041) 2222681 Ex. 2180</p>
      <p class="card-text">General administration office (041) 203-3254 Ex. 12014</p>
      <p class="card-text">piyal@admin.ruh.ac.lk</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
          </div> 
</div><br><br>-->
 


</body>
</html>














 
<?php
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
          <style>
            body{
                background-image:url(1.jpg);
               
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
    <body>
        <div class="navbar navbar-expand-sm navbar-light bg-light">
            <a href="" class="navbar-brand">RTMA</a>
            <button class="navbar-toggler" data-toggle="collapse"><span class="navbar-toggler-icon"> </span></button>
            <div class="collapse navbar-collapse">
    
            
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Calender</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Booking</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Gallery</a></li>
                </ul>
            </div>
        </div>
        
                  <div class="text-center">
                  <h1>
                  <?php 
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==TRUE) {
                            echo "<h1 class='text-center mt-5 pt-5'>Welcome to the Rabindranath Tagore Memorial Auditorium Website</h1>";
                        }
                    ?>
                    Welcome to the Rabindranath Tagore Memorial Auditorium Website
                  </h1>
                  </div>

                  <div class="container mt-5">
                  <div class="d-flex flex-wrap gap-2" >
                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                  <div class="card-header">
                    <h4>Visit the seat structure of RTMA</h4>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text"><a href="">Do you want to vist a hall structure?Please click here.</a></p>
                  </div>
                  </div>

                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                  <div class="card-header">
                      <h4>Request for Booking RTMA</h4>
                  </div>
                  <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text">Please click here to request for booking Rabindranath Tagore Memorial Auditorium</p>
                  </div>
                  </div>

                  <a style="text-decoration: none;" href="http://localhost/final/boot/applicationI1.php">
                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">
                        <h4>Apply for the Booking RTMA</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        
                        <p class="card-text">Please click here to see application for booking Rabindranath Tagore Memorial Auditorium
                        </p>
                    </div>
                    </div>
                    </a>
                    
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="">
                    <div class="card-header">
                          <h4>Go to the payments</h4>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text">Please click here to pay your advance</p>
                      </div>
                      </div>
                      </div>

                      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <h4>Send reuest to get refund</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">Please click here to request get refund</p>
                        </div>
                        </div>

                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                          <div class="card-header">
                              <h4>Apply for Refund</h4>
                          </div>
                          <div class="card-body">
                              <h5 class="card-title"></h5>
                              <p class="card-text">Click here to get your refund again</p>
                          </div>
                          </div>
                    </div>
                <div class="text-center">
                  <h1>Thankyou for collaborating with us</h1>
                </div> 
                </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    
    </body>
</html>
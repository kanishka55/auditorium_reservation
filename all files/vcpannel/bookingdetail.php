
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
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
<body>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php">Home</a></li>
        <li><a href="">Gender</a></li>
        <li><a href="">Geo</a></li>
      </ul><br>
    </div>
    <br>
    <div class="col-sm-9">

</head>
<body>



<h2>Reservation Approval</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Booking Id</th>
        <th>Name of Company</th>
        <th>Name of Applicant</th>
        <th>NIC of Applicant</th>
        <th>Address</th>
        <th>Mobile Number</th>
        <th>Land-line Number</th>
        <th>Email Address</th>
        <th>Matter</th>
        <th>Musical Show</th>
        <th>Band</th>
        <th>Singers</th>
        <th>Guest</th>
        <th>Audience</th>
        <th>Date</th>
        <th>Time</th>
        <th>Lightning</th>
        <th>Sound</th>
        <th>Generators</th>
        <th>Decorations</th>
        <th>Tickets</th>
        <th>Controlling_Sec</th>
        <th>Date of Submission</th>
        <th>Letter Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
                        include("connection.php");
                        mysqli_select_db($sql,"project");
                        //$fetctdata='SELECT * FROM booking_details';
                         $result = mysqli_query($sql, "SELECT * FROM booking_details");
                       // $sql->query('SELECT * FROM booking_details');

                        if(!$result)
                        {
                            die("Invalied query");
                        }
                        //read data of database
                        while($row=$result->fetch_assoc())
                        {
      
    ?>                       <tr>
                                    <td><?php echo $row['booking_id'];?></td>
                                    <td><?php echo $row['name_company'];?></td>
                                    <td><?php echo $row['name_applicant'];?></td>
                                    <td><?php echo $row['nic_applicant'];?></td>
                                    <td><?php echo $row['address_applicant'];?></td>
                                    <td><?php echo $row['mobile_applicant'];?></td>
                                    <td><?php echo $row['landline_applicant'];?></td>
                                    <td><?php echo $row['email_applicant'];?></td>
                                    <td><?php echo $row['matter'];?></td>
                                    <td><?php echo $row['musical_show'];?></td>
                                    <td><?php echo $row['band'];?></td>
                                    <td><?php echo $row['singers'];?></td>
                                    <td><?php echo $row['guests'];?></td>
                                    <td><?php echo $row['audience'];?></td>
                                    <td><?php echo $row['date_application'];?></td>
                                    <td><?php echo $row['time_application'];?></td>
                                    <td><?php echo $row['lightning'];?></td>
                                    <td><?php echo $row['sound'];?></td>
                                    <td><?php echo $row['generators'];?></td>
                                    <td><?php echo $row['tickets'];?></td>
                                    <td><?php echo $row['controlling_sec'];?></td>
                                    <td><?php echo $row['date_submit'];?></td>
                                    <td><?php echo $row['customer_id'];?></td>
                                    <td><?php echo $row['letterNo'];?></td>
                                    <td>
                                        <a href=""
                                        >Approve</a>
                                    </td>
                                    
                                   </tr>
                                   <div class="card">
  <div class="card-header">
  <h5>
  <?php echo $row['matter'];?>
  </h5>
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Booing Detail</b></h5>
    
    <h5>
    Booking Id              :<?php echo $row['booking_id'];?></br>
    Name of company         :<?php echo $row['name_company'];?></br>
    Name of applicant       :<?php echo $row['name_applicant'];?></br>
    NIC of applicant        :<?php echo $row['nic_applicant'];?></br>
    Address of applicant    :<?php echo $row['address_applicant'];?></br>
    Mobile number           :<?php echo $row['mobile_applicant'];?></br>
    Landline number         :<?php echo $row['landline_applicant'];?></br>
    email                   :<?php echo $row['email_applicant'];?></br>
    Matter                  :<?php echo $row['matter'];?></br>
    Musical Show            :<?php echo $row['musical_show'];?></br>
    Band                    :<?php echo $row['band'];?></br>
    Singers                 :<?php echo $row['singers'];?></br>
    Guest                   :<?php echo $row['guests'];?></br>
    Audience                :<?php echo $row['audience'];?></br>
    Date of application     :<?php echo $row['date_application'];?></br>
    Time of application     :<?php echo $row['time_application'];?></br>
    Lightning               :<?php echo $row['lightning'];?></br>
    Sound                   :<?php echo $row['sound'];?></br>
    Generators              :<?php echo $row['generators'];?></br>
    Tickets                 :<?php echo $row['tickets'];?></br>
    Controlling security    :<?php echo $row['controlling_sec'];?></br>
    Date submitted          :<?php echo $row['date_submit'];?></br>
    Customer Id             :<?php echo $row['customer_id'];?></br>
    Letter Number           :<?php echo $row['letterNo'];?></br>
    </h5>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
            <?php
                }
            ?>
                        

                    
                </tbody>
            </table>

        </body>
</html>
      
<?php

        include("../verification/connection.php");
        mysqli_select_db($sql,"project");

        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role_id'] == 6)  {



            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Check which button was clicked and perform the appropriate action
                switch (true) {
                  case isset($_POST["approve"]):
                    // Code to approve booking
                    $bookingid = $_POST['bookingid'];
                    $comment = $_POST['comment'];
                    // Perform database update to approve booking
                    $insertSecurity = "UPDATE refundablecharge_process SET csoIs_approve ='1',cso_comment = '$comment' WHERE booking_id = '$bookingid'";
                                
                    $querySecurity = mysqli_query($sql,$insertSecurity);

                    if(!$querySecurity)
                    {
                            die("error".mysqli_error($sql));
                    }

                    else
                    {
                            //
                    }

                    break;
              
                  case isset($_POST["not_Approve"]):
                    // Code to not approve booking

                    $bookingid = $_POST['bookingid'];
                    $comment = $_POST['comment'];

                    // Perform database update to not approve booking
                    $insertSecurity = "UPDATE refundablecharge_process SET csoIs_approve ='0',cso_comment = '$comment' WHERE booking_id = '$bookingid'";
                                
                    $querySecurity = mysqli_query($sql,$insertSecurity);
        
                    if(!$querySecurity)
                    {
                        die("error".mysqli_error($sql));
                    }
        
                    else
                    {
                                //
                    }

                    break;
              
                  default:
                    // Handle other cases if needed
                    break;
                }
              
              }
                
                



        $getbookindata = "SELECT * FROM requestrefund_info INNER JOIN booking_details ON requestrefund_info.customer_id = booking_details.customer_id and requestrefund_info.EventDate = booking_details.date_application";  
        $querygetdata = mysqli_query($sql,$getbookindata);  
        while($row = mysqli_fetch_array($querygetdata))  
        {
?>
          
                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        
    <table class="table table-striped">
    <thead>
    <th>Applicant Name</th>
        <th>Senders Address</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Time</th>
        
        <th>Approval status</th>
        <th>Approval</th>

      </tr>
    </thead>
    <tbody>
      <tr>
                                    <td><?php echo $row['name_applicant']; ?></td>
                                    <td><?php echo $row['address_applicant']; ?></td>
                                    <td><?php echo $row['EventName']; ?></td>
                                    <td><?php echo $row['EventDate']; ?></td>
                                    <td><?php echo $row['EventTime']; ?></td>
                                    
                                    
                       <input type="hidden" name="bookingid" value=<?php echo $row['booking_id']; ?> >

                       <td><textarea id = "comment" name = "comment" ></textarea></td>
                       <td><input type='submit' class='btn btn-info' name="submit" value="Approve">
                       <input type='submit' class='btn btn-info' name="submit" value="Not Approve"></td>

                        
                                   </tr>
                                   </tbody>
            </table>
                                  </form>

<?php
        }   
 }
        
 else{
          echo'<script>alert("You are not authorized this page!")</script>';
          echo '<script type = "text/javascript">';
          echo 'window.location.href = "../verification/index.php";';
          echo '</script>';
        }
               

?>

        </body>
</html>
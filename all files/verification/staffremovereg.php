<?php
require ('connection.php');
mysqli_select_db($sql,"project");
session_start();


    if (isset($_POST['Remove'])) {
        
            $role_id = $_POST['role_id'];
        if ($role_id != 1) {
            $removestaff = "DELETE FROM staff WHERE role_id=$role_id";
            $removestaffquery = mysqli_query($sql, $removestaff);
            $removeuser = "DELETE FROM user WHERE role_id=$role_id";
            $removeuserquery = mysqli_query($sql, $removeuser);
            echo " <script>
                            alert('Successfully Removed.');
                            window.location.href='index.php'
                        </script>";
        }
                        
     else {
        echo" <script>
        alert('Can not Remove!.');
        window.location.href='index.php'
    </script>";
    }
}
?>
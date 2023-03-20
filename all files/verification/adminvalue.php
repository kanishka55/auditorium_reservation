<?php
include("connection.php");

mysqli_select_db($sql,"project");
$sql4=mysqli_query($sql,"INSERT INTO user(username,email,password,role_id,telnum,is_admin,verification_status)VALUES('gayan','gayan@gmail.com','1234','1',0764765123,1,1)");
if(!$sql4){
    die("Cannot insert".mysqli_error());
}
else{
    echo"succeed";
}
?>
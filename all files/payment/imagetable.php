<?php

include("conn.php");
mysqli_select_db($conn,"jobseekers");

//creat tables
$sql1="CREATE TABLE images(image_id int PRIMARY KEY AUTO_INCREMENT,
        file_name varchar(255) COLLATE utf8_unicode_ci NOT NULL, uploaded_on datetime NOT NULL,
        status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1')";//ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
			
mysqli_query($conn,$sql1);



mysqli_close($conn);

?>
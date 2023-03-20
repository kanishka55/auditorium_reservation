<?php 

    require ('connection.php');
    mysqli_select_db($sql,"project");
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
        
        require('PHPmailer/Exception.php');
        require('PHPmailer/SMTP.php');
        require('PHPmailer/PHPMailer.php');

        function sendmail($email,$reset_token){
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = 'thilinipremathilaka97@gmail.com';
            $mail->Password   = 'vzcendzzlmaqzdfe';                    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
            $mail->Port       = 465;                           

            $mail->setFrom('thilinipremathilaka97@gmail.com', 'Test');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'email verification from aatmaninfo';
            $mail->Body    = "Thanks for registration.<br>click the link bellow to reset your password
            <a href='http://localhost/hall-reservation-system/verification/updatePassword.php?email=$email&reset_token=$reset_token'>Reset</a>";

            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }
    }

if (isset($_POST['send-link'])) {
        
    $email = $_POST['email'];

    $reset="SELECT * FROM user WHERE email = '$email'";
    $resetquery = $sql->query($reset);

    if ($resetquery) {
        
        if ($resetrow = $resetquery->fetch_assoc()) {
            
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");

            $sql4 = "UPDATE user SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

            if (($sql->query($sql4)===TRUE) && sendmail($email,$reset_token )===TRUE) {
                    echo "
                        <script>
                            alert('Password reset link send to mail.');
                            window.location.href='index.php'    
                        </script>"; 
                }else{
                    echo "
                        <script>
                            alert('Something got Wrong');
                            window.location.href='forgotPassword.php'
                        </script>";
                }

        }else{
            echo "
                <script>
                    alert('Email Address Not Found');
                    window.location.href='forgotPassword.php'
                </script>";
        }   
        
    }else{
        echo "
            <script>
                alert('Server Down');
                window.location.href='forgotPassword.php'
            </script>";
    }
}
?>
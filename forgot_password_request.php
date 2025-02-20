<?php
session_start();
include 'get_db_connection.php'; 

if (isset($_POST['forgot_password_submit'])) {
    $email = trim($_POST['email']);
    $query = "SELECT * FROM usermaster WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // if (mysqli_num_rows($result) > 0) {
        
    if($result){

        $to = $email;
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $subject = "My subject";
        $message = 'Mail Sent Successfully';
        $headers .= 'From: ' . $email . "\r\n";
        $headers .= 'Cc: kmsplmum4@gmail.com' . "\r\n";

        mail($to,$subject,$message,$headers);

        // Simulate sending OTP to email (you can integrate a real email service)
        //  mail($email, "Your OTP for Password Reset", "Your OTP is: $otp");

        $_SESSION['status_success'] = "OTP has been sent to your email address. $otp";
        header('location: otp_login.php');
        exit;
    } else {
        $_SESSION['status_failed'] = "Email not found. Please try again.";
        header('location: forgot_password_request.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Forgot Password</h3>

                <?php
                if (isset($_SESSION['status_failed'])) {
                    echo "<div class='alert alert-danger'>".$_SESSION['status_failed']."</div>";
                    unset($_SESSION['status_failed']);
                }

                if (isset($_SESSION['status_success'])) {
                    echo "<div class='alert alert-success'>".$_SESSION['status_success']."</div>";
                    unset($_SESSION['status_success']);
                }
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Enter Registered Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <!-- <input type="text" name="otp" value="<?php echo $otp; ?>"> -->
                    <button type="submit" class="btn btn-primary btn-block" name="forgot_password_submit">Send OTP</button>
                </form>

                <div class="text-center mt-3">
                    <a href="login.php">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

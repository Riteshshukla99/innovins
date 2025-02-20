<?php
session_start();
include 'get_db_connection.php';

if (isset($_POST['otp_submit'])) {
    $otp_entered = trim($_POST['otp']);
    
    if ($otp_entered == $_SESSION['otp']) {
        $_SESSION['status_success'] = "OTP verified successfully. You can now reset your password.";
        header('location: reset_password.php');  // Redirect to reset password page
        exit;
    } else {
        $_SESSION['status_failed'] = "Invalid OTP. Please try again.";
        header('location: otp_login.php'); 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Enter OTP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Enter OTP to Reset Password</h3>
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
                        <label for="otp">OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter the OTP" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="otp_submit">Verify OTP</button>
                </form>
                <div class="text-center mt-3">
                    <a href="forgot_password_request.php">Didn't receive OTP? Try again</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

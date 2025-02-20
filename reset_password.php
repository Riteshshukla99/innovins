<?php
session_start();
include 'get_db_connection.php'; 

if (isset($_POST['reset_password_submit'])) {
    $new_password = trim($_POST['new_password']);
    $email        = $_SESSION['email'];

    $query = "UPDATE usermaster SET password = '$new_password' WHERE email = '$email'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['status_success'] = "Password reset successfully. Please login.";
        header('location: login.php');  // Redirect to login page after successful password reset
        exit;
    } else {
        $_SESSION['status_failed'] = "Failed to reset password. Please try again.";
        header('location: reset_password.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Reset Your Password</h3>

                <?php
                if (isset($_SESSION['status_success'])) {
                    echo "<div class='alert alert-success'>".$_SESSION['status_success']."</div>";
                    unset($_SESSION['status_success']);
                }

                if (isset($_SESSION['status_failed'])) {
                    echo "<div class='alert alert-danger'>".$_SESSION['status_failed']."</div>";
                    unset($_SESSION['status_failed']);
                }
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="reset_password_submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include 'get_db_connection.php'; 

if (isset($_POST['login_submit'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM usermaster WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if ($password == $user['password']) {  
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('location: product/product_form.php');
            exit;
        } else {
            $_SESSION['status_failed'] = "Incorrect  User password.";
            header('location: login.php');
            exit;
        }
    } else {
        $_SESSION['status_failed'] = "Username or email does not exist.";
        header('location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Login</h3>

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
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="login_submit">Login</button>
                </form>

                <div class="text-center mt-3">
                    <a href="userragister.php">Don't have an account? Register here</a><br>
                    <a href="forgot_password_request.php">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

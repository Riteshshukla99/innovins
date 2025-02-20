<?php
session_start();
include 'get_db_connection.php';

if (isset($_POST['userragistersubmit'])) {
    $username    = trim($_POST['username']);
    $email       = trim($_POST['email']);
    $password    = trim($_POST['password']);
    $createddate = date('Y-m-d H:i:s');

    $query_check = "SELECT * FROM usermaster WHERE username = '$username' OR email = '$email'";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['status_failed'] = "Username or email already exists. Please choose another.";
        header('location: userragister.php');  
        exit;
    } else {
        // Insert new user into the database
        $query_insert = "INSERT INTO usermaster (username, email, password, createddate, createdby, updateddate, updatedby) 
                         VALUES ('$username', '$email', '$password', '$createddate', 'admin', '$createddate', 'admin')";
                         
        if (mysqli_query($conn, $query_insert)) {
            $_SESSION['status_success'] = "Registration successful. Please login.";
            header('location: userragister.php');  
            exit;
        } else {
            $_SESSION['status_failed'] = "Registration failed. Please try again.";
            header('location: userragister.php'); 
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">User Registration</h3>

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

                <!-- Registration Form -->
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
                    <button type="submit" class="btn btn-primary btn-block" name="userragistersubmit">Save</button>
                </form>

                <div class="text-center mt-3">
                    <!-- Login page -->
                    <a href="login.php">Already have an account? Log in here</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

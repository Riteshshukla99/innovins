<?php
include 'get_db_connection.php';

$id = $_GET['updateid'];

// Fetch existing usermaster details
$sql = "SELECT * FROM usermaster WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$username    = $row['username'];
$email       = $row['email'];
$password    = $row['password'];

if (isset($_POST['submit'])) {
    $username    = trim($_POST['username']);
    $email       = trim($_POST['email']);
    $password    = trim($_POST['password']);

    $updateddate = date('Y-m-d H:i:s');
    $admin       = 'Admin'; 
    
    // Check if the product name already exists
    $query_check = "SELECT * FROM usermaster WHERE username = '$username' AND id != '$id'";
    $query_run_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($query_run_check) > 0) {
        $_SESSION['status_failed'] = "Ragister: $username already exists.";
        header('Location: ragister_update.php?updateid=' . $id);
        exit;
    } else {
    

        $sql1 = "UPDATE usermaster SET username = '$username',email = '$email', password = '$password', 
                                        updateddate = '$updateddate',updatedby = '$admin' WHERE id = $id";

        $ragister_updatequery_run = mysqli_query($conn, $sql1);

        if ($ragister_updatequery_run) {
            $_SESSION['status_success'] = "Ragister details updated successfully.";
            header('Location: ragistershow.php');
            exit;
        } else {
            $_SESSION['status_failed'] = "Ragister update failed. Please try again.";
            header('Location: ragister_update.php?updateid=' . $id);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Ragister</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update Ragister</h2>
        <?php
        session_start();
        if (isset($_SESSION['status_success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['status_success'] . '</div>';
            unset($_SESSION['status_success']);
        }
        if (isset($_SESSION['status_failed'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['status_failed'] . '</div>';
            unset($_SESSION['status_failed']);
        }
        ?>

        <!-- Update form -->
        <form action="" method="POST">
            <div class="row g-3">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                </div>
            </div><br>

                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
require_once "database.php";

if (isset($_GET["token"])) {
    $token = $_GET["token"];

    if (empty($token)) {
        echo "<div class='alert alert-danger'>Invalid token</div>";
    } else {
        // Check if the token exists in the database
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE reset_token = ?");
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Token is valid, allow the user to reset the password
            if (isset($_POST["submit"])) {
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm_password"];
                $errors = array();

                if (empty($password) || empty($confirm_password)) {
                    array_push($errors, "Both password fields are required");
                }

                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }

                if ($password !== $confirm_password) {
                    array_push($errors, "Password does not match");
                }

                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    // Update the password in the database
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = mysqli_prepare($conn, "UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
                    mysqli_stmt_bind_param($stmt, "ss", $password_hash, $token);
                    mysqli_stmt_execute($stmt);

                    echo "<div class='alert alert-success'>Password changed successfully</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid token</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Change Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Please enter your new password</p>
      <form action="../pages/login.php" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Change Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="../pages/login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>

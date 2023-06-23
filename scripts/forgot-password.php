<?php
require_once "database.php";
require_once "mail.php";

if (isset($_POST["submit"])) {
    $email = $_POST["Email"];
    $errors = array();

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Extract the role from the email address
        $emailParts = explode('@', $email);
        $domain = $emailParts[1];
        $role = '';

        if (strpos($domain, 'teacher') !== false) {
            $role = 'teacher';
        } elseif (strpos($domain, 'student') !== false) {
            $role = 'student';
        } elseif (strpos($domain, 'admin') !== false) {
            $role = 'admin';
        }

        if ($role) {
            $tableName = $role . 's';

            // Check if the email exists in the database
            $stmt = mysqli_prepare($conn, "SELECT * FROM $tableName WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                // Generate a random token
                $token = bin2hex(random_bytes(32));

                // Store the token in the database
                $stmt = mysqli_prepare($conn, "UPDATE $tableName SET reset_token = ? WHERE email = ?");
                mysqli_stmt_bind_param($stmt, "ss", $token, $email);
                mysqli_stmt_execute($stmt);

                // Send an email with a password reset link
                $reset_link = "http://localhost/git/projekt_dziennik2/scripts/recover-password.php?token=" . $token;

                $subject = "Password Reset";
                $message = "Click the following link to reset your password: <a href='$reset_link'>$reset_link</a>";

                $mailSent = send_mail($email, $subject, $message);

                if ($mailSent) {
                    echo "<div class='alert alert-success'>Password reset link has been sent to your email</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to send the password reset link. Please try again later.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not exist</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid email format or unrecognized role</div>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password (v2)</title>

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
      <p class="login-box-msg">Zapomniałeś hasła? Tu możesz łatwo je odzyskać.</p>
      <form action="recover-password.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="Email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Poproś o nowe hasło</button>
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

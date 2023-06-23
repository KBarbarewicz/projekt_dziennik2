<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <?php
      if (isset($_POST["submit"]))
      {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["password2"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();

        if (empty($email) OR empty($password) OR empty($confirm_password))
        {
          array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          array_push($errors, "Email is not valid");
        }
        if (strlen($password)<8)
        {
          array_push($errors, "Password must be at least 8 characters long");
        }
        if ($password != $confirm_password)
        {
          array_push($errors, "Password does not match");
        }
        require_once "../scripts/database.php";
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0)
        {
          array_push($errors, "Admin with this email already exists");
        }

        if (count($errors)>0)
        {
          foreach ($errors as $error)
          {
            echo "<div class='alert alert-danger'>$error</div>";
          }
        }
        else
        {
            $sql = "INSERT INTO admin (email, password) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($conn);
          $prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
          if ($prepareSTMT)
          {
            mysqli_stmt_bind_param($stmt, "ss",$email, $password_hash);
            mysqli_stmt_execute($stmt);
          }
          else
          {
            die("Something went wrong");
          }
          $verificationCode = str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            $sql2 = "INSERT INTO verification (code, email) VALUES ( ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql2);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ss",$verificationCode, $email);
                mysqli_stmt_execute($stmt);
            }else{
                die("Something went wrong");
            }
            require_once "../scripts/mail.php";
            $subject = "Email verification";
            $mailSent = send_mail($email, $subject, $verificationCode );
            if ($mailSent) {
                session_start();
                $_SESSION['emailv'] = $email;
                $_SESSION['rolev'] = $role;
                header("Location: verification.php");
                die();
            }else{
                die("Something went wrong");
            }
        }
      }

      ?>

      <form action="admin_register.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Podaj email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Podaj hasło" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Powtórz hasło" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Rejestracja</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
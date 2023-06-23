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
        $name = $_POST["firstName"];
        $surname = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $confirm_password = $_POST["password2"];
        $role = $_POST["role"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();

        if (empty($name) OR empty($surname) OR empty($email) OR empty($phone) OR empty($password) OR empty($confirm_password))
        {
          array_push($errors, "All fields are required");
        }
        if ($role!="student" && $role!="teacher")
        {
          array_push($errors, "You must choose student or teacher role");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          array_push($errors, "Email is not valid");
        }
        if (strlen($password)<8)
        {
          array_push($errors, "Password must be at least 8 characters long");
        }
        if (strlen($phone)!=9)
        {
          array_push($errors, "Your phone number must be 9 characters long");
        }
        if ($password != $confirm_password)
        {
          array_push($errors, "Password does not match");
        }
        require_once "../scripts/database.php";
        $sql = "SELECT * FROM teacher WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        $sql = "SELECT * FROM student WHERE email = '$email'";
        $result2 = mysqli_query($conn, $sql);
        $rowCount2 = mysqli_num_rows($result2);
        if ($rowCount>0 || $rowCount2>0)
        {
          array_push($errors, "Account with this email already exists");
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
          if($role=="teacher"){
            $sql = "INSERT INTO teacher (first_Name, surname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
          }
          else if($role=="student"){
            $sql = "INSERT INTO student (name, surname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
          }
          
          $stmt = mysqli_stmt_init($conn);
          $prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
          if ($prepareSTMT)
          {
            mysqli_stmt_bind_param($stmt, "sssis", $name, $surname, $email, $phone, $password_hash);
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

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Podaj Imię" name="firstName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Podaj Nazwisko" name="lastName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Podaj email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="Podaj nr telefonu" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-phone"></span>
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
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <select name="role">
              <option value="">Select...</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
        </select>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Rejestracja</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="login.php" class="text-center">I already have an account</a>
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

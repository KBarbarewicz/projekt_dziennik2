<?php
session_start();
if(isset($_SESSION["user"]))
{
  if($_SESSION["role"]==1)
  {
    header("Location: admin_index.php");
    die();
  }
  if($_SESSION["role"]==2)
  {
    header("Location: teacher_index.php");
    die();
  }
  if($_SESSION["role"]==3)
  {
    header("Location: student_index.php");
    die();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

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
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
      if (isset($_POST["submit"]))
      {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        require_once "../scripts/database.php";
        $sql = "SELECT * FROM teacher WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user)
        {
          if (password_verify($password, $user["password"]))
          {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["role"] = 2;
            $_SESSION["email"] = $email;
            header("Location: teacher_index.php");
            die();
          }
        }
        else
        {
          echo "<div class='alert alert-danger'>Email or password are incorrect.</div>";
        }
        $sql = "SELECT * FROM student WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user)
        {
          if (password_verify($password, $user["password"]))
          {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["role"] = 3;
            $_SESSION["email"] = $email;
            header("Location: student_index.php");
            die();
          }
        }
        else
        {
          echo "<div class='alert alert-danger'>Email or password are incorrect.</div>";
        }
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user)
        {
          if (password_verify($password, $user["password"]))
          {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["role"] = 1;
            $_SESSION["email"] = $email;
            header("Location: admin_index.php");
            die();
          }
        }
        else
        {
          echo "<div class='alert alert-danger'>Email or password are incorrect.</div>";
        }
      }
      ?>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="Email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
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

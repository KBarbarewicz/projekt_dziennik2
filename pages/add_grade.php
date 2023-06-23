<?php
session_start();
if (!isset($_SESSION["user"]))
{
    header("Location: ../pages/login.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/teacherIndex.css">
  <title>Użytkownicy</title>
</head>
<body>
<h4>School Gradebook</h4>


<?php
  $_SESSION["student"] = $_GET['student_ID'];
?>
<form action="../scripts/grade_add_script.php" method="post">
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="Grade" placeholder="New Grade" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
<div class="container">
        <a href="../scripts/logout.php" class="logoutBtn">Logout</a>
    </div>
<div class="goBackContainer">
        <a href="class_grades.php" class="backBtn">Go Back</a>
    </div>
</body>
</html>
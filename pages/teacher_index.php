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
  <title>Teacher's control panel</title>
</head>
<body>
<h4>School Gradebook</h4>
<h4 class="welcome">Welcome to the teacher's control panel!</h4>
<div class="tableContainer"><table>
  <tr>
    <th class="tableHeaders">Subject</th>
    <th class="tableHeaders">Class</th>
  </tr>
</div>
<?php
  $_SESSION["subject"] = null;
  $email = $_SESSION["email"];
  require_once "../scripts/database.php";
  $sql = "SELECT * FROM teacher t RIGHT JOIN subject s on t.teacher_ID=s.teacher_ID RIGHT JOIN class c on c.class_ID=s.class_ID WHERE t.email='$email';";
  $result = $conn->query($sql);
  while($user = $result->fetch_assoc()){
    echo <<< TABLEUSERS
      <tr>
        <td>$user[subject_Name]</td>
        <td><a href='class_grades.php?subject_ID=$user[subject_ID]'>$user[class_Name]</a></td>
      </tr>
      
TABLEUSERS;
  }
  echo "</table>";
?>
<div class="container">
        <a href="../scripts/logout.php" class="logoutBtn">Logout</a>
    </div>
    <div class="historyContainer">
        <a href="grade_history_teacher.php" class="historyBtn">Grade History</a>
    </div>
</body>
</html>
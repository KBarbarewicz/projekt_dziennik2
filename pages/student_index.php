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
  <title>Student Gadebook</title>
</head>
<body>
<h4>School Gradebook</h4>
<div class="tableContainer"><table>
  <tr>
    <th class="tableHeaders">Subject</th>
    <th class="tableHeaders">Grade</th>
  </tr>
</div>

<?php
  $email = $_SESSION["email"];
  require_once "../scripts/database.php";
  $sql = "SELECT * FROM student s RIGHT JOIN subject s2 on s.class_ID=s2.class_ID WHERE s.email='$email';";
  $result = $conn->query($sql);
  while($user = $result->fetch_assoc()){
    $student_ID = $user['student_ID'];
    $subject_ID = $user['subject_ID'];
    $sql = "SELECT * FROM grade WHERE student_ID=$student_ID AND subject_ID='$subject_ID';";
    $result2 = $conn->query($sql);
    echo '<tr>';
    echo '<td>' . $user['subject_Name'] . '</td>';
    echo  '<td>';
    while($grade = $result2->fetch_assoc()){
          echo  $grade['grade'] ;
          echo '<p>'."   ".'</p>';
    }
    echo '</td>';
    echo '</tr>';
  }
  echo "</table>";
?>
<div class="container">
        <a href="../scripts/logout.php" class="logoutBtn">Logout</a>
    </div>
<div class="historyContainer">
    <a href="grade_history_student.php" class="historyBtn">Grade History</a>
</div>
</body>
</html>
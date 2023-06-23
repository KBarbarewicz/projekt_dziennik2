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
  <title>Student</title>
</head>
<body>
<h4>School Gradebook</h4>
<div class="tableContainer"><table>
  <tr>
    <th class="tableHeaders">Grade_ID</th>
    <th class="tableHeaders">Previous_Grade</th>
	<th class="tableHeaders">New_Grade</th>
    <th class="tableHeaders">Date</th>
  </tr>
</div>
<?php
  $email = $_SESSION["email"];
  require_once "../scripts/database.php";
  $sql = "SELECT * FROM student s RIGHT JOIN grade g on g.student_ID=s.student_ID RIGHT JOIN grade_history gh on gh.grade_ID=g.grade_ID WHERE s.email='$email';";
  $result = $conn->query($sql);
  while($user = $result->fetch_assoc()){
    echo <<< TABLEUSERS
      <tr>
        <td>$user[grade_ID]</td>
        <td>$user[previous_grade]</td>
        <td>$user[new_grade]</td>
        <td>$user[date]</td>
      </tr>
      
TABLEUSERS;
  }
  echo "</table>";
?>
<div class="container">
        <a href="../scripts/logout.php" class="logoutBtn">Logout</a>
    </div>
<div class="goBackContainer">
    <a href="student_index.php" class="backBtn">Go Back</a>
</div>
</body>
</html>
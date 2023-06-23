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
  <link rel="stylesheet" href="../css/adminIndex.css">
  <title>Admin control panel</title>
</head>
<body>
<h4 class="welcome">Welcome to the admin control panel!</h4>
<div class="tableContainer"><table>
  <tr>
    <th class="tableHeaders">Name</th>
    <th class="tableHeaders">Surname</th>
	<th class="tableHeaders">Action</th>
  </tr>
</div>

<?php
  $email = $_SESSION["email"];
  require_once "../scripts/database.php";
  $sql = "SELECT * FROM teacher;";
  $result = $conn->query($sql);
  echo "TEACHERS";
  while($user = $result->fetch_assoc()){
    echo <<< TABLEUSERS
      <tr>
        <td>$user[first_Name]</td>
        <td>$user[surname]</td>
        <td><a href='../scripts/delete_teacher.php?teacher_ID=$user[teacher_ID]'>Delete User</a></td>
      </tr> 
TABLEUSERS;
  }
  echo "</table>";
  echo "STUDENTS";
echo '<table>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Surname</th>';
echo '<th>Action</th>';
echo '</tr>';
$sql = "SELECT * FROM student;";
$result = $conn->query($sql);
while($user = $result->fetch_assoc()){
  echo <<< TABLEUSERS
    <tr>
      <td>$user[name]</td>
      <td>$user[surname]</td>
      <td><a href='../scripts/delete_student.php?student_ID=$user[student_ID]'>Delete User</a></td>
    </tr> 
TABLEUSERS;
}
echo '</table>';
?>
<div class="adminContainer">
        <a href="admin_register.php" class="adminBtn">Add Admin</a>
    </div>
    <div class="registerContainer">
        <a href="register.php" class="registerBtn">Add User</a>
    </div>
<div class="container">
        <a href="../scripts/logout.php" class="logoutBtn">Logout</a>
    </div>
</body>
</html>
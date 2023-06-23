<?php
session_start();
require_once "database.php";
$date = date("Y/m/d");
$sql = "SELECT grade FROM grade WHERE grade_ID = '$_SESSION[grade]';";
$result = $conn->query($sql);
while($gradeid = $result->fetch_assoc()){
    $previous_grade = $gradeid['grade'];
}
$sql = "DELETE FROM grade WHERE grade_id = '$_SESSION[grade]'";
if ($conn->query($sql) === TRUE) {
    $sql = "INSERT INTO grade_history (grade_ID, previous_grade, new_grade, date) VALUES ( ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareSTMT)
    {
        $grade = "DELETED";
        mysqli_stmt_bind_param($stmt, "iiss", $_SESSION["grade"], $previous_grade, $grade, $date);
        mysqli_stmt_execute($stmt);
        header("Location: ../pages/class_grades.php");
        die();
    }
    else
    {
        die("Something went wrong");
    }
}  
else
    {
        die("Something went wrong");
    }
?>
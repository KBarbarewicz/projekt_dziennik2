<?php
session_start();
$grade = $_POST["Grade"];
if($grade == null){
    $_SESSION["error"] = "You must input a new grade";
    header("Location: ../pages/class_grades.php");
    die();
}
require_once "database.php";
$date = date("Y/m/d");
$sql = "SELECT grade FROM grade WHERE grade_ID = '$_SESSION[grade]';";
$result = $conn->query($sql);
while($gradeid = $result->fetch_assoc()){
    $previous_grade = $gradeid['grade'];
}
$sql = "UPDATE grade SET grade=$grade WHERE grade_ID = '$_SESSION[grade]';";
if(mysqli_query($conn, $sql)){
    $sql = "INSERT INTO grade_history (grade_ID, previous_grade, new_grade, date) VALUES ( ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareSTMT)
    {
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
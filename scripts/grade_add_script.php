<?php
session_start();
$grade = $_POST["Grade"];
if($grade == null){
    $_SESSION["error"] = "You must input a grade";
    header("Location: ../pages/class_grades.php");
    die();
}
require_once "database.php";
$date = date("Y/m/d");
$sql = "INSERT INTO grade (student_ID, subject_ID, grade, date) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
$prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
if ($prepareSTMT)
{
    mysqli_stmt_bind_param($stmt, "iiis", $_SESSION["student"], $_SESSION["subject"], $grade, $date);
    mysqli_stmt_execute($stmt);
    $sql = "SELECT MAX(grade_ID) FROM grade;";
    $result = $conn->query($sql);
    while($gradeid = $result->fetch_assoc()){
        $grade_ID = $gradeid['MAX(grade_ID)'];
    }
    $sql = "INSERT INTO grade_history (grade_ID, new_grade, date) VALUES ( ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareSTMT = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareSTMT)
    {
        mysqli_stmt_bind_param($stmt, "iss", $grade_ID, $grade, $date);
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
<?php
session_start();
require_once "database.php";
$student_ID = $_GET["student_ID"];
$sql = "DELETE FROM student WHERE student_ID = $student_ID";
if ($conn->query($sql) === TRUE) {
    header("Location: ../pages/admin_index.php");
    die();
}  
else
    {
        die("Something went wrong");
    }
?>
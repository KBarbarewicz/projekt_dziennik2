<?php
session_start();
require_once "database.php";
$teacher_ID = $_GET["teacher_ID"];
$sql = "DELETE FROM teacher WHERE teacher_ID = $teacher_ID";
if ($conn->query($sql) === TRUE) {
    header("Location: ../pages/admin_index.php");
    die();
}  
else
    {
        die("Something went wrong");
    }
?>
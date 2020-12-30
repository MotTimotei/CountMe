<?php

include_once "includes/connDB.php";

$first_name= mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name= mysqli_real_escape_string($conn, $_POST['last_name']);
$gender= mysqli_real_escape_string($conn, $_POST['gender']);
$phone= mysqli_real_escape_string($conn, $_POST['phone']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$active_status = mysqli_real_escape_string($conn, TRUE);


$sql = "INSERT INTO students (first_name, last_name, gender, phone, email, active_status)
    VALUES ('$first_name', '$last_name', '$gender', '$phone', '$email', '$active_status');";

mysqli_query($conn, $sql);

header("Location: ../students.php?signup=success");

?>
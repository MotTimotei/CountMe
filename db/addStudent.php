<?php
include 'myAutoLoader.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$addStudent = new StudentsController();
$addStudent->createStudent($first_name, $last_name, $gender, $phone, $email);

header("Location: ../students.php?signup=success");



?>
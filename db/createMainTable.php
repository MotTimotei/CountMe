<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bara_Natanael";
$mainTable = "Students";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE $mainTable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(100) NOT NULL,
lastname VARCHAR(100) NOT NULL,
phone VARCHAR(20),
email VARCHAR(50),
programming_language VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
active BOOLEAN
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
//
//$conn->close();
//
//Insert elements into table Students
//
//
//
// 

$firstname = "Timotei Fabian";
$lastname = "Mot";
$phone = "0747039963";
$email = "timoteifabianmot@gmail.com";
$programming_language = "java, JavaScript, Python, HTML, CSS";
$active = false;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO $mainTable (firstname, lastname, phone, email, programming_language, active)
  VALUES ('$firstname', '$lastname', '$phone', '$email', '$programming_language', '$active')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

  include "createSessionTable.php";
?>


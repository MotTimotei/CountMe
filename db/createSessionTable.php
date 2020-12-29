<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bara_Natanael";
$table = "Sessions";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table



$sql = "CREATE TABLE $table (
id_session INT(90) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_student INT(6) NOT NULL,
session_time INT(4) NOT NULL,
price_hour INT(4) NOT NULL,
paid INT(4) NOT NULL,
programming_language VARCHAR(255),
session_data_placed TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
session_data_sch DATETIME,
session_data_act DATETIME,
session_status BOOLEAN
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

#
$id_student = 2;
$session_time = 60;
$price_hour = 45;
$paid = 45;
$programming_language = "Python";
$session_data_sch = '2020-06-13 15:34:00';
$session_data_act = '2020-06-13 15:34:00';
$session_status = 1;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO $table (id_student, session_time, price_hour, paid, programming_language, session_data_sch, session_data_act, session_status)
  VALUES ('$id_student', '$session_time', '$price_hour', '$paid', '$programming_language', '$session_data_sch', '$session_data_act', '$session_status')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>


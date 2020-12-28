<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bara_Natanael";
$table = "programming_languages";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table



$sql = "CREATE TABLE $table (
id_lang INT(90) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
programming_language VARCHAR(100) NOT NULL,
price_hour INT(4)
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
$programming_language = 'C#';
$price_hour = 55;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO $table (programming_language, price_hour)
  VALUES ('$programming_language', '$price_hour')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>


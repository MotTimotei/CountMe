<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bara_natanael";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<ul class="all_students">';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<li payd="yes"><a href="student.php?id='.$row["id"].'">' . $row["id"]. '. ' . $row["last_name"]. " " . $row["first_name"]. '</a></li>';
    }
    echo '</ul>';
} else {
    echo "0 results";
}

$conn->close();
?>
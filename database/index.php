<?php
$servername = "localhost";
$username = "php_user";
$password = "php_user";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, Jmeno, Prijimeni FROM osoby";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Jmeno: " . $row["Jmeno"]. " " . $row["Prijimeni"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 
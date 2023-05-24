<?php
$servername = "localhost";
$username = "php_user";
$password = "php_user";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Jmeno = $_POST['Jmeno'];
$Prijmeni = $_POST['Prijmeni'];

$sql = "SELECT id, Jmeno, Prijmeni FROM osoby";
$result = $conn->query($sql);
?>

<?php
    $required = array('Jmeno', 'Prijmeni');    
    $error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
if ($error) {
  
} else {
    $sql = "INSERT INTO osoby (Jmeno, Prijmeni) VALUES ('$Jmeno','$Prijmeni')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php if ($result->num_rows > 0); ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Jmeno</th>
                <th>Prijmeni</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["Jmeno"]; ?></td>
                    <td><?php echo $row["Prijmeni"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
<form action="" method="post">
    <p>
        <label for="Jmeno">Jmeno:</label>
        <input type="text" name="Jmeno" id="Jmeno">
    </p>
    <p>
        <label for="Prijmeni">Prijmeni:</label>
        <input type="text" name="Prijmeni" id="Prijmeni">
    </p>
    <input type="submit" value="Submit" name="submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
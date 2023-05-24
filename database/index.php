
<?php
$servername = "localhost";
$username = "php_user";
$password = "php_user";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 1); 

$Jmeno = $_POST['Jmeno'];
$Prijmeni = $_POST['Prijmeni'];

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];
    $deleteSql = "DELETE FROM osoby WHERE id = '$deleteId'";
    $conn->query($deleteSql);
}

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
    header("Refresh:0");
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
        body {
            background-color: grey;
        }
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
<center>
    <?php if ($result->num_rows > 0); ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Jmeno</th>
                <th>Prijmeni</th>
                <th>Smazat</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["Jmeno"]; ?></td>
                    <td><?php echo $row["Prijmeni"]; ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="smazat">
                        </form>
                    </td>
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
</center>
</body>
</html>

<?php
$conn->close();
?>
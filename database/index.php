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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <th>Prijimeni</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["Jmeno"]; ?></td>
                    <td><?php echo $row["Prijimeni"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>   
</body>
</html>

<?php
$conn->close();
?>
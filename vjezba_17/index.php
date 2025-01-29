<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezivanje neuspješno: " . $conn->connect_error);
}

$sql = "SELECT users.first_name, users.last_name, countries.name AS country 
        FROM users 
        INNER JOIN countries ON users.country_id = countries.id";

$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <h1>Users</h1>
    <?php
    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<i class="bi bi-person"></i> <strong>' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</strong> (' . htmlspecialchars($row['country']) . ')<br>';
        }
        echo '</ul>';
    } else {
        echo "Nema korisnika.";
    }
    ?>
</body>
</html>

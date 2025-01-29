<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>

    <form action="index.php" method="GET">
        <label for="search">Pretražite:</label>
        <input type="text" name="search">
        <input type="submit">
    </form>

    <?php
    $search = $_GET['search'];
    $conn = mysqli_connect('localhost', 'root', 'root', 'phpweb');
    $query = "SELECT name, lastname FROM users WHERE concat(name, ' ', lastname) like '%$search%'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        echo "<p>" . $row['name'] . " " . $row['lastname'] . "</p>";
    }
    mysqli_close(($conn));
    ?>
    
</body>
</html>

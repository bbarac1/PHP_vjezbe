<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odabir vozila</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Odabir vozila</h1>

    <form action="" method="POST">
        <?php
        echo 'Označite vozilo:<br>';
        echo '<ul>';
        $cars = array("Audi", "BMW", "Honda", "Toyota");
        foreach($cars as $car) {
            echo '<input type="radio" id="'.$car.'" name="car" value="'.$car.'" required>';
            echo '<label for="'.$car.'">'.$car.'</label><br>';
        }
        echo '</ul>';
        ?>
        
        <br>
        <input type="submit" value="Pošalji">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chosenCar = $_POST['car'];
        echo "<p>Odabrali ste: $chosenCar</p>";
    }
    ?>

    

</body>
</html>

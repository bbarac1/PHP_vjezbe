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
            echo '<input type="checkbox" id="'.$car.'" name="cars[]" value="'.$car.'">';
            echo '<label for="'.$car.'">'.$car.'</label><br>';
        }
        echo '</ul>';
        ?>
        
        <br>
        <input type="submit" value="Pošalji">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && !empty($_POST["cars"])) {

        $chosenCars = $_POST['cars'];
        echo '<p>Odabrali ste:</p>'; 
        foreach($chosenCars as $chosenCar) {
            echo "$chosenCar<br>";
        }
    }
    ?>

    

</body>
</html>

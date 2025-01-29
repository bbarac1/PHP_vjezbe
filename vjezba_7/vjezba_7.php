<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun ocjena</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Izračun prosjeka i ocjene</h1>

    <form action="" method="POST">
        <label for="kol1">Ocjena I. kolokvija:</label>
        <input type="number" id="kol1" name="ocjene[]" min="1" max="5" required><br>

        <label for="kol2">Ocjena II. kolokvija:</label>
        <input type="number" id="kol2" name="ocjene[]" min="1" max="5" required><br>

        <input type="submit" value="Izračunaj">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ocjene = $_POST['ocjene'];
        $negativna = false;

        foreach ($ocjene as $ocjena) {
            if ($ocjena < 1 || $ocjena > 5) {
                echo "<p>Ocjene moraju biti između 1 i 5.</p>";
                exit;
            }
            if ($ocjena == 1) {
                $negativna = true;
            }
        }

        if ($negativna) {
            echo "<p>Krajnja ocjena je negativna jer je jedan od kolokvija negativan.</p>";
        } else {
            $prosjek = array_sum($ocjene) / count($ocjene);
            echo "<p>Prosjek ocjena je: $prosjek</p>";
        }
    }
    ?>

</body>
</html>

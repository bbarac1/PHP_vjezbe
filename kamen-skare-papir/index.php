<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kamen, škare, papir</title>
</head>
<body>

  <h1>Kamen, škare, papir</h1>
  <p>Odaberi:</p>
  <form action="" method="POST">
	<input type="hidden" name="kamen" value="kamen">
		<button type="submit" name="choice" value="kamen">
			<img src="rock.png" alt="Kamen" width="100">
		</button>

	<input type="hidden" name="škare" value="škare">
		<button type="submit" name="choice" value="škare">
			<img src="scissors.png" alt="Škare" width="100">
		</button>
		
	<input type="hidden" name="papir" value="papir">
		<button type="submit" name="choice" value="papir">
			<img src="paper.png" alt="Papir" width="100">
		</button>
  </form>

  <?php
  if (isset($_POST['choice'])) {
	$computerChoices = ['kamen', 'škare', 'papir'];
	$computerChoice = $computerChoices[rand(0,2)];
	echo "Računalo je odabralo: $computerChoice<br>";

	$userChoice = $_POST['choice'];
	echo "Odabrali ste: $userChoice<br>";

	if ($userChoice == $computerChoice) {
        echo "Neriješeno!";
    } else if (
        ($userChoice == "kamen" && $computerChoice == "škare") ||
        ($userChoice == "škare" && $computerChoice == "papir") ||
        ($userChoice == "papir" && $computerChoice == "kamen")
    ) {
        echo "Pobijedili ste!";
    } else {
        echo "Pobjednik je Računalo!";
    }
  }
  ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator</title>
</head>
<body>
  <h1>Kalkulator</h1>
  <form action="" method="post">
    <div>
      <label for="prvibroj">Upiši prvi broj*</label>
      <input type="number" id="prvibroj" name="prvibroj" value="<?php echo isset($_POST['prvibroj']) ? $_POST['prvibroj'] : ''; ?>" required>
    </div>
    <br>
    <div>
      <label for="drugibroj">Upiši drugi broj*</label>
      <input type="number" id="drugibroj" name="drugibroj" value="<?php echo isset($_POST['drugibroj']) ? $_POST['drugibroj'] : ''; ?>" required>
    </div>
    <p>Rezultat:
    <?php
    if (isset($_POST['operator'])) {
      $prvibroj = $_POST['prvibroj'];
      $drugibroj = $_POST['drugibroj'];

      switch ($_POST['operator']) {
        case '+':
          echo $prvibroj + $drugibroj;
          break;
        case '-':
          echo $prvibroj - $drugibroj;
          break;
        case '*':
          echo $prvibroj * $drugibroj;
          break;
        case '/':
          echo $drugibroj != 0 ? $prvibroj / $drugibroj : 'Dijeljenje s nulom nije dozvoljeno';
          break;
      }
    }
    ?>
    </p>

    <input type="submit" name="operator" value="+">
    <input type="submit" name="operator" value="-">
    <input type="submit" name="operator" value="*">
    <input type="submit" name="operator" value="/">
  </form>
</body>
</html>

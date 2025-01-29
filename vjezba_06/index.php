<!DOCTYPE html>
    <head>
        <title>Vjezba 6</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Bruno Barac">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <p>Kalkulator (Switch naredba)</p>
        <form action="" method="post">
            <label for="number"><b>Upišite prvi broj: *</b> </label>
            <input type="number" name="number" id="number" required autofocus/>
            <br />
            <br />
            <label for="number2"><b>Upišite drugi broj: *</b> </label>
            <input type="number" name="number2" id="number" required/>
            <br />
            <br />
            <input type="submit" value="+" name="operator">
            <input type="submit" value="-" name="operator">
            <input type="submit" value="*" name="operator">
            <input type="submit" value="/" name="operator">
            </form>

        <?php
          $prviBroj = $_POST["number"];
          $drugiBroj = $_POST["number2"];
          $operator = $_POST["operator"];
          $rezultat = '';

          switch ($operator) {
            case "+":
                $rezultat = $prviBroj + $drugiBroj;
                break;
            case "-":
                $rezultat = $prviBroj - $drugiBroj;
                break;
            case "*":
                $rezultat = $prviBroj * $drugiBroj;
                break;
            case "/":
                $rezultat = $prviBroj / $drugiBroj;
                break;
          }
          print '<p>Rezutat: ' .$rezultat.'</p>'
        ?>
    </body>
    </html>
    <!--vjezba_6.php -->
        
  

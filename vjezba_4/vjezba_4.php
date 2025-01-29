<!DOCTYPE html>
    <head>
        <title>Vjezba 4</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Bruno Barac">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <form action="" method="post">
            <label for="vrijednotA">Unesite vrijednost a: </label>
            <input type="number" name="vrijednostA" id="a" />
            <br />
            <br />
            <label for="vrijednotB">Unesite vrijednost b: </label>
            <input type="number" name="vrijednostB" id="b" />
            <br />
            <br />
            <button type="submit">Pošalji</button>
            </form>
        <?php
            $a = $_POST['vrijednostA'];
            $b = $_POST['vrijednostB'];
            $c = (3 * $a - $b) / 2;

            print '
            <p>Predana vrijednost za a: ' . $a . '</p>
            <p>Predana vrijednost za b: ' . $b . '</p>
            <p> Dobiveno rješnje c = (3*' . $a . '-' .$b . ') / 2 = ' .$c . '</p>'
        ?>
    </body>
    </html>
    <!--vjezba_4.php -->
        
  

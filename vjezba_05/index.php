<!DOCTYPE html>
    <head>
        <title>Vjezba 5</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Bruno Barac">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <p>Igra (pogodi broj)</p>
        <form action="" method="POST" id="calculator">
        <label for="number"><b>Upiši jedan broj od 1 do 10*</b></label>
        <input type="number" name="number" id="number" required autofocus>
        </form>

        <?php
            $randBroj = rand (1, 10);

            if ($_POST["number"] == $randBroj) {
                print '<p style ="color:green;">Pogodatak, probaj ponovno!</p>';
            }
            else {
                print '<p style ="color:red;">Krivo, probaj ponovno!</p>';
            }
            print '<p>Zamišljeni broj je:' .$randBroj.'</p>'
        ?>
    </body>
    </html>
    <!--vjezba_5.php -->
        
  

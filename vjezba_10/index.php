<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Str_word_count</title>
</head>
<body>
    <h1>Count words in string</h1>

    <form action="" method="post">
        <label for="string">Unesite tekst:</label>
        <input type="text" name="string">

        <input type="submit" value="ispiši broj riječi">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['string'];
        $wordCount = str_word_count($input);

        echo "Vaš tekst: <code>$input</code> sadrži $wordCount riječi.";
    }
    ?>
</body>
</html>

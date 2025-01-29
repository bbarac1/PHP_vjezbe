<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezivanje neuspješno: " . $conn->connect_error);
}

$errors = [];
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password_raw = $_POST['password'];
    $country = $_POST['country'];

    if (strlen($username) < 5 || strlen($username) > 10) {
        $errors['username'] = "Username must be between 5 and 10 characters.";
    }

    if (strlen($password_raw) < 4) {
        $errors['password'] = "Password must have at least 4 characters.";
    }

    if (empty($errors)) {
        $password = password_hash($password_raw, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, username, password, country) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $first_name, $last_name, $email, $username, $password, $country);

        if ($stmt->execute()) {
            $success_message = "Registracija uspješna!";
        } else {
            $errors['general'] = "Greška prilikom registracije: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: grey;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #222;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input, select {
            width: 95%;
            padding: 10px;
            margin: 8px 0 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus, select:focus {
            border-color: #76b852;
            outline: none;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }

        button {
            background-color: #76b852;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #679b47;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Registration Form</h2>

        <?php if (!empty($success_message)) : ?>
            <p class="success"><?= $success_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($errors['general'])) : ?>
            <p class="error"><?= $errors['general']; ?></p>
        <?php endif; ?>

        <label for="first_name">First Name *</label>
        <input type="text" id="first_name" name="first_name" placeholder="Your name.." value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>" required>

        <label for="last_name">Last Name *</label>
        <input type="text" id="last_name" name="last_name" placeholder="Your last name.." value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" required>

        <label for="email">Your E-mail *</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail.." value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label for="username">Username:* <span style="color: red;">(Username must have min 5 and max 10 char)</span></label>
        <input type="text" id="username" name="username" placeholder="Username.." value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
        <?php if (!empty($errors['username'])) : ?>
            <p class="error"><?= $errors['username']; ?></p>
        <?php endif; ?>

        <label for="password">Password:* <span style="color: red;">(Password must have min 4 char)</span></label>
        <input type="password" id="password" name="password" placeholder="Password.." required>
        <?php if (!empty($errors['password'])) : ?>
            <p class="error"><?= $errors['password']; ?></p>
        <?php endif; ?>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="" disabled <?= empty($_POST['country']) ? 'selected' : ''; ?>>Please choose</option>
            <option value="Hrvatska" <?= (isset($_POST['country']) && $_POST['country'] == "Hrvatska") ? 'selected' : ''; ?>>Hrvatska</option>
            <option value="Srbija" <?= (isset($_POST['country']) && $_POST['country'] == "Srbija") ? 'selected' : ''; ?>>Srbija</option>
            <option value="Bosnia and Hercegovina" <?= (isset($_POST['country']) && $_POST['country'] == "Bosna i Hercegovina") ? 'selected' : ''; ?>>Bosna i Hercegovina</option>
            <option value="Slovenija" <?= (isset($_POST['country']) && $_POST['country'] == "Slovenija") ? 'selected' : ''; ?>>Slovenija</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

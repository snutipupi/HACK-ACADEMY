<?php
// Inițializăm variabila de eroare
$error = "";

// Verificăm dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectare la baza de date
    require('connect.php');

    // Prelucrarea datelor din formular
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Interogare pentru a verifica existența managerului în baza de date
    $sql = "SELECT * FROM admin WHERE login = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Managerul există în baza de date
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['parola']) {
            // Autentificare reușită! Setăm sesiunea pentru administratorul autentificat
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            
            // Redirectare către pagina de administrare
            header("Location: admin.php");
            exit; // Terminăm executarea scriptului după redirecționare
        } else {
            // Parola introdusă este incorectă
            $error = "Parolă incorectă! Vă rugăm să încercați din nou.";
        }
    } else {
        // Managerul nu există în baza de date
        $error = "Utilizatorul introdus nu există!";
    }

    // Închiderea conexiunii la baza de date
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare Manager</title>
    <style>
        body {
            background-color: #244855;
            color: #90AEDAD;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #E64833;
            text-align: center;
        }

        form {
            width: 80%;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #FBE9D0;
            border-radius: 10px;
        }

        label {
            color: #874F41;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 2px solid #874F41;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            background-color: #E64833;
            color: #FFFFFF;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #D13924;
        }

        .error-message {
            color: #E64833;
            font-size: 14px;
            margin-top: 5px;
            font-weight: bold;
            text-align: center;
    </style>
</head>
<body>
    <h2>Autentificare Manager</h2>
    <!-- Afisarea erorilor -->
    <?php if ($error): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formularul de autentificare -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="username">Utilizator:</label>
        <input type="text" id="username" name="username" autocomplete="off">

        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" autocomplete="off">

        <input type="submit" value="Autentificare">
    </form>
</body>
</html>

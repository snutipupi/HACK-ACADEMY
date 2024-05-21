<?php
// Verificăm dacă utilizatorul este autentificat ca administrator
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Dacă utilizatorul nu este autentificat, îl redirecționăm către pagina de autentificare a administratorului
    header("Location: autentificare_manager.php");
    exit;
}
?>
<style>
     body {
        background-color: #244855;
        color: #90AEDAD;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
</style>

<?php
// Verificăm dacă a fost trimis un ID valid pentru curs
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Conectare la baza de date
    require('connect.php');

    // Prelucrăm datele primite prin metoda GET
    $id_curs = $_GET['id'];

    // Interogare pentru ștergerea cursului din baza de date
    $sql_delete = "DELETE FROM curs WHERE id_curs = $id_curs";

    // Executarea interogării
    if (mysqli_query($conn, $sql_delete)) {
        echo "<p style='font-weight: bold; color: #FBE9D0; text-align: center;'>Cursul a fost șters cu succes!</p>";
    } else {
        echo "<p style='font-weight: bold; color: #E64833; text-align: center;'>Eroare la ștergerea cursului: " . mysqli_error($conn) . "</p>";
    }

    // Închidere conexiune la baza de date
    mysqli_close($conn);
} else {
    echo "<p style='font-weight: bold; color: #E64833; text-align: center;'>ID Curs lipsă sau invalid!</p>";
}
?>

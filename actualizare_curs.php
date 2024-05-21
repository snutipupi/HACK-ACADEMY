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
    form {
        width: 80%;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #FBE9D0;
        border-radius: 10px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #874F41;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 2px solid #874F41;
        border-radius: 5px;
        font-size: 16px;
    }

    textarea {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 2px solid #874F41;
        border-radius: 5px;
        font-size: 16px;
        resize: vertical; /* Permite redimensionarea verticală */
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

    p.message {
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }
</style>

<?php
// Verificăm dacă a fost trimis un ID valid pentru curs
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Conectare la baza de date
    require('connect.php');

    // Prelucrăm datele primite prin metoda GET
    $id_curs = $_GET['id'];

    // Interogare pentru a obține detalii despre cursul cu ID-ul respectiv
    $sql = "SELECT * FROM curs WHERE id_curs = $id_curs";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Afișăm formularul de actualizare
        echo "<form method='post'>";
        echo "<input type='hidden' name='id_curs' value='" . $row['id_curs'] . "'>";
        echo "<label for='denumire'>Denumire Curs:</label>";
        echo "<input type='text' id='denumire' name='denumire' value='" . $row['denumire'] . "' required><br><br>";
        echo "<label for='profesor'>Profesor:</label>";
        echo "<input type='text' id='profesor' name='profesor' value='" . $row['profesor'] . "' required><br><br>";
        echo "<label for='nr_loc_disponibile'>Număr de Locuri Disponibile:</label>";
        echo "<input type='number' id='nr_loc_disponibile' name='nr_loc_disponibile' value='" . $row['nr_loc_disponibile'] . "' required><br><br>";
        echo "<label for='cost_eveniment'>Cost Eveniment:</label>";
        echo "<input type='number' id='cost_eveniment' name='cost_eveniment' step='0.01' value='" . $row['cost_eveniment'] . "' required><br><br>";
        echo "<label for='descriere_curs'>Descriere Curs:</label>";
        echo "<textarea id='descriere_curs' name='descriere_curs' rows='6' required>" . $row['descriere_curs'] . "</textarea><br><br>";
        echo "<input type='submit' value='Actualizează'>";
        echo "</form>";

        // Verificăm dacă formularul a fost trimis pentru actualizare
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prelucrăm datele primite prin metoda POST
            $denumire = $_POST['denumire'];
            $profesor = $_POST['profesor'];
            $nr_loc_disponibile = $_POST['nr_loc_disponibile'];
            $cost_eveniment = $_POST['cost_eveniment'];
            $descriere_curs = $_POST['descriere_curs'];

            // Interogare pentru actualizarea cursului în baza de date
            $sql_update = "UPDATE curs SET denumire='$denumire', profesor='$profesor', nr_loc_disponibile='$nr_loc_disponibile', cost_eveniment='$cost_eveniment', descriere_curs='$descriere_curs' WHERE id_curs='$id_curs'";

            // Executarea interogării
            if (mysqli_query($conn, $sql_update)) {
                echo "<p class='message' style='color: #FBE9D0;'>Cursul a fost actualizat cu succes!</p>";
            } else {
                echo "<p class='message' style='color: #E64833;'>Eroare la actualizarea cursului: " . mysqli_error($conn) . "</p>";
            }
        }
    } else {
        echo "<p class='message' style='color: #E64833;'>Cursul nu a fost găsit!</p>";
    }

    // Închidere conexiune la baza de date
    mysqli_close($conn);
} else {
    echo "<p class='message' style='color: #E64833;'>ID Curs lipsă sau invalid!</p>";
}
?>

<?php
// Verificăm dacă utilizatorul este autentificat ca administrator
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Dacă utilizatorul nu este autentificat, îl redirecționăm către pagina de autentificare a administratorului
    header("Location: autentificare_manager.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Admin</title>
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
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #FBE9D0;
            border-radius: 10px;
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

        h2 {
            color: #E64833;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #874F41;
            text-align: center;
        }

        td{
            background-color: #FBE9D0;
        }

        th {
            background-color: #E64833;
            color: #FFFFFF;
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

    </style>
</head>
<body>
    <h2>Adăugare Curs Nou</h2>
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="denumire">Denumire Curs:</label>
        <input type="text" id="denumire" name="denumire" required><br><br>

        <label for="profesor">Profesor:</label>
        <input type="text" id="profesor" name="profesor" required><br><br>

        <label for="nr_loc_disponibile">Număr de Locuri Disponibile:</label>
        <input type="number" id="nr_loc_disponibile" name="nr_loc_disponibile" required><br><br>

        <label for="descriere">Descriere Curs:</label>
        <textarea id="descriere" name="descriere" required></textarea><br><br>

        <label for="cost_eveniment">Pret:</label>
        <input type="number" id="cost_eveniment" name="cost_eveniment" step="0.01" required><br><br>

        <input type="submit" value="Adaugă Curs">
    </form>

    <?php
    // Verifica dacă formularul a fost trimis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectare la baza de date
        require('connect.php');

        // Prelucrarea datelor din formular
        $denumire = $_POST['denumire'];
        $profesor = $_POST['profesor'];
        $nr_loc_disponibile = $_POST['nr_loc_disponibile'];
        $descriere = $_POST['descriere']; 
        $cost_eveniment = $_POST['cost_eveniment'];

        // Interogare SQL pentru inserarea datelor în tabelul cursuri
        $sql = "INSERT INTO curs (denumire, profesor, nr_loc_disponibile, cost_eveniment, descriere) 
                VALUES ('$denumire', '$profesor', '$nr_loc_disponibile', '$cost_eveniment', '$descriere')";

        // Executarea interogării
        if (mysqli_query($conn, $sql)) {
            echo "<p style='font-weight: bold; color: #FBE9D0; text-align: center;'>Cursul a fost adăugat cu succes în baza de date!";
        } else {
            echo "<p style='font-weight: bold; color: #E64833; text-align: center;'>Eroare la adăugarea cursului în baza de date: " . mysqli_error($conn);
        }

        // Închidere conexiune la baza de date
        mysqli_close($conn);
    }
    ?>


    <h2>Copiii Înscriși la Cursuri</h2>
    <table>
        <thead>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Email</th>
                <th>Număr de Telefon</th>
                <th>Vârstă</th>
                <th>Curs</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conectare la baza de date
            require('connect.php');

            // Interogare pentru a obține copiii înscriși la cursuri
            $sql = "SELECT s.nume, s.prenume, s.email, s.nr_telefon, s.varsta, c.denumire AS curs
            FROM student s
            INNER JOIN inscriere_curs ic ON s.id_student = ic.id_student
            INNER JOIN curs c ON ic.id_curs = c.id_curs;
            ";
            $result = mysqli_query($conn, $sql);

            // Afisarea datelor în tabel
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nume'] . "</td>";
                    echo "<td>" . $row['prenume'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['nr_telefon'] . "</td>";
                    echo "<td>" . $row['varsta'] . "</td>";
                    echo "<td>" . $row['curs'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nu există copii înscriși la cursuri</td></tr>";
            }

            // Închiderea conexiunii la baza de date
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <h2>Actualizare / Ștergere Cursuri</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Denumire Curs</th>
                <th>Profesor</th>
                <th>Locuri Disponibile</th>
                <th>Cost Eveniment</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conectare la baza de date
            require('connect.php');

            // Interogare pentru a obține cursurile existente
            $sql = "SELECT * FROM curs";
            $result = mysqli_query($conn, $sql);

            // Afisarea datelor în tabel
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_curs'] . "</td>";
                    echo "<td>" . $row['denumire'] . "</td>";
                    echo "<td>" . $row['profesor'] . "</td>";
                    echo "<td>" . $row['nr_loc_disponibile'] . "</td>";
                    echo "<td>" . $row['cost_eveniment'] . "</td>";
                    echo "<td>";
                    echo "<a href='actualizare_curs.php?id=" . $row['id_curs'] . "'>Actualizare</a> | ";
                    echo "<a href='stergere_curs.php?id=" . $row['id_curs'] . "' onclick=\"return confirm('Sunteți sigur că doriți să ștergeți acest curs?')\">Ștergere</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nu există cursuri disponibile</td></tr>"; // Modificăm colspan pentru noua coloană adăugată
            }


            // Închiderea conexiunii la baza de date
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <form action="logout.php" method="post">
    <input type="submit" value="Logout">
    </form>


</body>
</html>

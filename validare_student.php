<?php
// Funcția pentru eliminarea simbolurilor inutile și a caracterele speciale
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Inițializăm variabilele pentru stocarea erorilor
$numeErr = $prenumeErr = $adresaErr = $codPostalErr = $nrTelefonErr = $emailErr = "";

// Inițializăm variabilele pentru stocarea datelor
$nume = $prenume = $adresa = $codPostal = $nrTelefon = $email = "";

// Verificăm dacă s-au trimis date prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificăm numele
    if (empty($_POST["nume"])) {
        $numeErr = "Numele este obligatoriu!";
    } else {
        $nume = test_input($_POST["nume"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$nume)) {
            $numeErr = "Doar litere și spații sunt permise!";
        }
    }

    // Verificăm prenumele
    if (empty($_POST["prenume"])) {
        $prenumeErr = "Prenumele este obligatoriu!";
    } else {
        $prenume = test_input($_POST["prenume"]);
        // Verificăm dacă prenumele conține doar litere și spații
        if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
            $prenumeErr = "Doar litere și spații sunt permise!";
        }
    }

    // Verificăm adresa de email
    if (empty($_POST["email"])) {
        $emailErr = "Adresa de email este obligatorie!";
    } else {
        $email = test_input($_POST["email"]);
        // Verificăm dacă adresa de email este validă
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format de email invalid!";
        }
    }

    // Verificăm numărul de telefon
    if (empty($_POST["nr_telefon"])) {
        $nr_telefonErr = "Numărul de telefon este obligatoriu!";
    } else {
        $nr_telefon = test_input($_POST["nr_telefon"]);
        // Verificăm dacă numărul de telefon respectă un format specific
        if (!preg_match("/^[0-9]{9}$/",$nr_telefon)) {
            $nr_telefonErr = "Format de număr de telefon invalid!";
        }
    }


    // Dacă nu există erori, putem procesa datele
    if (empty($numeErr) && empty($prenumeErr) && empty($emailErr) && empty($nr_telefonErr) && empty($varstaErr) && empty($cursErr) && empty($data_inscriereErr)) {
        // Procesăm datele și le introducem în baza de date

        // Conectăm la baza de date
        require('connect.php');

        // Query pentru inserarea datelor în tabelul student
        $sql_student = "INSERT INTO student (nume, prenume, email, nr_telefon, varsta) 
                        VALUES ('$nume', '$prenume', '$email', '$nr_telefon', '$varsta')";

        // Executăm query-ul pentru student
        if (mysqli_query($conn, $sql_student)) {
            echo "<p style='font-weight: bold; color: #FBE9D0; text-align: center;'>Înregistrare student realizată cu succes!";
        } else {
            echo "<p style='font-weight: bold; color: #E64833; text-align: center;'>Eroare la înregistrare student: " . mysqli_error($conn);
        }

        // Preluați ID-ul studentului inserat
        $id_student = mysqli_insert_id($conn);

        // Query pentru inserarea datelor în tabelul inscriere_curs
        $sql_inscriere = "INSERT INTO inscriere_curs (data_inscriere, id_student, id_curs) 
                          VALUES ('$data_inscriere', '$id_student', '$curs')";

        // Executăm query-ul pentru inscriere
        if (mysqli_query($conn, $sql_inscriere)) {
            echo "<p style='font-weight: bold; color: #FBE9D0; text-align: center;'>Înregistrare înscriere la curs realizată cu succes!";
        } else {
            echo "<p style='font-weight: bold; color: #E64833; text-align: center;'>Eroare la înregistrare înscriere la curs: " . mysqli_error($conn);
        }

        // Închidem conexiunea la baza de date
        mysqli_close($conn);
    }
}

?>

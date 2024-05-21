<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular de Înscriere la Curs</title>
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

        label {
            color: #874F41;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select {
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

        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 2px solid #874F41;
            border-radius: 5px;
            font-size: 16px;
        }

        .error {
            color: #E64833;
            font-size: 14px;
            margin-top: 5px;
            font-weight: bold;
            text-align: center;
    </style>
</head>
<body>
    <h2>Înscriere la Curs</h2>
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="nume">Nume:</label>
        <input type="text" id="nume" name="nume" value="<?php echo $nume; ?>" autocomplete = "off" >
        <span class="error">* <?php echo $numeErr; ?></span>
        <br><br>

        <label for="prenume">Prenume:</label>
        <input type="text" id="prenume" name="prenume" value="<?php echo $prenume; ?>" autocomplete = "off">
        <span class="error">* <?php echo $prenumeErr; ?></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" autocomplete = "off">
        <span class="error">* <?php echo $emailErr; ?></span><br><br>

        <label for="nr_telefon">Număr de Telefon:</label>
        <input type="tel" id="nr_telefon" name="nr_telefon" value="<?php echo $nr_telefon; ?>" autocomplete = "off">
        <span class="error">* <?php echo $nr_telefonErr; ?></span><br><br>

        <label for="varsta">Vârstă:</label>
        <input type="number" id="varsta" name="varsta" value="<?php echo $varsta; ?>" autocomplete = "off">
        <span class="error">* <?php echo $varstaErr; ?></span><br><br>

        <label for="curs">Curs:</label>
        <select id="curs" name="curs">
            <option value="">Selectează un curs</option>
            <?php
            // Conectare la baza de date
            require ('connect.php');

            // Interogare pentru a obține cursurile disponibile
            $sql = "SELECT id_curs, denumire FROM curs";
            $result = mysqli_query($conn, $sql);

            // Afisarea optiunilor de curs in dropdown
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($curs) && $curs == $row['id_curs']) ? 'selected' : '';
                    echo "<option value='" . $row['id_curs'] . "' $selected>" . $row['denumire'] . "</option>";
                }
            } else {
                echo "<option value=''>Nu există cursuri disponibile</option>";
            }

            // Închiderea conexiunii la baza de date
            mysqli_close($conn);
            ?>
        </select>
        <span class="error">* <?php echo $cursErr; ?></span><br><br>

        <label for="data_inscriere">Data înscriere:</label>
        <input type="date" id="data_inscriere" name="data_inscriere" value="<?php echo $data_inscriere; ?>">
        <span class="error">* <?php echo $data_inscriereErr; ?></span><br><br>

        <input type="submit" value="Trimite">
    </form>
</body>
</html>





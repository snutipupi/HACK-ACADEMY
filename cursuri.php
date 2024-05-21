<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principală</title>
    <style>
        body {
            background-color: #244855;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #f4f4f4;
            padding: 15px;
            text-align: center;
        }

        nav {
            background-color: #D13924;
            color: #FBE9D0;
            font-weight: bold;
            padding: 20px;
            text-align: center;
        }

        nav a {
            color: #FBE9D0;
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }


        .course-container {
            text-align: left;
            margin-top: 50px;
        }

        .course {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #FBE9D0;
        }

        .course h3 {
            color: #874F41;
        }

        .course p {
            margin-top: 10px;
        }

        .course-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #E64833;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .course-btn:hover {
            background-color: #D13924;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>HACKACADEMY</h1>
    </header>

     <nav>
        <a href="acasa.php">ACASĂ</a>
        <a href="cursuri.php">CURSURI</a>
        <a href="contact.php">CONTACT</a>
        <a href="autentificare_manager.php">LOGARE</a>
    </nav>

    <main>
        <div class="course-container">
            <?php
            // Conectare la baza de date
            require('connect.php');

            // Interogare pentru a obține cursurile existente
            $sql = "SELECT * FROM curs";
            $result = mysqli_query($conn, $sql);

            // Verificăm dacă există cursuri în baza de date
            if (mysqli_num_rows($result) > 0) {
                // Parcurgem fiecare rând din rezultatul interogării
                while ($row = mysqli_fetch_assoc($result)) {
                    // Afișăm informațiile despre curs într-un container HTML
                    echo "<div class='course'>";
                    echo "<h3>" . $row['denumire'] . "</h3>";
                    echo "<p>" . $row['descriere_curs'] . "</p>";
                    echo "<a href='student.php' class='course-btn'>Înscrie-te la curs</a>";
                    echo "</div>";
                }
            } else {
                // Dacă nu există cursuri în baza de date, afișăm un mesaj corespunzător
                echo "<p>Nu există cursuri disponibile momentan.</p>";
            }

            // Închidem conexiunea la baza de date
            mysqli_close($conn);
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 HackAcademy</p>
    </footer>
</body>
</html>

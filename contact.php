<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
            margin: 15px auto;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            width: 100%;
        }

        h2 {
            color: #874F41;
            text-align: center;
        }

        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
            margin-bottom: 40px;
         }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .contact-section {
            margin-top: 50px;
            text-align: center;
        }

        .contact-section h2 {
            color: #874F41;        }

        .contact-list {
            list-style: none;
            padding: 0;
        }

        .contact-list li {
            margin-bottom: 10px;
        }

        .contact-list li:last-child {
            margin-bottom: 0;
        }

        .contact-list li:before {
            content: "\2022"; 
            color: #E64833;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        section {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #FBE9D0;
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
    <section class="contact-section">
        <h2>Contactează-ne</h2>
        <p>Pentru orice întrebări sau informații suplimentare, nu ezita să ne contactezi folosind detaliile de mai jos:</p>
        <ul class="contact-list">
            <li>Email: contact@hackacademy.com</li>
            <li>Telefon: +37368467826</li>
            <li>Adresă: Strada Mihai Eminescu 30</li>
        </ul>
    </section>
    <section>
    <h2>Locația Noastră</h2>
    <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2720.147653387823!2d28.8289655756738!3d47.017706671141916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97c2e48cb4b17%3A0x286dd6f5ff94340b!2zU3RyYWRhIE1paGFpIEVtaW5lc2N1IDMwLCBNRC0yMDE5LCBDaGnImWluxIN1LCDQnNC-0LvQtNC-0LLQsA!5e0!3m2!1sru!2s!4v1713809190098!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

</main>

    <footer>
        <p>&copy; 2024 HackAcademy</p>
    </footer>
</body>
</html>

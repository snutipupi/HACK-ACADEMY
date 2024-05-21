<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acasă</title>
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
            flex: 1; /* Face ca elementul <main> să crească pentru a ocupa spațiul disponibil, fără a depăși înălțimea maximă */
            max-width: 800px;
            margin: 20px auto;
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

        img {
        max-width: 100%; 
        height: auto; 
        margin: 20px auto; 
        display: block; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /
        }

        p {
        line-height: 1.6;
        font-size: 16px;
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
    <section>
        <h2>Istoria HackAcademy</h2>
        <p>HackAcademy a fost fondată în anul 2010 de către John Doe și Jane Smith, doi entuziaști ai tehnologiei cu o viziune comună. Ideea lor a fost simplă, dar ambițioasă: să ofere o platformă online de învățare pentru cursurile de programare și dezvoltare web. Cu un început modest, dar plin de determinare, au pus bazele unei inițiative care urma să schimbe peisajul educațional în domeniul tehnologiei.</p>
        <p>De-a lungul anilor, HackAcademy a cunoscut o creștere rapidă și constantă. Cu ajutorul unei echipe dedicate și a unei abordări inovatoare, platforma a devenit un punct de referință în industria e-learning-ului. Ceea ce a început ca un proiect pasionat s-a transformat într-o comunitate globală de învățare, conectând aspiranții programatori și dezvoltatori web din întreaga lume.</p>
        <p>Astăzi, HackAcademy este recunoscută ca una dintre cele mai respectate și apreciate platforme de învățare online în domeniul programării și dezvoltării software. Cu o varietate de cursuri, resurse și instrumente de învățare, ne angajăm să oferim o experiență educațională de înaltă calitate, accesibilă pentru toți cei care doresc să-și dezvolte abilitățile în domeniul tehnologic.</p>
        <img src="poze/logo.jpg" alt="logo">
    </section>

    <section>
        <h2>Fondatorii Noștri</h2>
        <p>John Doe și Jane Smith sunt numele din spatele HackAcademy. Cu o pasiune împărtășită pentru programare și o experiență vastă în domeniul educației, au decis să-și combine cunoștințele și abilitățile pentru a crea o platformă inovatoare de învățare. Obiectivul lor a fost clar: să ofere oportunități accesibile și de înaltă calitate pentru toți cei care doresc să-și dezvolte competențele tehnice.</p>
        <p>Cu o viziune comună și o determinare puternică, John și Jane au lucrat din greu pentru a construi o comunitate educațională solidă și incluzivă. Împreună, au adus la viață o platformă care să inspire, să educe și să pregătească viitoarea generație de programatori și dezvoltatori web pentru provocările și oportunitățile din lumea digitală în continuă evoluție.</p>
        <img src="poze/fond.jpeg" alt="fondatorii">
    </section>

    <section>
        <h2>Misiunea Noastră</h2>
        <p>La HackAcademy, ne-am asumat misiunea de a face educația în programare și dezvoltare web accesibilă pentru toți. Ne dorim să fie simplu pentru oameni de toate vârstele și de la diverse fundații să învețe și să se dezvolte în domeniul tehnologic. </p>
        <p>Cu această viziune în minte, ne străduim să oferim cursuri de cea mai înaltă calitate, actualizate în permanență pentru a reflecta ultimele tendințe și tehnologii din industrie.Indiferent dacă cineva dorește să-și schimbe cariera sau să-și îmbunătățească competențele actuale, HackAcademy este aici pentru a oferi suport și îndrumare în călătoria lor de învățare.</p>
    </section>
    </main>
    <footer>
        <p>&copy; 2024 HackAcademy</p>
    </footer>
</body>
</html>

<?php
// Începe sesiunea
session_start();

// Distrugem toate datele de sesiune
$_SESSION = array();

// Ștergem cookie-ul de sesiune, dacă există
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Distrugem sesiunea
session_destroy();

// Redirecționăm către pagina de autentificare a administratorului sau către altă pagină după logout
header("location: autentificare_manager.php");
exit;
?>

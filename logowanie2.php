<?php
    include 'konfiguracja.php';

    $haslo = hash("sha256", $_GET["pwd"]);
    $mysqli = new mysqli($bazaAdres, $bazaLogin, $basaHaslo, $bazaNazwa);

    if ($mysqli->connect_error) die("Błąd połączenia");

    $stmt = $mysqli->prepare("SELECT haslo FROM uzytkownicy WHERE login = ?");
    $stmt->bind_param("s", $_GET["lgn"]);
    $stmt->execute();
    $stmt->bind_result($dbHaslo);

    if ($stmt->fetch() && $haslo === $dbHaslo) {
        setcookie('login', $_GET["lgn"], time() + 3600 * 24);
        setcookie('haslo', $haslo, time() + 3600 * 24);
        header("Location: menu.php");
    } else {
        header("Location: logowanie.php");
    }

    $stmt->close();
    $mysqli->close();
    die();
?>
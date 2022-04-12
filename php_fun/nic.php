<?php
    // If there is no data -> end of script
    if (!isset($_POST['login']) || !isset($_POST['haslo'])) exit;

    $login=trim($_POST['login']);
    $haslo=trim($_POST['haslo']);

    // Checking is there w problem with login or password
    if (empty($login) || empty($haslo)) {
        echo 'Brak loginu lub hasła!';
        exit;
    }

    $mysql=mysqli_connect('localhost','admin','admin123');

    // Connection with MySQL
    if (!$mysql) {
        echo 'Brak połączenia z MySQL!';
        exit;
    }

    $baza=mysqli_select_db($mysql,'uzytkownicy');

    // Picking right database
    if (!$baza) {
        echo 'Brak połączenia z bazą uzytkowników!';
        exit;
    }

    $haslo=sha1($haslo); // Encrypting password
    
    // Finding right row 
    $zapytanie="select count(*) from hasla where uzytkownik='$login' and haslo='$haslo'";
    $wynik=mysqli_query($mysql,$zapytanie);
    if (!$wynik) {
        echo 'Błąd w wykonaniu zaytania!';
        exit;
    }

    $wiersz=mysqli_fetch_row($wynik);
    $ile_znaleziono=$wiersz[0];
    if ($ile_znaleziono>0) {
        echo 'Jesteś zalogowany';
    } else {
        echo 'Podałeś błędny login lub hasło!';
    }     
?> 
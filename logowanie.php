<?php
    session_start();
?>

<div class="wysrodkowanie">
<?php

    if (!isset($_POST['loginUser']) || !isset($_POST['loginPassword'])) exit;

    $login = trim($_POST['loginUser']);
    $haslo = trim($_POST['loginPassword']);

    require('php_fun/sql_login.php');

    $haslo = sha1($haslo); // encrypting password

    // Logging in administrator
    $zapytanie_spec = "SELECT count(*) FROM uzytk_spec WHERE uzytkownik='$login' AND haslo='$haslo'";
    $wynik = mysqli_query($conn, $zapytanie_spec);
    
    $wiersz=mysqli_fetch_row($wynik);
    $ile_znaleziono=$wiersz[0];

    if ($ile_znaleziono > 0) {
        $zapytanie_osoba = "SELECT uzytkownik FROM uzytk_spec WHERE uzytkownik='$login' AND haslo='$haslo';";
        $wynik_osoba = mysqli_query($conn, $zapytanie_osoba);
        $osoba = mysqli_fetch_row($wynik_osoba);

        setcookie("loginob", $osoba[0], time()+60);
        $_SESSION['user'] = $_POST['loginUser'];

        echo '<script language="JavaScript" type="text/javascript">
            location.href="index.php?strona=diagram";
        </script>';
        exit;
    }

    // Logging in normal user
    $zapytanie = "SELECT count(*) FROM klasa WHERE login='$login' AND haslo='$haslo'";
    $wynik = mysqli_query($conn, $zapytanie);
    
    $wiersz=mysqli_fetch_row($wynik);
    $ile_znaleziono=$wiersz[0];

    if ($ile_znaleziono > 0) {
        $zapytanie_osoba = "SELECT osoba FROM klasa WHERE login='$login' AND haslo='$haslo';";
        $wynik_osoba = mysqli_query($conn, $zapytanie_osoba);
        $osoba = mysqli_fetch_row($wynik_osoba);
        //echo 'Jesteś zalogowany';
        
        setcookie("loginob", $osoba[0], time()+60);
        $_SESSION['user'] = $_POST['loginUser'];

        echo '<script language="JavaScript" type="text/javascript">
            location.href="index.php?strona=pytania_diag";
        </script>';
    } else {
        echo '<h2><a href="index.php"> Błędne Hasło lub Użytkownik! </a></h2>';
    }

    mysqli_close($conn);
?>
</div>
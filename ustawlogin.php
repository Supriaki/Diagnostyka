<?php

$nrdzienniku = trim($_POST['nrReg']);
$login = trim($_POST['loginReg']);
$haslo = trim($_POST['hasloReg']);

// $nrdzienniku = "1";
// $login = "dupaa";
// $haslo = "qwertyy";

if (strlen($haslo) <= 4) {
    echo '<a href="index.php"><div class="wysrodkowanie"><h1>Hasło jest za krótkie!!</h1></div></a>';
    // echo '<script language="JavaScript" type="text/javascript">
    //         location.href="index.php";
    //     </script>';
    exit;
}

require('php_fun/sql_login.php');
require('php_fun/set_fun.php');

$aktywna_baza = getTableName();

$haslo = sha1($haslo); // encrypting password

// We are checking if there is a somone with that login and number
$zapytanie_czyjest = "SELECT osoba, login FROM $aktywna_baza WHERE osoba='$nrdzienniku' AND login='$login';";
$wynik_czy_jest = mysqli_query($conn, $zapytanie_czyjest);

// If there is -> change password
// If not -> Make that account
if($wynik_czy_jest) {
    $zapytanie_zmiana_hasl = "UPDATE $aktywna_baza SET haslo='$haslo' WHERE login='$login' AND osoba='$nrdzienniku';";
    $wynik_zmiana_hasl = mysqli_query($conn, $zapytanie_zmiana_hasl);
    if($wynik_zmiana_hasl){
        echo '<a href="index.php"><div class="wysrodkowanie"><h1>Ustawiono nowe hasło!</h1></div></a>';
    } else {
        echo '<a href="index.php"><div class="wysrodkowanie"><h1>Nie ustawiono nowego hasła.</h1></div></a>';
    }
} else {
    $zapytanie_twrz_konto = "INSERT INTO $aktywna_baza VALUES ('','$nrdzienniku','$login','$haslo','','','');";
    $wynik_utworz_konta = mysqli_query($conn, $zapytanie_twrz_konto);
    if ($wynik_utworz_konta ){
        echo '<a href="index.php"><div class="wysrodkowanie"><h1>Utworzono konto!</h1></div></a>';
    } else {
        echo '<a href="index.php"><div class="wysrodkowanie"><h1>Nie utworzono konta.</h1></div></a>';
    }
}

?>
<?php

$nrdzienniku = trim($_POST['nrReg']);
$login = trim($_POST['loginReg']);
$haslo = trim($_POST['hasloReg']);

if (strlen($haslo) <= 4) {
    echo '<div class="wysrodkowanie"><h1>Hasło jest za krótkie!!</h1></div>';
    // echo '<script language="JavaScript" type="text/javascript">
    //         location.href="index.php";
    //     </script>';
    exit;
}

require('php_fun/sql_login.php');
require('php_fun/set_fun.php');

$aktywna_baza = getTableName();

$haslo = sha1($haslo); // encrypting password

// We are checking if there is a somone with that login and nr
$zapytanie_czyjest = "SELECT osoba, login FROM $aktywna_baza WHERE osoba=`$nrdz` AND login=`$login`;";
$wynik = mysqli_query($conn, $zapytanie_czyjest);

// If there is -> change password
// If not -> Make that account
if($wynik) {
    $zapytanie_twrz = "UPDATE $aktywna_baza SET haslo=`$haslo` WHERE login=`$login` AND osoba=`$nrdzienniku`;";
    $wynik = mysqli_query($conn, $zapytanie_twrz);
    echo '<div class="wysrodkowanie"><h1>Ustawiono nowe hasło!</h1></div>';
} else {
    $zapytanie_twrz = "INSERT INTO $aktywna_baza (osoba, login, haslo) VALUES (`$nrdzienniku`,`$login`,`$haslo`);";
    $wynik = mysqli_query($conn, $zapytanie_twrz);
    echo '<div class="wysrodkowanie"><h1>Utworzono konto!</h1></div>';
}

?>
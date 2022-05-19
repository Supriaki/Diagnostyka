<?php 
    session_start();

    // Checking if session is enabled
    if(!isset($_SESSION['user'])) {
        echo '<script language="JavaScript" type="text/javascript">
                 location.href="index.php";
            </script>';
    } else {
?>

<div class="wysrodkowanie">
<?php
    require("php_fun/sql_login.php");
    require('php_fun/set_fun.php');

    $kolega1 = $_POST["koledzy1"];
    $kolega2 = $_POST["koledzy2"];
    $kolega3 = $_POST["koledzy3"];
    $osoba = $_COOKIE['loginob'];
    $tabelka = getTableName();
    
    $zapytanie_spec = "UPDATE `$tabelka` SET `1wybor`='$kolega1',`2wybor`='$kolega2',`3wybor`='$kolega3' WHERE `osoba` = '$osoba';";
    $wynik = mysqli_query($conn, $zapytanie_spec);

    if ($wynik){
        echo '<h2><a href="index.php">Pozytywnie dodano Twoje odpowiedzi! Dziekujemy.</a></h2>';
    } else {
        echo '<h2><a href="index.php">Coś poszło nie tak, nie dodano Twoich odpowiedzi. Przepraszamy.</a></h2>';
    }

    mysqli_close($conn);

    // Loging off
    session_destroy();
    if (isset($_COOKIE['loginob'])) {
        setcookie('loginob', '', time() - 3600, '/'); // empty value and old timestamp
        unset($_COOKIE['loginob']);
    }
?>
</div>

<?php
    }
?>
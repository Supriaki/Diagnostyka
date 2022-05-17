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

    $kolega1 = $_POST["koledzy1"];
    $kolega2 = $_POST["koledzy2"];
    $kolega3 = $_POST["koledzy3"];
    $osoba = $_COOKIE['loginob'];
    
    $zapytanie_spec = "UPDATE `klasa` SET `1wybor`='$kolega1',`2wybor`='$kolega2',`3wybor`='$kolega3' WHERE `osoba` = '$osoba';";
    $wynik = mysqli_query($conn, $zapytanie_spec);

    setcookie('loginob', "", time()-3600);
    if ($wynik){
        echo '<h2><a href="index.php">Pozytywnie dodano Twoje odpowiedzi! Dziekujemy.</a></h2>';
    } else {
        echo '<h2><a href="index.php">Nie dodano Twoich odpowiedzi. Przepraszamy.</a></h2>';
    }

    mysqli_close($conn);
?>
</div>

<?php
    }
?>
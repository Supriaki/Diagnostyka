<?php 
    session_start();

    // Checking if session is enabled
    if(!isset($_SESSION['user'])) {
        echo '<script language="JavaScript" type="text/javascript">
                 location.href="index.php";
            </script>';
    } else {
?>

<?php
    // Importing globaly set table name
    require('php_fun/set_fun.php');

    function opcje($klasa)
    {
        require("php_fun/sql_login.php");

        $osoba = $_COOKIE['loginob'];

        $zapytanie_spec = "SELECT osoba FROM `$klasa`;";
        $wynik = mysqli_query($conn, $zapytanie_spec);
        
        while( $wiersz = mysqli_fetch_array($wynik)){
            if ($osoba != $wiersz["osoba"]) {
                echo '<option value="'. $wiersz["osoba"] .'">'. $wiersz["osoba"] .'</option>';
            }
        }

        mysqli_close($conn);
    }

    $nazwa_tabeli = getTableName();
?>

<div class="selectdiv">
    <h4>
        Wybierz 3 kolegów z którymi chciałbyś być na wycieczce szkolnej!
        <mark>Kolejność ma znaczenie.</mark>
    </h4>

    <form action="index.php?strona=zapytanie_diag" method="post" class="">

        <label for="koledzy1">Pierwszy kolega:</label>
            <select name="koledzy1" id="koledzy1">
                <?php
                    opcje($nazwa_tabeli);
                ?>
            </select>

        <br>

        <label for="koledzy2">Drugi kolega:</label>
            <select name="koledzy2" id="koledzy2">
                <?php
                    opcje($nazwa_tabeli);
                ?>
            </select>

        <br>

        <label for="koledzy3">Trzeci kolega:</label>
            <select name="koledzy3" id="koledzy3">
                <?php
                    opcje($nazwa_tabeli);
                ?>
            </select>
        
        
        <br>
        <br>
        <br>
        
        <center><input type="submit" value="Wyślij!" class="guzik-diag"></center>

    </form>
</div>

<?php
    }
?>
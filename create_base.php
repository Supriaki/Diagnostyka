<?php 
    // Creating new data base 
    // If true -> go diagram
    // Else -> raise error

    // Checking if there is a data base name prepared
    if (!isset($_POST['dname'])) {
        echo '<script language="JavaScript" type="text/javascript">
                location.href="index.php?strona=zarzadzanie";
            </script>';
        exit;
    }

    $dname = trim($_POST['dname']);


    // Importing sql login
    require('php_fun/sql_login.php');

    
    // Checking if there is a table named that
    $zap_czy_istnieje = "SELECT * FROM " . $dname;
    $czy_istnieje = mysqli_query($conn, $zap_czy_istnieje);
    if ($czy_istnieje) {
        echo '<script language="JavaScript" type="text/javascript">
                location.href="index.php?strona=zarzadzanie&powt=true";
            </script>';
        exit;
    } 


    // Table pattern
    $str_tabeli = "
    CREATE TABLE `" . $dname . "` (
        `id_" . $dname . "` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `osoba` varchar(30) NOT NULL,
        `login` varchar(30) NOT NULL,
        `haslo` varchar(250) NOT NULL,
        `1wybor` varchar(30) NOT NULL,
        `2wybor` varchar(30) NOT NULL,
        `3wybor` varchar(30) NOT NULL
    ) 
    ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ";

    
    $wynik = mysqli_query($conn, $str_tabeli);

    if ($wynik) {
        echo "Poprawnie Stworzyło";
    } else {
        echo "Napotkano błąd";
    }

?>
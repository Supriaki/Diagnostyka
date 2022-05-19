<?php
// Global Table functions 

function getTableName() {
    require('sql_login.php');

    $tabela = "";

    $zapytanie_tabele = "SELECT table_name FROM tabela;";
    $wynik = mysqli_query($conn, $zapytanie_tabele);
    
    while( $wiersz = mysqli_fetch_array($wynik)){
        $tabela = $wiersz[0];
    }
    
    mysqli_close($conn);

    return $tabela;
}

function setTableName($nazwa) {
    require('sql_login.php');

    $zapytanie_tabele = "UPDATE `tabela` SET `table_name`='$nazwa' WHERE 1";
    $wynik = mysqli_query($conn, $zapytanie_tabele);

    mysqli_close($conn);

    if (getTableName() == $nazwa) {
        return 0;
    } else {
        return -1;
    }
}

?>
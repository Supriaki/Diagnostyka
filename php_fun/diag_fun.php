<?php
  function diag_wypel($tabela) {
    // Generating information from database in right pattern 
    // Example of pattern: 1 -> 2; 2 -> 3; 2 -- 4; 2 -> 1
    require("php_fun/sql_login.php");

    $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor  FROM `$tabela`;";
    $wynik = mysqli_query($conn, $zapytanie);

    while($wynik_osoby = mysqli_fetch_array($wynik)) {
      if ($wynik_osoby["1wybor"] == 0 || $wynik_osoby["2wybor"] == 0 || $wynik_osoby["3wybor"] == 0){
        continue;
      } else {
        echo $wynik_osoby["osoba"] . "->" . $wynik_osoby["1wybor"] . "; ";
        echo $wynik_osoby["osoba"] . "->" . $wynik_osoby["2wybor"] . "; ";
        echo $wynik_osoby["osoba"] . "->" . $wynik_osoby["3wybor"] . "; ";
      }      
    }

    mysqli_close($conn);
  }

  function diag_wzj_wybory($tabela) {
    // Checking how much mutual decisions
    require("php_fun/sql_login.php");
    
    $ilosc_wyborow = 0;
    $i = 1;
    
    // Checking how much people are in database 
    $zapytanie = "SELECT COUNT(id_klasa) FROM `$tabela`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    while($i <= $ilosc_osob){
      $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$i';";
      $wynik = mysqli_query($conn, $zapytanie);
      $array_osob = mysqli_fetch_array($wynik);

      $osoba = $array_osob["osoba"];
      $osoba_jeden = $array_osob["1wybor"];
      $osoba_dwa = $array_osob["2wybor"];
      $osoba_trzy = $array_osob["3wybor"];

     
      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_jeden';";
      $wynik = mysqli_query($conn, $zapytanie);
      $wynik_osoby = mysqli_fetch_array($wynik);

      $wynik_jeden = $wynik_osoby["1wybor"];
      $wynik_dwa = $wynik_osoby["2wybor"];
      $wynik_trzy = $wynik_osoby["3wybor"];
      if ($wynik_jeden == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_dwa == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_trzy == $osoba) {
        $ilosc_wyborow += 1;
      }
      
      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_dwa';";
      $wynik = mysqli_query($conn, $zapytanie);
      $wynik_osoby = mysqli_fetch_array($wynik);

      $wynik_jeden = $wynik_osoby["1wybor"];
      $wynik_dwa = $wynik_osoby["2wybor"];
      $wynik_trzy = $wynik_osoby["3wybor"];
      if ($wynik_jeden == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_dwa == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_trzy == $osoba) {
        $ilosc_wyborow += 1;
      }

      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_trzy';";
      $wynik = mysqli_query($conn, $zapytanie);
      $wynik_osoby = mysqli_fetch_array($wynik);

      $wynik_jeden = $wynik_osoby["1wybor"];
      $wynik_dwa = $wynik_osoby["2wybor"];
      $wynik_trzy = $wynik_osoby["3wybor"];
      if ($wynik_jeden == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_dwa == $osoba) {
        $ilosc_wyborow += 1;
      }
      if ($wynik_trzy == $osoba) {
        $ilosc_wyborow += 1;
      }
      
      $i += 1;
    }
    

    mysqli_close($conn);

    return $ilosc_wyborow /2;
  }

  function diag_ile_uczniow($tabela){
    require("php_fun/sql_login.php");

    $zapytanie = "SELECT COUNT(login) FROM `$tabela`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    return $ilosc_osob;
  }

  function diag_ile_zer($tabela){
    // Checking how much unrequited decisions
    require("php_fun/sql_login.php");
    
    $ilosc_zer = 0;
    $ilosc_podobienst = 0;
    $i = 1;
    
    // Checking how much people are in database 
    $zapytanie = "SELECT COUNT(login) FROM `$tabela`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    while($i <= $ilosc_osob) {
      $ilosc_podobienst = 0;
      $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$i';";
      $wynik = mysqli_query($conn, $zapytanie);
      
      while($array_osob = mysqli_fetch_array($wynik)) {
        $osoba = $array_osob["osoba"];
        $osoba_jeden = $array_osob["1wybor"];
        $osoba_dwa = $array_osob["2wybor"];
        $osoba_trzy = $array_osob["3wybor"];

        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_jeden';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }

        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_dwa';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }
        
        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$osoba_trzy';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }
      
        if ($ilosc_podobienst == 0) {
          $ilosc_zer += 1;
          echo diag_podkr_zer($osoba);
        }

      }
      $i += 1;
    }
    
    return $ilosc_zer;
  }

  function diag_wsk_spoist($wzajemni, $uczniowe){
    return round($wzajemni / (($uczniowe * 3) / 2), 2);
  }

  function diag_wsk_integ($zera){
    return round(1 / $zera, 2);
  }

  function diag_podkr_zer($ktos){
    // Function to color a people that wasnt picked
    // Pattern to return: 10[fontcolor=white, color=red]

    $zwrot =  $ktos . "[fontcolor=white, color=red]";
    return $zwrot;
  }

  function diag_ile_wypel($tabela){
    require("php_fun/sql_login.php");
    
    $ile_wypel = 0;
    
    // Checking how much people picked somone in database 
    $zapytanie = "SELECT COUNT(login) FROM $tabela WHERE 1wybor != '' AND 2wybor != '' AND 3wybor != '';";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);

    $ile_wypel = (int)$wynik_zapytania[0];

    return $ile_wypel;
  }

  function diag_wypel_wzj_wybory($tabela){
    /*
    The function should make data in good pattern, just to display all groups of people.
    */

    require("sql_login.php");
    
    // Checking how much people are in database 
    $zapytanie = "SELECT COUNT(login) FROM `$tabela`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];
    
    $i = 1;
    $array_do_pom = array();
    $ilosc_wyborow = 0;

    while($i <= $ilosc_osob) {

      $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$i';";
      $wynik = mysqli_query($conn, $zapytanie);
      $array_osob = mysqli_fetch_array($wynik);

      $osoba = $array_osob["osoba"];
      $osoba_jeden = $array_osob[1];
      $osoba_dwa = $array_osob[2];
      $osoba_trzy = $array_osob[3];

      $array_do_pom[] = $osoba_jeden;
      $array_do_pom[] = $osoba_dwa;
      $array_do_pom[] = $osoba_trzy;
     
      foreach($array_do_pom as $ktos){
        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `$tabela` WHERE osoba='$ktos';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);

        $wynik_jeden = $wynik_osoby["1wybor"];
        $wynik_dwa = $wynik_osoby["2wybor"];
        $wynik_trzy = $wynik_osoby["3wybor"];

        if ($wynik_jeden == $osoba) {
          $ilosc_wyborow += 1;
          echo $osoba . "->" . $osoba_jeden . "; ";
        }
        if ($wynik_dwa == $osoba) {
          $ilosc_wyborow += 1;
          echo $osoba . "->" . $osoba_dwa . "; ";
        }
        if ($wynik_trzy == $osoba) {
          $ilosc_wyborow += 1;
          echo $osoba . "->" . $osoba_trzy . "; ";
        }
      } 
      
      array_splice($array_do_pom, 0, 0);
      array_splice($array_do_pom, 1, 1);
      array_splice($array_do_pom, 2, 2);
      $i += 1;
    }

    return 0;
  }

?>
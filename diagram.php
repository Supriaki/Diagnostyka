<?php
  function diag_wypel() {
    // Generating information from database in right pattern 
    // Example of pattern: 1 -> 2; 2 -> 3; 2 -- 4; 2 -> 1
    require("php_fun/sql_login.php");

    $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor  FROM `klasa`;";
    $wynik = mysqli_query($conn, $zapytanie);

    while($wiersz = mysqli_fetch_array($wynik)) {
      if ($wiersz["1wybor"] == 0 || $wiersz["2wybor"] == 0 || $wiersz["3wybor"] == 0){
        continue;
      } else {
        echo $wiersz["osoba"] . "->" . $wiersz["1wybor"] . "; ";
        echo $wiersz["osoba"] . "->" . $wiersz["2wybor"] . "; ";
        echo $wiersz["osoba"] . "->" . $wiersz["3wybor"] . "; ";
      }      
    }

    mysqli_close($conn);
  }

  function diag_wzj_wybory() {
    // Checking how much mutual decisions
    require("php_fun/sql_login.php");
    
    $ilosc_wyborow = 0;
    $i = 1;
    
    // Checking how much people are in database 
    $zapytanie = "SELECT COUNT(id_klasa) FROM `klasa`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    while($i <= $ilosc_osob){
      $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$i';";
      $wynik = mysqli_query($conn, $zapytanie);
      $array_osob = mysqli_fetch_array($wynik);

      $osoba = $array_osob["osoba"];
      $osoba_jeden = $array_osob["1wybor"];
      $osoba_dwa = $array_osob["2wybor"];
      $osoba_trzy = $array_osob["3wybor"];

     
      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_jeden';";
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
      
      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_dwa';";
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

      $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_trzy';";
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

  function diag_ile_uczniow(){
    require("php_fun/sql_login.php");

    $zapytanie = "SELECT COUNT(id_klasa) FROM `klasa`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    return $ilosc_osob;
  }

  function diag_ile_zer(){
    // Checking how much unrequited decisions
    require("php_fun/sql_login.php");
    
    $ilosc_zer = 0;
    $ilosc_podobienst = 0;
    $i = 1;
    
    // Checking how much people are in database 
    $zapytanie = "SELECT COUNT(id_klasa) FROM `klasa`;";
    $wynik = mysqli_query($conn, $zapytanie);
    $wynik_zapytania = mysqli_fetch_array($wynik);
    $ilosc_osob = (int)$wynik_zapytania[0];

    while($i <= $ilosc_osob) {
      $ilosc_podobienst = 0;
      $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$i';";
      $wynik = mysqli_query($conn, $zapytanie);
      
      while($array_osob = mysqli_fetch_array($wynik)) {
        $osoba = $array_osob["osoba"];
        $osoba_jeden = $array_osob["1wybor"];
        $osoba_dwa = $array_osob["2wybor"];
        $osoba_trzy = $array_osob["3wybor"];

        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_jeden';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }

        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_dwa';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }
        
        $zapytanie = "SELECT 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$osoba_trzy';";
        $wynik = mysqli_query($conn, $zapytanie);
        $wynik_osoby = mysqli_fetch_array($wynik);
        foreach ($wynik_osoby as $numerek){
          if ($numerek == $osoba) {
            $ilosc_podobienst += 1;
          }
        }
      
        if ($ilosc_podobienst == 0) {
          $ilosc_zer += 1;
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

  function diag_podkr_zer(){
    // Function to color a zero
    // Pattern to return: 10[fontcolor=white, color=red]
    return 0;
  }
?>

<?php
  // Navigation bar
  require("php_fun/admin_nav.php");
?>

<div class="panel-tresc">

  <div id="mynetwork">
    <div class="vis-network" tabindex="0">
      <canvas width="1000" height="400"></canvas>
    </div>
  </div>

  <script type="text/javascript">
    var container = document.getElementById("mynetwork");
    var dot =
      "dinetwork {node[shape=circle]; edge[length=100, color=gray, fontcolor=black]; <?php diag_wypel(); ?> }";
    var data = vis.parseDOTNetwork(dot);
    var network = new vis.Network(container, data);
  </script>

  <br>
  <table border="1">
    <tr>
      <th>Liczba wszystkich wzajemnych wyborów: </th>
      <th>Liczba uczniów w klasie: </th>
      <th>Ile osób ma 0 wyborów: </th>
      <th>Wskaźnik spoistości klasy: </th>
      <th>Wskaźnik integracji klasy: </th>
    </tr>
    <tr>
      <td><?php echo $ile_wzj = diag_wzj_wybory();?></td>
      <td><?php echo $ile_uczn = diag_ile_uczniow();?></td>
      <td><?php echo $ile_zer = diag_ile_zer();?></td>
      <td><?php echo diag_wsk_spoist($ile_wzj, $ile_uczn);?></td>
      <td><?php echo diag_wsk_integ($ile_zer);?></td>
    </tr>
  </table>
  
</div>

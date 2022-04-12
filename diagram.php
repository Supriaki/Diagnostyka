<?php
  function diag_wypel() {
    // Generating information from database in good pattern 
    // Pattern: 1 -> 2; 2 -> 3; 2 -- 4; 2 -> 1
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
    $i = 0;
    
    // $zapytanie = "SELECT COUNT(id_klasa) FROM `klasa`;";
    // $wynik = mysqli_query($conn, $zapytanie);

    // $ilosc_osob = mysqli_fetch_array($wynik);

    // while($i < $ilosc_osob){
    //   $zapytanie = "SELECT osoba, 1wybor, 2wybor, 3wybor FROM `klasa` WHERE osoba='$i';";
    //   $wynik = mysqli_query($conn, $zapytanie);
      
    //   while($array_jeden = mysqli_fetch_array($wynik)) {
    //     $osoba = $array_jeden["osoba"];
        
    //     if ($osoba == $array_jeden["1wybor"] || $osoba == $array_jeden["2wybor"] || $osoba == $array_jeden["3wybor"]) {
    //       $ilosc_wyborow += 1;
    //     }

    //   }
    //   $i += 1;
    // }
    

    mysqli_close($conn);

    return $ilosc_wyborow;
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
      "dinetwork {node[shape=circle]; <?php diag_wypel(); ?> }";
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
      <td><?php echo diag_wzj_wybory();?></td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
  </table>
  
</div>


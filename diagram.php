<?php 
    session_start();
    error_reporting(0);

    // Checking if session is enabled
    if(!isset($_SESSION['user'])) {
        echo '<script language="JavaScript" type="text/javascript">
                 location.href="index.php";
            </script>';
    } else {

      $aktualna_tabela = "";

      if (isset($_GET['tab'])) {
        $aktualna_tabela = $_GET['tab'];
      }
?>

<script>
function zmianaTabeli() {
  var optionValue = document.getElementById("tabele").value;
  location.href="index.php?strona=diagram&tab=" + optionValue;
}
</script>

<?php
  // Necessary functions to work with diagram
  require("php_fun/diag_fun.php");

  // Navigation bar
  require("php_fun/admin_nav.html");

  function tabele_do_wybr() {
      require("php_fun/sql_login.php");

      $zapytanie_tabele = "show tables;";
      $wynik = mysqli_query($conn, $zapytanie_tabele);
      
      // echo '<option value="' . $aktualna_tabela . '" selected>' .  $aktualna_tabela .  '</option>';

      while( $wiersz = mysqli_fetch_array($wynik)){
        if ( !($wiersz[0] == "uzytk_spec") && (!($wiersz[0] == "tabela")) ) {
          echo '<option class="diag_elementy" value="'. $wiersz[0] .'">'. $wiersz[0] .'</option>';
        }
      }

      mysqli_close($conn);
  }
?>

<div class="panel-tresc">

  <div class="panel-database">
    <div class="wysrodkowanie">
      <select name="tabele" id="tabele" class="select" oninput="zmianaTabeli()" onkeypress="zmianaTabeli()">
        <?php
            tabele_do_wybr();
        ?>
        <script>
          window.onload = function() {
            document.querySelectorAll(".diag_elementy").forEach(element => {
              element.addEventListener("click", function(){
                zmianaTabeli();
              });
            });
          }
        </script>
      </select>  
    </div>
    <?php
    echo "<center><h4>" . "Przeglądanie: " . $aktualna_tabela . "<br>" .  " Wypełniło: " . diag_ile_wypel($aktualna_tabela) .  " Uczniów</h4></center>";
    ?>
  </div>

  <div id="mynetwork">
    <div class="vis-network" tabindex="0">
      <canvas width="1000" height="400"></canvas>
    </div>
  </div>

  <script type="text/javascript">
    var container = document.getElementById("mynetwork");
    var dot =
      "dinetwork {node[shape=circle]; edge[length=100, color=gray, fontcolor=black]; <?php diag_wypel($aktualna_tabela); $ile_zer = diag_ile_zer($aktualna_tabela); ?> }";
    var data = vis.parseDOTNetwork(dot);
    var network = new vis.Network(container, data);
  </script>

  <div id="mynetwork2">
    <div class="vis-network" tabindex="0">
      <canvas width="1000" height="400"></canvas>
    </div>
  </div>

  <script type="text/javascript">
    var container = document.getElementById("mynetwork2");
    var dot =
      "dinetwork {node[shape=circle]; edge[length=100, color=gray, fontcolor=black]; <?php diag_wypel_wzj_wybory($aktualna_tabela); ?> }";
    var data = vis.parseDOTNetwork(dot);
    var network = new vis.Network(container, data);
  </script>
  
  <table border="1">
    <tr>
      <th>Liczba wszystkich wzajemnych wyborów: </th>
      <th>Liczba uczniów w klasie: </th>
      <th>Ile osób ma 0 wyborów: </th>
      <th>Wskaźnik spoistości klasy: </th>
      <th>Wskaźnik integracji klasy: </th>
    </tr>
    <tr>
      <td><?php echo $ile_wzj = diag_wzj_wybory($aktualna_tabela);?></td>
      <td><?php echo $ile_uczn = diag_ile_uczniow($aktualna_tabela);?></td>
      <td><?php echo $ile_zer; ?></td>
      <td><?php echo diag_wsk_spoist($ile_wzj, $ile_uczn);?></td>
      <td><?php echo diag_wsk_integ($ile_zer);?></td>
    </tr>
  </table>

</div>

<?php
    }
?>
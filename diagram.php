<?php
  // Necessary functions to work with diagram
  require("php_fun/diag_fun.php");

  // Navigation bar
  require("php_fun/admin_nav.html");
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
      "dinetwork {node[shape=circle]; edge[length=100, color=gray, fontcolor=black]; <?php diag_wypel(); $ile_zer = diag_ile_zer(); ?> }";
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
      <td><?php echo $ile_zer; ?></td>
      <td><?php echo diag_wsk_spoist($ile_wzj, $ile_uczn);?></td>
      <td><?php echo diag_wsk_integ($ile_zer);?></td>
    </tr>
  </table>
  
</div>

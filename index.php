<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta
      name="author"
      content="Bartłomiej Ochota 3Te (programista), Michał Szklaruk-Leonkiewicz 3Te (design)"
    />

    <meta
      name="description"
      content="Witryna internetowa wykonana w 2022 roku. Służy do przeprowadzenia socjometrii w Technikum Łączności i Multimediów Cyfrowych."
    />

    <link rel="shortcut icon" type="image/png" href="img/logo_tlimc.png" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/classy.css" rel="stylesheet" type="text/css" />

    <script
      type="text/javascript"
      src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"
    ></script>

    <script type="text/javascript" src="js/important_fun.js"></script>

    <title>Diagnostyka</title>
  </head>
  <body>
    <div class="pasek">
      <div class="logo">
        <div class="napis">
          <a href="index.php"> Socjogram </a>
        </div>
      </div>
    </div>

    <div id="szablon">
      <section>
        <?php
          // Default : importing login form 
          // If strona is set = import selected page
          if (!isset($_GET['strona'])){
              $plik = 'login';
          }
          else{
              $plik= $_GET['strona'];
          }
          
          $roz ='.php';
          include ("$plik$roz");
        ?>
      </section>

      <footer>
        <script>
          index_napis();
        </script>
        <br />
      </footer>
    </div>

    <script type="text/javascript">
      <?php
        if (isset($_GET['strona'])){
          echo "let strona_akt = '" . $_GET['strona'] . "';";
        }
      ?>

      if (strona_akt == 'diagram') {
          let sekcja = document.querySelector('section');
          let select_nav = document.querySelector('select');

          sekcja.style.height = "2400px";
          select_nav.style.height = "3em";
      }

      if (strona_akt == 'pytania_diag') {
          if (screen.width < 600) {
              document.getElementById("szablon").style.width = screen.width;
          }
      }
    </script>
  </body>
</html>

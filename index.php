<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta
      name="author"
      content="Bartłomiej Ochota , Michał Szklaruk-Leonkiewicz"
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
          <a href="index.php">
            <script>
              index_napis();
            </script></a
          >
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

      <script>
        <?php
            echo "let strona_akt = '" . $_GET['strona'] . "';";
        ?>

        if (strona_akt == 'diagram') {
            let sekcja = document.querySelector('section');
            sekcja.style.height = "1300px";
        }
      </script>

      <footer>
        Wykonane przez: Bartłomiej Ochota oraz Michał Szklaruk-Leonkiewicz
        <br />
      </footer>
    </div>
  </body>
</html>

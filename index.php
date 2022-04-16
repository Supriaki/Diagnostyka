<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bartłomiej Ochota , Michał Szklaruk-Leonkiewicz">
	<link rel="shortcut icon" type="image/png" href="img/logo_tlimc.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/classy.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <title>Diagnostyka</title>
</head>
<body>
    <div class="pasek">
        <div class="logo"><div class="napis"><a href="index.php">Technikum Łączności i Multimediów Cyfrowych w Szczecinie</a></div></div>
    </div>

    <div id="szablon">
        <section>
            <?php
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
            Wykonane przez: Bartłomiej Ochota<br>
        </footer>
    </div>
</body>
</html>

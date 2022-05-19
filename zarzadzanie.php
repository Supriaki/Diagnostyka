<?php 
    session_start();

    // Checking if session is enabled
    if(!isset($_SESSION['user'])) {
        echo '<script language="JavaScript" type="text/javascript">
                 location.href="index.php";
            </script>';
    } else {
    
    // Checking if someone tried to use existed table name
    if (isset($_GET['powt'])){
        if($_GET['powt'] == 'true') {
            echo '<script language="JavaScript" type="text/javascript">
                tabela_istn();
            </script>';
        }
    }

    require('php_fun/set_fun.php');
    if (isset($_POST['tabela'])) {
        $nazwa_tabeli = $_POST['tabela'];
        if (setTableName($nazwa_tabeli) == 0) {
            echo '<script language="JavaScript" type="text/javascript">
                alert("Ustawiono nową bazę danych!");
                </script>';
        }
        
    }
?>

<?php
    // Navigation bar
    require("php_fun/admin_nav.html");
?>

<div class="panel-tresc">

    <div class="zarz-lewa">
        <div class="wysrodkowanie">
            <form action="index.php?strona=create_base" class="card-form" method="post">
                <div class="input">
                    <input type="text" class="input-field" placeholder="Nazwa Bazy Danych" name="dname" id="dname"  required/>
                </div>
                <div class="action">
                    <button class="action-button" type="submit"> Utwórz Baze </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="zarz-prawa">
        <div class="wysrodkowanie">
            <form action="index.php?strona=zarzadzanie" class="card-form" method="post">
                <div class="select">
                    <select name="tabela" id="tabela">
                    <?php
                        require("php_fun/sql_login.php");

                        $tabela = getTableName();

                        echo '<option value="'. $tabela .'" selected>'. $tabela .'</option>';
                        
                        $zapytanie_tabele = "show tables;";
                        $wynik = mysqli_query($conn, $zapytanie_tabele);
                        
                        while( $wiersz = mysqli_fetch_array($wynik)){
                          if ( (!($wiersz[0] == "uzytk_spec")) && (!($wiersz[0] == "tabela")) && (!($wiersz[0] == $tabela))) {
                            echo '<option value="'. $wiersz[0] .'">'. $wiersz[0] .'</option>';
                          }
                        }
                        
                        mysqli_close($conn);
                    ?>
                    </select>
                </div>

                <div class="action">
                    <button class="action-button" type="submit"> Ustaw globalnie aktywną tabele </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
    }
?>
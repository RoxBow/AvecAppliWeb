<?php

session_start();

if( !isset($_SESSION['pseudo']) ){
    header("location: name.php");
}

?>

<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Toodle - Interactive game</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Full Screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="../stylesheets/oeuvretrouve.css" media="all">
</head>
<body>
    <?php
        include 'credits.php';
    ?>
    <div class="container">
        <header>
            <img src="../img/toddle_form.png" alt="toddle" class="toddle_form">
            <img src="../img/toddle_text.png" alt="toddle" class="toddle_text">
            <div class="blockRight">
                <p class="name"><?php echo $_SESSION['pseudo']." - "; ?></p>
                <form name="chrono" class="chrono">
                    <input type="text" name="minute" id="min" readonly>min
                    <input type="text" name="seconde" id="sec" readonly>s
                </form>
            </div>
        </header>
        <section class="congratulate">
            <p class="title">
              FÉLICITATIONS !
            </p>
            <hr>
            <p>
              Tu as trouvé l'&#156;uvre indiquée ! Il s'agit de&nbsp;&quot;<i>Mas o Menos</i>" (1964)<br> de Frank Stella.
            </p>
            <br>
            <p>
              D&eacute;couvrons ensemble <span class="bold rose">les paramètres</span>.
            </p>
            <br>
            <p>
                <span class="bold">Les paramètres</span> sont des indications sur l'action que nous voulons effectuer.
            </p>
            <br>
            <p>
                <span class="bold">Exemple:</span> Je veux dessiner trois ronds.<br> Nous allons dessiner un rond trois fois ! <span class="bold">En algorithmique</span> on écrira :
            <br>
            <span class="fonction bold">DessinerUnRond</span><span class="parentheses bold">(<span class="rose">3</span>);</span>
            </p>
            <br>
            <p class="text-go rose">
              PRÊT À RELEVER LE DÉFI ? <br>
            </p>
            <br>
            <button class="go" id="oeuvretrouve2go">GO</button>
        </section>
        <?php
            include 'footer.php';
        ?>
    </div>
    
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/chrono.js"></script>
    <script>
        /* #####    CHRONO      ##### */

        // Update time script
        sec = localSec;
        min = localMin;

        // When page is left
        $(window).bind('beforeunload',function(){
            localStorage.setItem("seconde", $("#sec").val() );
            localStorage.setItem("minute", $("#min").val() );
        });

        $(document).ready(function() {
            /* ### CHRONO ### */
            $("#sec").val(localSec);
            $("#min").val(localMin);
            chrono();
            
            $("#oeuvretrouve2go").on(""+touchOrClick()+"", function() {
              localStorage.setItem("seconde", $("#sec").val());
              localStorage.setItem("minute", $("#min").val());
              document.location.replace("oeuvre2.php");
            });
        });
    </script>
</body>
</html>
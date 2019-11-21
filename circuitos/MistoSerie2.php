<html>
    <head>
        <title>Circuito Misto - série 2</title>
    </head>
    <body>
        <label>Adicione resistores para seu segundo circuito série dentro do misto: </label>
        <?php
        $pagina = 'MistoSerie2';
        
        include '../adicionar_resistores.php';
        
        include '../class_calculadoras.php';
        
        $calculadora = new Calculos();
        
        $resSerie = $calculadora->resistenciaEquivalenteSerie($c);
        
        echo 'Resistência equivalente: '.$resSerie;
        
        session_start();
        $_SESSION['mistoSerie2'] = $resSerie;
        ?>
        
        <form method="post" action="misto.php">
            <input type="submit" value="Próximo">
        </form>
    </body>
</html>
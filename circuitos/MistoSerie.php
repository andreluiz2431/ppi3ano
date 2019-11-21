<html>
    <head>
        <title>Circuito Misto - série</title>
    </head>
    <body>
        <label>Adicione resistores para seu circuito série dentro do misto: </label>
        <?php
        $pagina = 'MistoSerie';
        
        include '../adicionar_resistores.php';
        
        include '../class_calculadoras.php';
        
        $calculadora = new Calculos();
        
        $resSerie = $calculadora->resistenciaEquivalenteSerie($c);
        
        echo 'Resistência equivalente: '.$resSerie;
        
        session_start();
        $_SESSION['mistoSerie'] = $resSerie;
        
        
        
        ?>
    </body>
</html>
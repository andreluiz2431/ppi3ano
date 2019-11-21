<html>
    <head>
        <title>Circuito Misto - paralelo</title>
    </head>
    <body>
        <label>Adicione resistores para seu circuito paralelo dentro do misto: </label>
        <?php
        $pagina = 'MistoParalelo';
        
        include '../adicionar_resistores.php';
        
        include '../class_calculadoras.php';
        
        $calculadora = new Calculos();
        
        $resParalelo = $calculadora->resistenciaEquivalenteParalela($c);
        
        $resSerie = $_POST['mistoSerie'];
        $resSerie2 = $_POST['mistoSerie2'];
        
        echo 'Resistência equivalente: '.$resParalelo;
        ?>
        
        <form method="post" action="misto.php">
            <input type="hidden" name="mistoSerie" value="<?php echo $resSerie; ?>">
            <input type="hidden" name="mistoSerie2" value="<?php echo $resSerie2; ?>">
            <input type="hidden" name="mistoParalelo" value="<?php echo $resParalelo; ?>">
            <input type="submit" value="Próximo">
        </form>
    </body>
</html>
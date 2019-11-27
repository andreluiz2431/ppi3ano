<html>
    <head>
        <title>Circuito série</title>
    </head>
    <body>
        <label>Adicione resistores para seu circuito série: </label>
        <?php
        $pagina = 'serie';
        
        include '../adicionar_resistores.php';
        
        include '../classes/class_calculadoras.php';
        
        $calculadora = new Calculos();
        
        if(!empty($c)){
            echo 'Resistência equivalente: '.$calculadora->resistenciaEquivalenteSerie($c);
        }
        ?>
    </body>
</html>

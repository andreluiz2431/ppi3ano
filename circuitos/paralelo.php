<html>
    <head>
        <title>Circuito paralelo</title>
    </head>
    <body>
        <label>Adicione resistores para seu circuito paralelo: </label>
        <?php
        $pagina = 'paralelo';
        
        include '../adicionar_resistores.php';
        
        include '../classes/class_calculadoras.php';
        
        $calculadora = new Calculos();
        
        if(!empty($c)){
            echo 'Resistência equivalente: '.$calculadora->resistenciaEquivalenteParalela($c);
        }
        ?>
    </body>
</html>

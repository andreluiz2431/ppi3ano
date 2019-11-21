<html>
    <head>
        <title>Circuito misto</title>
    </head>
    <body>
        <label>Este sistema apresenta duas series em paralelo, preencha os dados em serie: </label>
        <form method="post" action="misto.php">
            <label>Serie 1</label>
            <br>
            <input type="number" name="resistor1" placeholder="Resistor 1">
            <input type="number" name="resistor2" placeholder="Resistor 2">
            <br>
            <label>Serie 2</label>
            <br>
            <input type="number" name="resistor3" placeholder="Resistor 3">
            <input type="number" name="resistor4" placeholder="Resistor 4">
            <br>
            <input type="submit">
        </form>


        <?php
        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();
        
        if(!empty($_POST['resistor1'])){
            $array = $calculadora->resistenciaEquivalenteMista1($_POST['resistor1'], $_POST['resistor2'], $_POST['resistor3'], $_POST['resistor4']);

            echo '<br>Resistência equivalente: '.$calculadora->resistenciaEquivalenteMista2($array[0], $array[1]);
        }
        ?>
    </body>
</html>
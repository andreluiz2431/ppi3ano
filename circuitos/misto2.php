<html>
    <head>
        <title>Circuito misto 2</title>
    </head>
    <body>
        <label>Xxxxxxxxxxxxxxxxxxxxxxxx, preencha os dados: </label>
        <form method="post" action="misto.php">
            <label>Xxxxxxxxxxxxx</label>
            <br>
            <input type="number" name="resistor1" placeholder="Resistor 1">
            <br>
            <input type="number" name="resistor2" placeholder="Resistor 2">
            <br>
            <input type="number" name="resistor3" placeholder="Resistor 3">
            <br>
            <input type="number" name="resistor4" placeholder="Resistor 4">
            <br>
            <input type="number" name="resistor5" placeholder="Resistor 5">
            <br>
            <input type="number" name="resistor6" placeholder="Resistor 6">
            <br>
            <input type="number" name="resistor7" placeholder="Resistor 7">
            <br>

            <input type="submit">
        </form>


        <?php
        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();

        if(!empty($_POST['resistor1'])){ // definir os resistores
            $funcao1 = $calculadora->resistenciaEquivalenteMista2($_POST['resistorX'], $_POST['resistorX']);

            $funcao2 = $calculadora->resistenciaEquivalenteMista3($_POST['resistorX'], $_POST['resistorX']);

            $funcao3 = $calculadora->resistenciaEquivalenteMista2($_POST['resistorX'], $_POST['resistorX']);

            $funcao4 = $calculadora->resistenciaEquivalenteMista4($_POST['resistorX'], $_POST['resistorX'], $_POST['resistorX'], $_POST['resistorX']);

            echo '<br>Resistência equivalente: '.$funcao4;
        }
        ?>
    </body>
</html>

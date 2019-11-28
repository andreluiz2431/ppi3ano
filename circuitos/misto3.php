<html>
    <head>
        <title>Circuito misto 3</title>
    </head>
    <body>
        <label>Preencha os dados dos resistores de acordo com a imagem: </label>
        <img src="../creative/circuitos_img/misto_1.png" style="width: 600px">
        <form method="post" action="misto3.php">
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
            <input type="number" name="resistor8" placeholder="Resistor 8">
            <br>

            <input type="submit">
        </form>


        <?php
        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();

        if(!empty($_POST['resistor1'])){ // definir os resistores
            $funcao1 = $calculadora->resistenciaEquivalenteMista5($_POST['resistor3'], $_POST['resistor6'], $_POST['resistor7']);

            $funcao2 = $calculadora->resistenciaEquivalenteMista2($_POST['resistor5'], $funcao1);

            $funcao3 = $calculadora->resistenciaEquivalenteMista5($_POST['resistor2'], $_POST['resistor8'], $funcao2);

            $funcao4 = $calculadora->resistenciaEquivalenteMista2($funcao3, $_POST['resistor4']);

            $funcao5 = $calculadora->resistenciaEquivalenteMista3($funcao4, $_POST['resistor1']);

            echo '<br>Resistência equivalente: '.$funcao5;
        }
        ?>
    </body>
</html>

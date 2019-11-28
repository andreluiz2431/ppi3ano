<html>
    <head>
        <title>Calculadora PRI</title>
    </head>
    <body>
        <label>Insira os valores para calcular: (PRI)</label>

        <form action="pri.php" method="post">
            <input type="number" name="p" placeholder="Potência (P)">
            <br>
            <input type="number" name="r" placeholder="Resistência (R)">
            <br>
            <input type="number" name="i" placeholder="Corrente (I)">
            <br>
            <input type="submit" value="Calcular">
        </form>

        <?php

        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();

        if($_POST){
            echo 'Resultado do campo vazio: '.$calculadora->pri($_POST['p'], $_POST['r'], $_POST['i']);
        }
        ?>
    </body>
</html>

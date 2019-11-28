<html>
    <head>
        <title>Calculadora PUR</title>
    </head>
    <body>
        <label>Insira os valores para calcular: (PUR)</label>

        <form action="pur.php" method="post">
            <input type="number" name="p" placeholder="Potência (P)">
            <br>
            <input type="number" name="u" placeholder="Tensão (U)">
            <br>
            <input type="number" name="r" placeholder="Resistência (R)">
            <br>
            <input type="submit" value="Calcular">
        </form>

        <?php

        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();

        if($_POST){
            echo 'Resultado do campo vazio: '.$calculadora->pur($_POST['p'], $_POST['u'], $_POST['r']);
        }
        ?>
    </body>
</html>

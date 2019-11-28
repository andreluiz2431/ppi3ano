<html>
    <head>
        <title>Calculadora P=U.I</title>
    </head>
    <body>
        <label>Insira os valores para calcular: (P=U.I)</label>

        <form action="pui.php" method="post">
            <input type="number" name="p" placeholder="Potência (P)">
            <br>
            <input type="number" name="u" placeholder="Tensão (U)">
            <br>
            <input type="number" name="i" placeholder="Corrente (I)">
            <br>
            <input type="submit" value="Calcular">
        </form>

        <?php

        include '../classes/class_calculadoras.php';

        $calculadora = new Calculos();

        if($_POST){
            echo 'Resultado do campo vazio: '.$calculadora->pui($_POST['p'], $_POST['u'], $_POST['i']);
        }
        ?>
    </body>
</html>

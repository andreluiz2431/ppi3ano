<html>
    <head>
        <title>Calculadora U=R.I</title>
    </head>
    <body>
        <label>Insira os valores para calcular: (U=R.I)</label>

        <form action="uri.php" method="post">
            <input type="number" name="u" placeholder="Tensão (U)">
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
            echo 'Resultado do campo vazio: '.$calculadora->uri($_POST['r'], $_POST['u'], $_POST['i']);
        }
        ?>
    </body>
</html>

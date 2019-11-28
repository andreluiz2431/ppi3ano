<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">



        <!-- Font Awesome Icons -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Theme CSS - Includes Bootstrap -->
        <link href="css/creative.min.css" rel="stylesheet">

        <style>
            .navbarForum{
                background-color: #F47E1A;
                height: 70px;
            }
            #imgCircuitos{
                width: 450px;
                height: 250px;
            }

        </style>
    </head>
    <body>
        <div class="navbarForum">
            <?php
            include '../navbar.php';
            ?>
        </div>
        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-4">
                </div>
                <div class="col-md-4" >
                    <div style="margin-top: 20%;">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h3 class="text-primary"><center>Adicione resistores para seu circuito série: </center></h3>

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

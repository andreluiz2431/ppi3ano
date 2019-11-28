<html>
    <head>
        <title>Cicuito Misto 1</title>
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
                <div class="col-md-3">
                </div>
                <div class="col-md-6" >
                    <div style="margin-top: 20%;">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                            <h3 class="text-primary"><center>Preencha os dados dos resistores de acordo com a imagem:</center></h3>
                            <br>


                            <center><img src="../creative/circuitos_img/misto_3.png" style="width: 800px"></center>
                            <form method="post" action="misto.php">

                                <br>
                                <input type="number" name="resistor1" placeholder="Resistor 1" class="form-control">
                                <br>
                                <input type="number" name="resistor2" placeholder="Resistor 2" class="form-control">
                                <br>


                                <input type="number" name="resistor3" placeholder="Resistor 3" class="form-control">
                                <br>
                                <input type="number" name="resistor4" placeholder="Resistor 4" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Calcular</button>
                            </form>


                            <?php
                            include '../classes/class_calculadoras.php';

                            $calculadora = new Calculos();

                            if(!empty($_POST['resistor1'])){
                                $array = $calculadora->resistenciaEquivalenteMista1($_POST['resistor1'], $_POST['resistor2'], $_POST['resistor3'], $_POST['resistor4']);

                                echo '<br><h4><center>Resistência equivalente: '.$calculadora->resistenciaEquivalenteMista2($array[0], $array[1]).'</center></h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

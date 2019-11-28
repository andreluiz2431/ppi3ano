<html>
    <head>
        <title>Cicuito Misto 3</title>
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
                    <div style="margin-top: 30px;">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                            <center> <h4 class="text-primary"><b>Circuito misto:</b></h4></center>
                            <p>Caracteriza-se por conter componentes conectados tanto em paralelo quanto em série.</p>
                            <p>Os cálculos são realizados mesclando as ideias do circuito série e paralelo </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div style="margin-top: 30px;">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                            <h3 class="text-primary"><center>Preencha os dados dos resistores de acordo com a imagem:</center></h3>
                            <br>

                            <center><img src="../creative/circuitos_img/misto_2.png" style="width: 800px"></center>
                            <form method="post" action="misto2.php">
                                <input type="number" name="resistor1" placeholder="Resistor 1"  class="form-control">
                                <br>
                                <input type="number" name="resistor2" placeholder="Resistor 2" class="form-control">
                                <br>
                                <input type="number" name="resistor3" placeholder="Resistor 3" class="form-control">
                                <br>
                                <input type="number" name="resistor4" placeholder="Resistor 4" class="form-control">
                                <br>
                                <input type="number" name="resistor5" placeholder="Resistor 5" class="form-control">
                                <br>
                                <input type="number" name="resistor6" placeholder="Resistor 6" class="form-control">
                                <br>
                                <input type="number" name="resistor7" placeholder="Resistor 7" class="form-control">
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Calcular</button>
                            </form>


                            <?php
                            include '../classes/class_calculadoras.php';

                            $calculadora = new Calculos();

                            if(!empty($_POST['resistor1'])){ // definir os resistores
                                $funcao1 = $calculadora->resistenciaEquivalenteMista2($_POST['resistor1'], $_POST['resistor2']);

                                $funcao2 = $calculadora->resistenciaEquivalenteMista3($_POST['resistor5'], $_POST['resistor6']);

                                $funcao3 = $calculadora->resistenciaEquivalenteMista2($funcao2, $_POST['resistor4']);

                                $funcao4 = $calculadora->resistenciaEquivalenteMista4($funcao1, $funcao3, $_POST['resistor3'], $_POST['resistor7']);

                                echo '<br><h4><center>Resistência equivalente: '.$funcao4.'<span>&#8486;</span></center></h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </body>
</html>

<html>
    <head>
       <title>Calculadora Série</title>
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

                            <?php
                            $pagina = 'serie';

                            include '../adicionar_resistores.php';

                            include '../classes/class_calculadoras.php';

                            $calculadora = new Calculos();

                            if(!empty($c)){
                                echo 'Resistência equivalente: '.$calculadora->resistenciaEquivalenteSerie($c);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
            <footer class="bg-light py-5">
                <div class="container">
                    <div class="small text-center text-muted">Copyright &copy; 2019 - FarPhysic</div>
                </div>
            </footer>

            <!-- Bootstrap core JavaScript -->
            <script src="creative/vendor/jquery/jquery.min.js"></script>
            <script src="creative/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="creative/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="creative/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

            <!-- Custom scripts for this template -->
            <script src="js/creative.min.js"></script>


    </body>
</html>

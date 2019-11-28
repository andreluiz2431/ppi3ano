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

                            <h3 class="text-primary"><center>Insira os valores para calcular: (P=U²/R)</center></h3>

                            <form action="pur.php" method="post">

                                <input type="number" name="p" placeholder="Potência (P)" class="form-control">

                                <br>
                                <input type="number" name="u" placeholder="Tensão (U)" class="form-control">
                                <br>
                                <input type="number" name="r" placeholder="Resistência (R)" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Calcular</button>
                            </form>
                            <?php

                            include '../classes/class_calculadoras.php';

                            $calculadora = new Calculos();

                            if($_POST){
                                echo '<br><h4><center>Resultado do campo vazio: '.$calculadora->pur($_POST['p'], $_POST['u'], $_POST['r']).'</center></h4>';
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

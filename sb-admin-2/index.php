<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EVENTGAME - Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <style>
            #gradiente{
                background: rgb(9,0,0);
                background: linear-gradient(145deg, rgba(9,0,0,1) 0%, rgba(46,19,1,1) 0%, rgba(187,90,5,1) 46%, rgba(246,120,6,1) 81%, rgba(249,162,83,1) 100%, rgba(255,255,255,1) 100%);
            }
        </style>

    </head>

    <body id="gradiente">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-8 col-md-9" style="margin-top:8%;">

                    <div class="card o-hidden border-0 shadow-lg my-5" >
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row justify-content-center">
                                <div /></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">FarPhysic</h1>
                                    </div>
                                    <form class="user" method="post" action="index.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="nome" placeholder="Digite seu nome de usuário">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Digite sua senha" name="senha">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Crie uma conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>
<?php
if(!empty($_POST["nome"])){

    include "../classes/class_usuario.php";

    $usuario = new Usuario();

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $saida = $usuario->login($nome, $senha);

    if($saida == "Dados incorretos"){
        echo "<script>alert('".$saida."');</script>";
    }

}
?>

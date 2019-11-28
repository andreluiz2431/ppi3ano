<?php


include '../classes/class_usuario.php';

$usuario = new Usuario();

$usuario->verificarLogado();
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Perfil</title>

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
        </style>

    </head>

    <body id="page-top">

        <div class="navbarForum">
            <?php
            include '../navbar.php'; // ELA ETSA ALI SÓ ESTA BRANCA MSM
            ?>


            <body>

                <div class="container-fluid" >
                    <div class="row" >
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4" >
                            <div style="margin-top: 30%;">
                                <div class="shadow p-3 mb-5 bg-white rounded">
                                    <div style="margin-top: -16%">
                                        <center>
                                            <img src='../img/branco.png' width='120px'>
                                        </center>
                                    </div>

                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <h5 class="text-primary">NOME DE USUARIO:</h5>
                                                <h6><?php echo $_SESSION['usuario']; ?></h6> <!-- MUDAR AQUI PARA O CARINHA QUE É  NOME ATUAL NO CASO  -->
                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-2">
                                                <div style="margin-top:15px;"> <a class="text-" data-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="material-icons">edit</i></a></div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapseUser">
                                            <div class="card card-body">
                                                <form name="formUser" id="formUser" action="alterarUser.php" method="POST">
                                                    <div class="form-group">
                                                        <label>Insira um novo nome de usuario:</label>
                                                        <input type="text" name="user" id="user" class="form-control" maxlength="30" required="true">
                                                        <?php /*
                                                        $res2 = "<div id='resModalUser'align='center'></div>";
                                                        echo "<b>".$res2."</b>"; */ // AQUI É A RESPOSTA DO JAVASCRPT
                                                        ?>
                                                        <!--    AQUI TEM ESSA FUÇÃO PRA COISAR O AJAX  -->
                                                        <p class="text-muted">* Maximo 30 caracteres.</p>
                                                        <button type="button" id="salvarUser"  class="btn btn-primary"  onclick="verificaUser()">Salvar</button>
                                                    </div>
                                                </form>
                                                <!--  <script>
var user = $("#user");  // Verificação do usuario
user.blur(function() {
$.ajax({
url: 'verificaUpUser.php',
type: 'POST',
data:{"user" : user.val()},
success: function(data) {

data = $.parseJSON(data);
$("#resModalUser").text(data.user);
}
});
});

function verificaUser(){

var valorDaDivUser = $("#resModalUser").text();


if(valorDaDivUser == 'Este nome de usuário já foi usado'){

alert('Você precisa escolher outro nome de usuario');
} else if (valorDaDivUser =='Nome de usuario disponível') {
document.formUser.submit();

}}


</script>--> <!-- NAO SEI PQ TA CAGADO ASISIM MAS FDS -->


                                            </div>

                                        </div>
                                        <hr>
                                    </div> <!-- USER -->

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <h5 class="text-primary">ENDEREÇO DE EMAIL:</h5>
                                                <h6><?php echo $_SESSION['email']; ?></h6><!--  COLOCAR O EMAIL QUE ESTA NO BANCO -->
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-2">
                                                <div style="margin-top:15px;" >
                                                    <a  class="text-primary"data-toggle="collapse" href="#collapseEmail" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapseEmail">
                                            <div class="card card-body">
                                                <form name="formEmail" id="formEmail" action="alterarEmail.php" method="POST">
                                                    <div class="form-group">
                                                        <label>Insira um novo endereço de email:</label>
                                                        <input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true">

                                                        <!--    RESPOSTA DO AJAX  -->
                                                        <?php /*
                                                        $resEmail = "<div id='resEmail'align='center'></div>";
                                                        echo "<b>".$resEmail."</b>"; */
                                                        ?>


                                                        <p class="text-muted">* Maximo 100 caracteres.</p>
                                                        <button type="button" id="salvarEmail"  class="btn btn-primary" onclick="verificaEmail()" >Salvar</button> <!-- ESSAS FUNÇÃO QUE EU NEM SEI MAIS OQ FAZ COM O AAJAX -->

                                                    </div>
                                                </form>
                                                <!--  <script>
var email = $("#email"); // verificação do email
email.blur(function() {
$.ajax({
url: 'verificaEmail.php',
type: 'POST',
data:{"email" : email.val()},
success: function(data) {

data = $.parseJSON(data);
$("#resEmail").text(data.email);
}
});
});

function verificaEmail(){
var valorDaDivEmail = $("#resEmail").text();

if(valorDaDivEmail == 'Este email já está cadastrado'){
alert('Você precisa escolher outro endereço de email');

} else if (valorDaDivEmail == 'E-mail valido') {
document.formEmail.submit();
}}
</script> --> <!-- AJAAX FDP AQUI  -->

                                            </div>
                                        </div>
                                        <hr>
                                    </div><!--  Email -->

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <h5 class="text-primary">SENHA:</h5>
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-2">
                                                <div  style="margin-top:15px;" >
                                                    <a  class="text-primary" data-toggle="collapse" href="#collapseSenha" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--           ARRUAMAR AQUI A PAGINA PHP QUE A SENHA VAI IR  -->
                                        <div class="collapse" id="collapseSenha">
                                            <div class="card card-body">
                                                <form name="formSenha" id="formSenha" action="alterarSenha.php" method="POST">
                                                    <div class="form-group">
                                                        <label>Insira sua senha atual:</label>
                                                        <input type="password" name="senha_at" id="senha_at" class="form-control" maxlength="32">

                                                        <label>Insira sua nova senha:</label>
                                                        <input type="password" name="senha_up" id="senha_up" class="form-control" maxlength="32" required="true">

                                                        <label>Comfirme sua nova senha:</label>
                                                        <input type="password" name="senha_up_com" id="senha_up_com" class="form-control" maxlength="32" required="true">

                                                        <p class="text-muted">* Maximo 32 caracteres.</p>
                                                        <button type="submit" id="salvarUser"  class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div><!-- Senha -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <!-- Footer -->
                        <footer class="bg-light py-5">
                            <div class="container">
                                <div class="small text-center text-muted">Copyright &copy; 2019 - FarPhysic</div>
                            </div>
                        </footer>

                        <!-- Bootstrap core JavaScript -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Plugin JavaScript -->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

                        <!-- Custom scripts for this template -->
                        <script src="js/creative.min.js"></script>




                    </div>
                </div>

                        </body>
        </div>
    </body>
                    </html>


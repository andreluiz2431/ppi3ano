<?php
session_start();

include '../classes/class_forum.php';

$forum = new Forum();
?>
<!DOCTYPE html>
<html>
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Forúm</title>

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
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                </div>

                <div class="col-md-10" style="margin-top: 90px;">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="row">
                            <div class="col-3">
                                <div class="flex-column">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                        <a class="nav-link active" id="v-pills-uri-tab" data-toggle="pill" href="#v-pills-uri" role="tab" aria-controls="v-pills-home">URI</a>

                                        <a class="nav-link" id="v-pills-serie-tab" data-toggle="pill" href="#v-pills-serie" role="tab" aria-controls="v-pills-serie" aria-selected="false">Resistencia Série</a>

                                        <a class="nav-link" id="v-pills-paralelo-tab" data-toggle="pill" href="#v-pills-paralelo" role="tab" aria-controls="v-pills-paralelo" aria-selected="false">Resistencia Paralelo</a>

                                        <a class="nav-link" id="v-pills-misto-tab" data-toggle="pill" href="#v-pills-misto" role="tab" aria-controls="v-pills-misto" aria-selected="false">Resistencia Misto 1</a>

                                        <a class="nav-link" id="v-pills-misto_2-tab" data-toggle="pill" href="#v-pills-misto_2" role="tab" aria-controls="v-pills-misto_2" aria-selected="false">Resistencia Misto 2</a>

                                        <a class="nav-link" id="v-pills-misto_3-tab" data-toggle="pill" href="#v-pills-misto_3" role="tab" aria-controls="v-pills-misto_3" aria-selected="false">Resistencia Misto 3</a>

                                        <a class="nav-link" id="v-pills-pri-tab" data-toggle="pill" href="#v-pills-pri" role="tab" aria-controls="v-pills-pri" aria-selected="false">PRI</a>

                                        <a class="nav-link" id="v-pills-pur-tab" data-toggle="pill" href="#v-pills-pur" role="tab" aria-controls="v-pills-pur" aria-selected="false">PUR</a>

                                        <a class="nav-link" id="v-pills-pui-tab" data-toggle="pill" href="#v-pills-pui" role="tab" aria-controls="v-pills-pui" aria-selected="false">PUI</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-uri" role="tabpanel" aria-labelledby="v-pills-uri-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="1">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        URI


                                        <?php
                                        $arrayV1 = $forum->vizualizarPost(1);

                                        $i = 0;
                                        while($i < $arrayV1){

                                            echo '<br><br>Pergunta do(a) '.$arrayV1[$i]['nomeUsuario'].': '.$arrayV1[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV1[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV1[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV1[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV1[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV1[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV1[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV1[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV1[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV1r = $forum->vizualizarComent($arrayV1[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV1r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV1r[$j]['nomeUsuario'].': '.$arrayV1r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV1r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV1r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV1r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV1r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV1r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV1r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV1r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV1r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV1[$i])){
                                                break;
                                            }
                                        }
                                        ?>


                                    </div>
                                    <div class="tab-pane fade" id="v-pills-serie" role="tabpanel" aria-labelledby="v-pills-serie-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="2">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        SERIE

                                        <?php
                                        $arrayV2 = $forum->vizualizarPost(2);

                                        $i = 0;
                                        while($i < $arrayV2){

                                            echo '<br><br>Pergunta do(a) '.$arrayV2[$i]['nomeUsuario'].': '.$arrayV2[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV2[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV2[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV2[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV2[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV2[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV2[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV2[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV2[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV2r = $forum->vizualizarComent($arrayV2[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV2r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV2r[$j]['nomeUsuario'].': '.$arrayV2r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV2r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV2r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV2r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV2r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV2r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV2r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV2r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV2r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV2[$i])){
                                                break;
                                            }
                                        }
                                        ?>
                                    </div>


                                    <div class="tab-pane fade" id="v-pills-paralelo" role="tabpanel" aria-labelledby="v-pills-paralelo-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="3">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        PARALELO

                                        <?php
                                        $arrayV3 = $forum->vizualizarPost(3);

                                        $i = 0;
                                        while($i < $arrayV3){

                                            echo '<br><br>Pergunta do(a) '.$arrayV3[$i]['nomeUsuario'].': '.$arrayV3[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV3[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV3[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV3[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV3[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV3[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV3[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV3[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV3[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV3r = $forum->vizualizarComent($arrayV3[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV3r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV3r[$j]['nomeUsuario'].': '.$arrayV3r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV3r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV3r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV3r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV3r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV3r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV3r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV3r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV3r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV3[$i])){
                                                break;
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="tab-pane fade" id="v-pills-misto" role="tabpanel" aria-labelledby="v-pills-misto-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="4">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        MISTO 1

                                       <?php
                                        $arrayV4 = $forum->vizualizarPost(4);

                                        $i = 0;
                                        while($i < $arrayV4){

                                            echo '<br><br>Pergunta do(a) '.$arrayV4[$i]['nomeUsuario'].': '.$arrayV4[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV4[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV4[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV4[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV4[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV4[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV4[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV4[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV4[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV4r = $forum->vizualizarComent($arrayV4[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV4r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV4r[$j]['nomeUsuario'].': '.$arrayV4r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV4r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV4r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV4r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV4r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV4r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV4r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV4r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV4r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV4[$i])){
                                                break;
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="tab-pane fade" id="v-pills-misto_2" role="tabpanel" aria-labelledby="v-pills-misto_2-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="5">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        MISTO 2


                                      <?php
                                        $arrayV5 = $forum->vizualizarPost(5);

                                        $i = 0;
                                        while($i < $arrayV5){

                                            echo '<br><br>Pergunta do(a) '.$arrayV5[$i]['nomeUsuario'].': '.$arrayV5[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV5[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV5[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV5[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV5[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV5[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV5[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV5[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV5[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV5r = $forum->vizualizarComent($arrayV5[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV5r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV5r[$j]['nomeUsuario'].': '.$arrayV5r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV5r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV5r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV5r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV5r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV5r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV5r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV5r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV5r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV5[$i])){
                                                break;
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="tab-pane fade" id="v-pills-misto_3" role="tabpanel" aria-labelledby="v-pills-misto3-tab">

                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="6">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        MISTO 3

<?php
                                        $arrayV6 = $forum->vizualizarPost(6);

                                        $i = 0;
                                        while($i < $arrayV6){

                                            echo '<br><br>Pergunta do(a) '.$arrayV6[$i]['nomeUsuario'].': '.$arrayV6[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV6[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV6[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV6[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV6[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV6[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV6[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV6[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV6[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV6r = $forum->vizualizarComent($arrayV6[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV6r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV6r[$j]['nomeUsuario'].': '.$arrayV6r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV6r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV6r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV6r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV6r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV6r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV6r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV6r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV6r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV6[$i])){
                                                break;
                                            }
                                        }
                                        ?>


                                    </div>



                                    <div class="tab-pane fade" id="v-pills-pri" role="tabpanel" aria-labelledby="v-pills-pri-tab">
                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="7">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        PRI


                                       <?php
                                        $arrayV7 = $forum->vizualizarPost(7);

                                        $i = 0;
                                        while($i < $arrayV7){

                                            echo '<br><br>Pergunta do(a) '.$arrayV7[$i]['nomeUsuario'].': '.$arrayV7[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV7[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV7[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV7[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV7[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV7[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV7[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV7[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV7[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV7r = $forum->vizualizarComent($arrayV7[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV7r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV7r[$j]['nomeUsuario'].': '.$arrayV7r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV7r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV7r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV7r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV7r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV7r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV7r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV7r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV7r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV7[$i])){
                                                break;
                                            }
                                        }
                                        ?>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-pur" role="tabpanel" aria-labelledby="v-pills-pur-tab">
                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="9">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        PUR


                                   <?php
                                        $arrayV8 = $forum->vizualizarPost(8);

                                        $i = 0;
                                        while($i < $arrayV8){

                                            echo '<br><br>Pergunta do(a) '.$arrayV8[$i]['nomeUsuario'].': '.$arrayV8[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV8[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV8[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV8[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV8[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV8[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV8[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV8[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV8[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV8r = $forum->vizualizarComent($arrayV8[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV8r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV8r[$j]['nomeUsuario'].': '.$arrayV8r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV8r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV8r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV8r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV8r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV8r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV8r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV8r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV8r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV8[$i])){
                                                break;
                                            }
                                        }
                                        ?>

                                    </div>

                                    <div class="tab-pane fade" id="v-pills-pui" role="tabpanel" aria-labelledby="v-pills-pui-tab">


                                        <div style="margin-left: 45%">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <form method="post" action="forum.php">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="idCalc" value="8">
                                                            <input type="text" name="postagem" placeholder="Faça sua pergunta..." class="form-control" title="Postagem" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                                    <i class="material-icons">
                                                                        send
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        PUI

<?php
                                        $arrayV9 = $forum->vizualizarPost(9);

                                        $i = 0;
                                        while($i < $arrayV9){

                                            echo '<br><br>Pergunta do(a) '.$arrayV9[$i]['nomeUsuario'].': '.$arrayV9[$i]['postPost'].'

                                        <div class="input-group">
                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV9[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV9[$i]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV9[$i]['idPost'].'">
                                                <input type="hidden" name="tipoLike" value="post">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV9[$i]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="post">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV9[$i]['idPost'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV9[$i]['idPost'], 'post', 1).' Deslikes: '.$forum->quantLikes($arrayV9[$i]['idPost'], 'post', 0).'</div>';

                                            echo '<br>
                                            <form action="forum.php" method="POST">
                                            <div class="input-group mb-1" style="width: 400px">
                                                <input type="hidden" name="idPost" value="'.$arrayV9[$i]['idPost'].'">
                                                <input type="text" class="form-control" name="comentario" placeholder="Comente aqui">
                                                <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" style="width: 45px; height: 38px">
                                                        <i class="material-icons">
                                                            send
                                                        </i>
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                            ';

                                            $arrayV9r = $forum->vizualizarComent($arrayV9[$i]['idPost']);

                                            $j = 0;
                                            while($j < $arrayV9r){
                                                echo '<br><div style="margin-left: 40px"><div class="input-group">Resposta do(a) '.$arrayV9r[$j]['nomeUsuario'].': '.$arrayV9r[$j]['comentComent'].' <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV9r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="1">
                                                <button type="submit" class="btn '.$arrayV9r[$j]['btn'].'">
                                                    <i class="material-icons">
                                                        thumb_up_alt
                                                    </i>
                                                </button>
                                            </form>


                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="idPostLike" value="'.$arrayV9r[$j]['idComent'].'">
                                                <input type="hidden" name="tipoLike" value="coment">
                                                <input type="hidden" name="like" value="0">
                                                <button type="submit" class="btn '.$arrayV9r[$j]['btnD'].'">
                                                    <i class="material-icons">
                                                        thumb_down_alt
                                                    </i>
                                                </button>
                                            </form>

                                            <form action="forum.php" method="POST">
                                                <input type="hidden" name="tipoDeletar" value="coment">
                                                <input type="hidden" name="idPostDeletar" value="'.$arrayV9r[$j]['idComent'].'">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </button>
                                            </form>

                                             Likes: '.$forum->quantLikes($arrayV9r[$j]['idComent'], 'coment', 1).' Deslikes: '.$forum->quantLikes($arrayV9r[$j]['idComent'], 'coment', 0).'</div></div>';
                                                $j++;
                                                if(empty($arrayV9r[$j])){
                                                    break;
                                                }
                                            }


                                            $i++;
                                            if(empty($arrayV9[$i])){
                                                break;
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="col-md-1">
            </div>





            <?php
            if(!empty($_POST['postagem'])){
                $postagem = $_POST['postagem'];
                $idCalc = $_POST['idCalc'];

                $resultadoPostagem = $forum->postagem($postagem, $_SESSION['id'], $idCalc);

                if($resultadoPostagem == 'Não postado'){
                    echo 'Não foi possivel postar, tente novamente';
                }else{
                    echo 'Postado com sucesso!';
                }
            }


            if(!empty($_POST['comentario'])){
                $comentario = $_POST['comentario'];
                $idPost = $_POST['idPost'];

                $resultadocomentario = $forum->comentarPost($idPost, $comentario, $_SESSION['id']);

                if($resultadocomentario == 'Não comentado'){
                    echo 'Não foi possivel comentar, tente novamente';
                }else{
                    echo 'Comentado com sucesso!';
                }
            }

            if(!empty($_POST['idPostLike'])){
                $idPostLike = $_POST['idPostLike'];
                $tipoLike = $_POST['tipoLike'];
                $likeLike = $_POST['like'];

                $forum->like($_SESSION['id'], $idPostLike, $tipoLike, $likeLike);
            }

            if(!empty($_POST['idPostDeletar'])){
                $idPostDeletar = $_POST['idPostDeletar'];
                $tipoDeletar = $_POST['tipoDeletar'];

                $forum->deletarPostagem($idPostDeletar, $tipoDeletar);

                echo '<script>alert("Deletado com sucesso!");</script>';
            }
            ?>




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


            </body>
        </html>

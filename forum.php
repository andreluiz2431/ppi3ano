<?php
include 'classes/class_forum.php';

$forum = new Forum();
?>
<html>
    <head>
        <title>Fórum</title>
    </head>
    <body>
        <form method="post" action="forum.php">
            <input type="text" name="postagem" placeholder="Faça sua pergunta..." title="Postagem">
            <input type="submit" value="->">
        </form>

        <?php
        // postagem
        if(!empty($_POST['postagem'])){
            $postagem = $_POST['postagem'];

            $forum->postagem($postagem);
        }

        // comentario
        if(!empty($_POST['comentario'])){
            $comentario = $_POST['comentario'];
            $idpost = $_POST['id'];

            $forum->comentarPost($idpost, $comentario);
        }

        // like POST
        if(isset($_POST['apl'])){
            $apl = $_POST['apl'];

            $forum->avaliacaoPost($apl);
        }

        // deslike POST
        if(isset($_POST['apd'])){
            $apd = $_POST['apd'];

            $forum->avaliacaoPostN($apd);
        }

        // like COMENT
        if(isset($_POST['acl'])){
            $acl = $_POST['acl'];

            $forum->avaliacaoComent($acl);
        }

        // deslike COMENT
        if(isset($_POST['acd'])){
            $acd = $_POST['acd'];

            $forum->avaliacaoComentN($acd);
        }

        $idCircuito = 1; // posts e comentarios de qual circuito

        // ver post
        $forum->vizualizarPost($idCircuito);
        ?>
    </body>
</html>

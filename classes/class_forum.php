<?php
class Forum{
    private $pdo;

    private function conexaoBD(){
        include 'conexaoBD.php';
    }

    public function postagem($post, $idUsuario, $idCalc){ // TESTAR
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i');

        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO post (postPost, dataHoraPost, idUsuario, idCalc) VALUES('.$post.', '.$dataHora.', '.$idUsuario.', '.$idCalc.')');
            $stmt->execute(array(
                ':post' => "$post"
            ));

            echo $stmt->rowCount(); 
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function vizualizarPost($idCalc){ // funciona
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT * FROM post WHERE idCalc = ".$idCalc."");

        $i = 0;
        while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $array[$i]['idPost'] = $linha['idPost'];
            $array[$i]['postPost'] = $linha['postPost'];
            $array[$i]['dataHoraPost'] = $linha['dataHoraPost'];
            $array[$i]['idUsuario'] = $linha['idUsuario'];
            $i++;
        }

        return $array;
    }

    public function comentarPost($idpost, $coment){       
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i');

        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO comentario (idpost, coment, dataHora, idUsuario) VALUES(:idpost, :coment, :dataHora, :avaliacoes, :idUsuario)');
            $stmt->execute(array(
                ':idpost' => "$idpost",
                ':coment' => "$coment",
                ':dataHora' => "$dataHora",
                ':idUsuario' => "$this->idUsuario"
            ));

            echo $stmt->rowCount(); 
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function vizualizarComent($idpost){
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT * FROM comentario WHERE idpost = '$idpost'");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "$this->idUsuario - Coment: {$linha['coment']} - Data e Hora: {$linha['dataHora']} - XXXXXX Likes <br>"

                ."<form method='POST' action='forum.php'><input type='hidden' value='".$linha['idComentario']."' name='idB'><input type='submit' value='Like'></form>"

                ."<form method='POST' action='forum.php'><input type='hidden' value='".$linha['idComentario']."' name='idB'><input type='submit' value='Deslike'></form>";
        }
    }

    public function avaliacaoPost($idPost){ // fazer like postagem
        echo 'id post '.$idPost.' | id usuario '.$this->idUsuario.'<br>';

        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT id_avaliacao FROM avaliacao WHERE (id_post = '$idPost') AND (id_usuario = '$this->idUsuario')");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if(isset($linha['id_avaliacao'])){
                $this->conexaoBD();

                $consulta = $this->pdo->query("DELETE FROM avaliacao WHERE (id_post = '$idPost') AND (id_usuario = '$this->idUsuario')");
            }
        }

        try { // NAO FUNFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            $this->conexaoBD();

            $stmt = $this->pdo->prepare("INSERT INTO avaliacao (id_usuario, id_post, id_coment, curtida, descurtida) VALUES (:id_usuario, :id_post, :id_coment, :curtida, :descurtida");
            $stmt->execute(array(
                ':id_usuario' => $this->idUsuario,
                ':id_post' => $idPost,
                ':id_coment' => "",
                ':curtida' => "sim",
                ':descurtida' => "nao"
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function avaliacaoPostN($idPost){ // fazer deslike postagem
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT id_avaliacao FROM avaliacao WHERE id_post = '$idPost', id_usuario = '$this->idUsuario'");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if(isset($linha['id_avaliacao'])){
                $this->conexaoBD();

                $consulta = $this->pdo->query("DELETE FROM avaliacao WHERE id_post = '$idPost', id_usuario = '$this->idUsuario'");
            }
        }

        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO avaliacao(id_usuario, id_post, id_coment, curtida, descurtida) VALUES (:id_usuario, :id_post, :id_coment, :curtida, :descurtida');
            $stmt->execute(array(
                ':id_usuario' => $this->idUsuario,
                ':id_post' => $idPost,
                ':id_coment' => "",
                ':curtida' => "nao",
                ':descurtida' => "sim"
            ));

            echo $stmt->rowCount(); 
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function avaliacaoComent($idComent){ // fazer like comentario
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT id_avaliacao FROM avaliacao WHERE id_coment = '$idComent', id_usuario = '$this->idUsuario'");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if(isset($linha['id_avaliacao'])){
                $this->conexaoBD();

                $consulta = $this->pdo->query("DELETE FROM avaliacao WHERE id_coment = '$idComent', id_usuario = '$this->idUsuario'");
            }
        }

        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO avaliacao(id_usuario, id_post, id_coment, curtida, descurtida) VALUES (:id_usuario, :id_post, :id_coment, :curtida, :descurtida');
            $stmt->execute(array(
                ':id_usuario' => $this->idUsuario,
                ':id_post' => "",
                ':id_coment' => $idComent,
                ':curtida' => "sim",
                ':descurtida' => "nao"
            ));

            echo $stmt->rowCount(); 
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function avaliacaoComentN($idComent){ // fazer deslike comentario
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT id_avaliacao FROM avaliacao WHERE id_coment = '$idComent', id_usuario = '$this->idUsuario'");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if(isset($linha['id_avaliacao'])){
                $this->conexaoBD();

                $consulta = $this->pdo->query("DELETE FROM avaliacao WHERE id_coment = '$idComent', id_usuario = '$this->idUsuario'");
            }
        }

        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO avaliacao(id_usuario, id_post, id_coment, curtida, descurtida) VALUES (:id_usuario, :id_post, :id_coment, :curtida, :descurtida');
            $stmt->execute(array(
                ':id_usuario' => $this->idUsuario,
                ':id_post' => "",
                ':id_coment' => $idComent,
                ':curtida' => "nao",
                ':descurtida' => "sim"
            ));

            echo $stmt->rowCount(); 
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>

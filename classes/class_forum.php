<?php
class Forum{
    private $pdo;

    private function conexaoBD(){
        include 'conexaoBD.php';
    }

    public function quantLikes($idPostComent, $tipo, $like){ // TESTAR
        // $tipo => se é POST ou COMENT
        // $like => se é CURTIR ou NÃO GOSTEI
        $this->conexaoBD();

        $consulta = $this->pdo->query('SELECT * FROM like WHERE (idPostComent = '.$idPostComent.') AND (tipoLike = "'.$tipo.'") AND (likeLike = "'.$like.'")')->rowCount();

        return $consulta;
    }

    public function like($idUsuario, $idPostComent, $tipo, $like){ // curtir | não curtir
        // $tipo => se é POST ou COMENT
        // $like => se é CURTIR ou NÃO GOSTEI
        $ver = false;
        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO like (idUsuario, idPostComent, tipoLike, likeLike) VALUES('.$idUsuario.', '.$idPostComent.', "'.$tipo.'", "'.$like.'")');
            $stmt->execute(array(
                ':post' => "$post"
            ));

            $ver = true;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        if($ver == false){
            return 'Não funcionou';
        }else{
            return 'Funcionou';
        }
    }

    public function deslike($idUsuario, $idPostComent, $tipo, $like){ // desfazer o curtir | não curtir
        // $tipo => se é POST ou COMENT
        // $like => se é CURTIR ou NÃO GOSTEI
        $this->conexaoBD();

        $stmt = $this->pdo->query('DELETE FROM like WHERE (idUsuario = '.$idUsuario.') AND (idPostComent = '.$idPostComent.') AND (tipoLike = "'.$tipo.'") AND (likeLike = "'.$like.'")');

        return 'Deletado';
    }

    public function postagem($post, $idUsuario, $idCalc){ // TESTAR
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i');

        $ver = false;
        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO post (postPost, dataHoraPost, idUsuario, idCalc) VALUES('.$post.', '.$dataHora.', '.$idUsuario.', '.$idCalc.')');
            $stmt->execute(array(
                ':post' => "$post"
            ));

            $ver = true;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        if($ver == false){
            return 'Não postado';
        }else{
            return 'Postado';
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

    public function comentarPost($idPost, $coment, $idUsuario){
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i');

        $ver = false;
        try {
            $this->conexaoBD();

            $stmt = $this->pdo->prepare('INSERT INTO comentario (idPost, comentComent, dataHoraComent, idUsuario) VALUES('.$idPost.', "'.$coment.'", "'.$dataHora.'", '$idUsuario')');
            $stmt->execute(array(
                ':idpost' => "$idpost"
            ));

            $ver = true;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        if($ver == false){
            return 'Não comentado';
        }else{
            return 'Comentado';
        }
    }

    public function vizualizarComent($idPost){
        $this->conexaoBD();

        $consulta = $this->pdo->query("SELECT * FROM coment WHERE idPost = '$idPost'");

        $i = 0;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $array[$i]['idPost'] = $linha['idPost'];
            $array[$i]['idComent'] = $linha['idComent'];
            $array[$i]['comentComent'] = $linha['comentComent'];
            $array[$i]['dataHoraComent'] = $linha['dataHoraPostComent'];
            $array[$i]['idUsuario'] = $linha['idUsuario'];
            $i++;
        }
        return $array;
    }
}
?>

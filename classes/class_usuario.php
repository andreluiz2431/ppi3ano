<?php
class{
    public $pdo;

    public function conexao(){
        include '../conexaoBD.php';
        // tudo que precisar da conexao colocar $this->conexao();
    }

    public function editarSenha($id, $senhaAtual, $senhaNova){ // TESTAR
        $this->conexao();

        $ver = false;
        try{
            $sql = $this->pdo->prepare("UPDATE usuario SET senhaUsuario='".$senhaNova."' WHERE (idUsuario=".$id") AND (senhaUsuario='".$senhaAtual"')");
            $sql->execute(array(':senhaUsuario' => "'".$senhaNova."'"));

            $ver = true;
        }
        catch(PDOexception $e){// verificação para caso se der errado
            echo "ERRO:".$e->getMessege();
        }

        if($ver == false){
            return 'Não alterado';
        }else{
            return 'Alterado';
        }
    }

    public function excluirConta($id){ // TESTAR
        $this->conexao();
        try{
            $sql = $this->pdo->prepare("UPDATE usuario SET nomeUsuario='off' WHERE idUsuario=".$id"");
            $sql->execute(array(':nomeUsuario' => 'off'));

        }
        catch(PDOexception $e){// verificação para caso se der errado
            echo "ERRO:".$e->getMessege();
        }
        return "Deletado";
    }

    public function editar($id, $nome, $email){ // TESTAR
        $this->conexao();
        $sql=$this->pdo->query("SELECT * FROM usuario WHERE idUsuario = ".$id."");
        while($linha=$sql->fach(PDO::FECH_ASSOC)){
            $nomeUsuario= $linha['nomeUsuario'];
            $emailUsuario= $linha['emailUsuario'];

            if ($nome != $nomeUsuario){
                try{
                    $sql1= $this->pdo->prepare("UPDATE usuario SET nomeUsuario='".$nome."' WHERE idUsuario=".$id"");_
                        $sql1->execute(array(':nomeUsuario' => "$nome"));

                }
                catch(PDOexception $e){// verificação para caso se der errado
                    echo "ERRO:".$e->getMessege();
                }
            }elseif ($email != $emailUsuario){
                try{
                    $sql1= $this->pdo->prepare("UPDATE usuario SET emailUsuario='".$email."' WHERE idUsuario=".$id"");_
                        $sql1->execute(array(':emailUsuario' => "$nome"));

                }
                catch(PDOexception $e){// verificação para caso se der errado
                    echo "ERRO:".$e->getMessege();
                }
            }elseif($nome != $nomeUsuario && $email != $emailUsuario){
                try{
                    $sql1= $this->pdo->prepare("UPDATE usuario SET nomeUsuario='".$nome."', emailUsuario='".$email."'  WHERE idUsuario=".$id"");_
                        $sql1->execute(array(':nomeUsuario' => "$nome"));
                }
                catch(PDOexception $e){// verificação para caso se der errado
                    echo "ERRO:".$e->getMessege();
                }
            }else {
                return "Nenhum dado alterado";
            }
        }

    }

    public function login($nome, $senha){ // TESTAR
        $senhaCriptografada = md5($senha);

        $this->conexao();
        $sql= $this->pdo->query("SELECT * FROM usuario WHERE (nomeUsuario = ".$nome.") AND (senhaUsuario = ".$senhaCriptografada.")");
        $ver = false; // pra caso algum estiver incorreto;
        while($linha=$sql->fach(PDO::FECH_ASSOC)){ // Para fazer o coisa percorrer a variavel e realizar a consulta
            $_SESSION['usuario']= $linha['nomeUsuario'];
            $_SESSION['id']= $linha['idUsuario'];
            $_SESSION['email']= $linha['emailUsuario'];

            $ver= true;
            echo "<script>window.locantion.href= '../creative/index.php';</script>";
            break;
        }
        if ($ver==false){
            return "Dados incorretos";
        }
    }

    public function cadastro($nome,$email, $senha1, $senha2){ // TESTAR
        if ($senha1 == $senha2){
            $senhaCriptografada = md5($senha1);
            try{ // usa pra fazer inserção ou update no PDO
                $this->conexao();
                $sql= $this->pdo->prepare("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario) VALUES(".$nome.",".$email.",".$senhaCriptografada.")");

                $sql->execute(array(':nomeUsuario'=>$nome)); // faz para executar o array em PDO para inserção

                echo "<script>window.locantion.href= '../creative/index.php';</script>";

            }
            catch(PDOexception $e){// verificação para caso se der errado
                echo "ERRO:".$e->getMessege();
            }
        }else{
            return "As senhas não correspondem";
        }
    }
}
?>
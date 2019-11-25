<?php
class Usuario{
    private $pdo;

    private function conexao(){
        include '../conexaoBD.php';
        // tudo que precisar da conexao colocar $this->conexao();
    }

    private function inserirAcesso($idUsuario){ // TESTAR
        // Pegar dia e hora atual
        date_default_timezone_set('America/Sao_Paulo');
        $dataHoraAtual = date('Y-m-d H:i');

        // fazer inserção de acesso do usuário logado
        try{
            $this->conexao();
            $sql= $this->pdo->prepare("INSERT INTO acessos(dataHoraAcesso, idUsuario) VALUES('".$dataHoraAtual."',".$idUsuario.")");

            $sql->execute(array(':dataHoraAcesso'=>$dataHoraAtual)); // faz para executar o array em PDO para inserção

        }catch(PDOexception $e){// verificação para caso se der errado
            echo "ERRO:".$e->getMessege();
        }
    }

    public function verAcessosUsuario($idUsuario){ // TESTAR
        // consultar todos acesso do usuário logado
        $this->conexao();

        $sql=$this->pdo->query("SELECT * FROM acessos WHERE idUsuario = ".$idUsuario."");

        $i = 0;
        while($linha = $sql->fach(PDO::FECH_ASSOC)){
            $array[$i]['dataHoraAcesso'] = $linha['dataHoraAcesso'];
            $array[$i]['idAcesso'] = $linha['idAcesso'];

            $i++;
        }
        return $array;
    }

    public function acessosUsuario($idUsuario){ // TESTAR
        // consultar QUANTIDADE de acessos do usuário logado por dia
        $this->conexao();

        $sql = $this->pdo->query("SELECT * FROM acessos WHERE idUsuario = ".$idUsuario."")->rowCount();

        return $sql;
    }

    public function verAcessosDia($dia){ // TESTAR
        // verificar se funciona, pois no BD ta DATE TIME, e ele vai receber apenas em DATE !

        // consultar acessos do usuário logado no dia especifico
        $this->conexao();

        $sql = $this->pdo->query("SELECT * FROM acessos WHERE dataHoraAcesso = '".$dia."'");

        $i = 0;
        while($linha = $sql->fach(PDO::FECH_ASSOC)){
            $array[$i]['dataHoraAcesso'] = $linha['dataHoraAcesso'];
            $array[$i]['idAcesso'] = $linha['idAcesso'];

            $i++;
        }
        return $array;
    }

    public function acessosDia($dia){ // TESTAR
        // verificar se funciona, pois no BD ta DATE TIME, e ele vai receber apenas em DATE !

        // consultar QUANTIDADE de acessos no dia especifico
        $this->conexao();

        $sql = $this->pdo->query("SELECT * FROM acessos WHERE dataHoraAcesso = '".$dia."'")->rowCount();

        return $sql;
    }

    public function verAcessosDiaUsuario($idUsuario, $dia){ // TESTAR
        // verificar se funciona, pois no BD ta DATE TIME, e ele vai receber apenas em DATE !

        // consultar acessos do usuário logado no dia especifico
        $this->conexao();

        $sql = $this->pdo->query("SELECT * FROM acessos WHERE (idUsuario = ".$idUsuario.") AND (dataHoraAcesso = '".$dia."')");

        $i = 0;
        while($linha = $sql->fach(PDO::FECH_ASSOC)){
            $array[$i]['dataHoraAcesso'] = $linha['dataHoraAcesso'];
            $array[$i]['idAcesso'] = $linha['idAcesso'];

            $i++;
        }
        return $array;
    }

    public function acessosDiaUsuario($idUsuario, $dia){ // TESTAR
        // verificar se funciona, pois no BD ta DATE TIME, e ele vai receber apenas em DATE !

        // consultar QUANTIDADE de acessos do usuário logado no dia especifico
        $this->conexao();

        $sql = $this->pdo->query("SELECT * FROM acessos WHERE (idUsuario = ".$idUsuario.") AND (dataHoraAcesso = '".$dia."')")->rowCount();

        return $sql;
    }

    public function verificarLogado(){ // TESTAR             Instanciar em todas as telas menos no Login e Cadastro
        if(empty($_SESSION['usuario'])){
            echo '<a class="nav-link js-scroll-trigger" href="../sb-admin-2/index.php">Login</a>';
        }
    }

    public function editarSenha($id, $senhaAtual, $senhaNova){ // TESTAR
        //criptografia
        $senhaAtualCriptografada = md5($senhaAtual);
        $senhaNovaCriptografada = md5($senhaNova);

        $this->conexao();

        $ver = false;
        try{
            $sql = $this->pdo->prepare("UPDATE usuario SET senhaUsuario='".$senhaNovaCriptografada."' WHERE (idUsuario=".$id.") AND (senhaUsuario='".$senhaAtualCriptografada."')");
            $sql->execute(array(':senhaUsuario' => "'".$senhaNovaCriptografada."'"));

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
            $sql = $this->pdo->prepare("UPDATE usuario SET nomeUsuario='off' WHERE idUsuario=".$id."");
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
                    $sql1 = $this->pdo->prepare("UPDATE usuario SET nomeUsuario='".$nome."' WHERE idUsuario=".$id."");
                    $sql1->execute(array(':nomeUsuario' => "$nome"));

                }
                catch(PDOexception $e){// verificação para caso se der errado
                    echo "ERRO:".$e->getMessege();
                }
            }elseif ($email != $emailUsuario){
                try{
                    $sql1= $this->pdo->prepare("UPDATE usuario SET emailUsuario='".$email."' WHERE idUsuario=".$id."");
                    $sql1->execute(array(':emailUsuario' => "$nome"));

                }
                catch(PDOexception $e){// verificação para caso se der errado
                    echo "ERRO:".$e->getMessege();
                }
            }elseif($nome != $nomeUsuario && $email != $emailUsuario){
                try{
                    $sql1= $this->pdo->prepare("UPDATE usuario SET nomeUsuario='".$nome."', emailUsuario='".$email."'  WHERE idUsuario=".$id."");
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

            $this->inserirAcesso($linha['idUsuario']);

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

                $_SESSION['usuario']= $nome;
                $_SESSION['email']= $email;

                // pegar id do usuario
                $this->conexao();
                $sql1= $this->pdo->query("SELECT * FROM usuario WHERE (nomeUsuario = ".$nome.") AND (senhaUsuario = ".$senhaCriptografada.")");
                while($linha=$sql1->fach(PDO::FECH_ASSOC)){
                    $_SESSION['id']= $linha['idUsuario'];

                    $this->inserirAcesso($linha['idUsuario']);

                    echo "<script>window.locantion.href= '../creative/index.php';</script>";
                }
            }catch(PDOexception $e){// verificação para caso se der errado
                echo "ERRO:".$e->getMessege();
            }
        }else{
            return "As senhas não correspondem";
        }
    }
}
?>

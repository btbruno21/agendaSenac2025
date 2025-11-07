<?php
require_once 'classes/conexao.php';

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $permissoes;

    private $con;

    public function __construct()
    {
        $this->con = new Conexao();
    }

    private function existeEmail($email)
    {
        $sql = $this->con->conectar()->prepare("SELECT id FROM usuario WHERE email = :email");
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(); //retorna o email encontrado
        } else {
            $array = array();
        }
        return $array;
    }

    public function adicionarUsuario($email, $nome, $senha, $permissoes)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->email = $email;
                $this->senha = md5($senha);
                $this->permissoes = $permissoes;
                $sql = $this->con->conectar()->prepare("INSERT INTO usuario(nome, email, senha, permissoes) VALUES (:nome, :email, :senha, :permissoes)");
                $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                $sql->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                $sql->bindParam(":permissoes", $this->permissoes, PDO::PARAM_STR);
                $sql->execute();
                return TRUE;
            } catch (PDOException $ex) {
                return 'ERRO: ' . $ex->getMessage();
            }
        } else {
            return FALSE;
        }
    }

    public function listarUsuario()
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM usuario");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            echo 'ERRO: ' . $ex->getMessage();
        }
    }

    public function buscarUsuario($id)
    {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM usuario WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $usuario = $sql->fetch();
                if (!empty($usuario['permissoes'])) {
                    $usuario['permissoes'] = explode(",", $usuario['permissoes']);
                } else {
                    $usuario['permissoes'] = [];
                }

                return $usuario;
            } else {
                return array();
            }
        } catch (PDOException $ex) {
            echo 'ERRO: ' . $ex->getMessage();
        }
    }

    public function editarUsuario($nome, $email, $permissoes, $id)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) > 0 && $emailExistente['id'] != $id) {
            return FALSE;
        } else {
            try {
                $sql = $this->con->conectar()->prepare("UPDATE usuario SET nome = :nome, email = :email, permissoes = :permissoes WHERE id = :id");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':permissoes', $permissoes);
                $sql->bindValue(':id', $id);
                $sql->execute();
                return TRUE;
            } catch (PDOException $ex) {
                echo 'ERRO: ' . $ex->getMessage();
            }
        }
    }

    public function deletarUsuario($id)
    {
        $usuario = $this->buscarUsuario($id);

        if (empty($usuario)) {
            return false;
        }

        try {
            $sql = $this->con->conectar()->prepare("DELETE FROM usuario WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo 'ERRO: ' . $ex->getMessage();
            return false;
        }
    }

    public function fazerLogin($email, $senha)
    {
        $sql = $this->con->conectar()->prepare("SELECT id, email, senha FROM usuario WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $_SESSION['logado'] = $sql['id'];
            return true;
        }
        return false;
    }

    public function setUsuario($id)
    {
        $this->id = $id;
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuario WHERE id = :id");
        $sql->bindValue(":id", $this->id);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $this->permissoes = explode(',', $sql['permissoes']);
        }
    }

    public function temPermissao($p){
        if(in_array($p, $this->permissoes)){
            return TRUE;
        }
        return false;
    }

    public function getPermissoes(){
        return $this->permissoes;
    }
}

<?php
class UsuarioDAO
{
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new PDO("mysql:host=localhost; dbname=biketracker; charset=utf8", "root", "");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function inserirUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("INSERT into usuario (nome, email, cpf, senha, imagem) values (:nome, :email, :cpf, :senha, :imagem)");

            $resultado = $query->execute(['nome' => $usuario->getNome(), 'email' => $usuario->getEmail(), 'cpf' => $usuario->getCpf(), 'senha' => $usuario->getSenha(), 'imagem' => $usuario->getImagem()]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function alterarUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("UPDATE usuario set nome= :nome, email = :email, cpf= :cpf, senha= :senha, imagem= :imagem where codUsuario = :codUsuario");
            $resultado = $query->execute(['nome' => $usuario->getnome(), 'email' => $usuario->getemail(), 'cpf' => $usuario->getcpf(), 'senha' => $usuario->getsenha(), 'imagem' =>$usuario->getImagem(),'codUsuario' => $usuario->getcodUsuario()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarUsuario($codUsuario){
        try {
            $query = $this->conexao->prepare("DELETE FROM usuario WHERE codUsuario = :codUsuario");
            $resultado = $query->execute(['codUsuario' => $codUsuario]);
            return $resultado;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function buscarUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("SELECT * from usuario where codUsuario=:codUsuario");
            if ($query->execute(['codUsuario' => $usuario->getcodUsuario()])) {
                $usuario = $query->fetch(); //coloca os dados num array $usuario
                return $usuario;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function acessarUsuario($usuario)
    {
        try {
            $query = $this->conexao->prepare("SELECT * from usuario where email=:email and senha=:senha");
            if ($query->execute(['email' => $usuario->getemail(), 'senha' => $usuario->getsenha()])) {
                $usuario = $query->fetch(); //coloca os dados num array $usuario
                if ($usuario) {
                    return $usuario;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

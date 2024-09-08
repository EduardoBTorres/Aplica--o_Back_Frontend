<?php
class Usuario
{
    private $codUsuario;
    private $nome;
    private $email;
    private $cpf;
    private $senha;
    private $imagem;
    
    
    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }
}
?>

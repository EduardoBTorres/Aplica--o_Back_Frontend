<?php
   Class Usuario{
       private $codUsuario;
       private $nome;
       private $email;
       private $cpf;
       private $senha;
       private $imagem;  

      public function setcodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
            }
      public function getcodUsuario() {
        return $this->codUsuario;
            }

      public function setnome($nome) {
             $this->nome = $nome;
            }
      public function getnome() {
        return $this->nome;
            }

      public function setemail($email) {
             $this->email = $email;
            }
      public function getemail() {
        return $this->email;
            }

      public function setcpf($cpf) {
             $this->cpf = $cpf;
            }
      public function getcpf() {
        return $this->cpf;
            }

      public function setsenha($senha) {
             $this->senha = $senha;
            }
      public function getsenha() {
        return $this->senha;
            }

      public function setimagem($imagem) {
             $this->imagem = $imagem;
            }
      public function getimagem() {
        return $this->imagem;
            }

}
?>
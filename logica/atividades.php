<?php
class Atividades {
    private $codAtividades;
    private $titulo;
    private $local;
    private $distancia;
    private $tempo;
    private $data;
    private $descricao;  

    public function setcodAtividades($codAtividades) {
        $this->codAtividades = $codAtividades;
    }

    public function getcodAtividades() {
        return $this->codAtividades;
    }

    public function settitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function gettitulo() {
        return $this->titulo;
    }

    public function setlocal($local) {
        $this->local = $local;
    }

    public function getlocal() {
        return $this->local;
    }

    public function setdistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function getdistancia() {
        return $this->distancia;
    }

    public function settempo($tempo) {
        $this->tempo = $tempo;
    }

    public function gettempo() {
        return $this->tempo;
    }

    public function setdata($data) {
        $this->data = $data;
    }

    public function getdata() {
        return $this->data;
    }

    public function setdescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getdescricao() {
        return $this->descricao;
    }
}
?>

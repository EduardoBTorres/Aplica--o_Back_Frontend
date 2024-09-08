<?php
class Atividades
{
    private $codAtividades;
    private $titulo;
    private $local;
    private $distancia;
    private $tempo;
    private $data;
    private $descricao;
    private $codUsuario;
    private $codBicicleta;

    public function setCodAtividades($codAtividades) {
        $this->codAtividades = $codAtividades;
    }

    public function getCodAtividades() {
        return $this->codAtividades;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function getLocal() {
        return $this->local;
    }

    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    public function getTempo() {
        return $this->tempo;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setCodBicicleta($codBicicleta) {
        $this->codBicicleta = $codBicicleta;
    }

    public function getCodBicicleta() {
        return $this->codBicicleta;
    }
}
?>

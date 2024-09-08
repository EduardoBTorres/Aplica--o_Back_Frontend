<?php

class Bicicleta
{
    private $codBicicleta;
    private $marca;
    private $modelo;
    private $aro;
    private $cor; // Adicionado para corresponder com o DAO
    private $codUsuario; // Adicionado para corresponder com o DAO

    public function setCodBicicleta($codBicicleta) {
        $this->codBicicleta = $codBicicleta;
    }

    public function getCodBicicleta(): int {
        return $this->codBicicleta;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setModelo($modelo) {
        $this->modelo =$modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setAro($aro) {
        if ($aro <= 0) {
            throw new InvalidArgumentException('O aro deve ser um número positivo.');
        }
        $this->aro = $aro;
    }

    public function getAro() {
        return $this->aro;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getCodUsuario(): int {
        return $this->codUsuario;
    }
}
?>

<?php
   Class Bicicletas{
       private $codBicicleta;
       private $marca;
       private $modelo;
       private $aro;  

      public function setcodBicicleta($codBicicleta) {
        $this->codBicicleta = $codBicicleta;
            }
      public function getcodBicicletas() {
        return $this->codBicicleta;
            }

      public function setmarca($marca) {
             $this->marca = $marca;
            }
      public function getmarca() {
        return $this->marca;
            }

      public function setmodelo($modelo) {
             $this->modelo = $modelo;
            }
      public function getmodelo() {
        return $this->modelo;
            }

      public function setaro($aro) {
             $this->aro = $aro;
            }
      public function getaro() {
        return $this->aro;
            }

}
?>
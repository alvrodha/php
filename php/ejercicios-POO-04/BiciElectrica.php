<?php

class BiciElectrica {
    private $id;
    private $coordx;
    private $coordy;
    private $bateria;
    private $operativa;


    public function __construct($id, $coordx, $coordy, $bateria, $operativa) {
        $this->id = (int)$id;
        $this->coordx = (int)$coordx;
        $this->coordy = (int)$coordy;
        $this->bateria = (int)$bateria;
        $this->operativa = (bool)$operativa; 
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function toString() {
        return "Identificador: " . $this -> id . " Estado de la batería: " . $this -> bateria . "%";
    }

    public function distancia($x, $y) {
        $distancia = sqrt(pow(($this->coordx - $x),2) + pow(($this->coordx - $y),2));
        return $distancia;
    }
}
?>
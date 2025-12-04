<?php
class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    function info() {
        return "ID: $this->id, Nombre: $this->nombre, Precio: $this->precio, Stock: $this->stock";
    }
}
?>
<?php
class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    function __set($name, $value) {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        }
    }
}
?>
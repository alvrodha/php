<?php

class Coche {

    private $modelo;
    private $distanciaParcial;
    private $distanciaTotal;
    private $motor;
    private $velocidad;
    private $velocidadMax;

    public function __construct($modelo, $velocidadMax) {
        $this -> modelo = $modelo;
        $this -> velocidadMax = $velocidadMax;
        $this -> distanciaParcial = 0;
        $this -> distanciaTotal = 0;
        $this -> motor = false;
        $this -> velocidad = 0;
    }

    public function  arrancar(){
        if ($this -> motor) {
            $this -> infoError("Motor ya arrancado");
            return false;
        } else {
            $this -> motor = true;
            return true;
        }
    }
    
    public function parar(){
        if ($this -> motor) {
            $this -> infoError("Motor ya parado");
            return false;
        } else {
            $this -> motor = false;
            $this -> distanciaParcial = 0;
            $this -> velocidad = 0;
            return true;
        }    
    }
    
    public function acelera( int $cantidad){
        if ($this -> motor) {
            if (($cantidad + $this -> velocidad) < $this -> velocidadMax ) {
                $this -> velocidad += $cantidad;
            } else {
                $this -> velocidad = $this -> velocidadMax;
            }
            return true;
        } else {
            $this -> infoError("Motor parado, no se puede acelerar");
            return false;
        }
        
    }
    
    public function frena ( int $cantidad){
        if ($this -> motor) {
            if (($this -> velocidad - $cantidad) > 0 ) {
                $this -> velocidad -= $cantidad;
            } else {
                $this -> velocidad = 0;
            }
            return true;
        } else {
            $this -> infoError("El coche ya está parado");
            return false;
        }
    }
    
    public function recorre (){
        if ($this -> motor) {
            $this -> distanciaTotal += $this -> velocidad;
            $this -> distanciaParcial += $this -> velocidad;
            return true;
        } else {
            $this -> infoError("No puede recorrer nada");
            return false;
        }
    }
    
    public function info():string{
        $msg = "";
        if ($this -> motor) {
            $msg = "Arrancado";
        } else {
            $msg = "Parado";
        }


        return "velocidad actual: ". $this -> velocidad . "  Estado actual: " . $msg . "  kilometros parciales: " . $this -> distanciaParcial . "  kilometros totales: " . $this -> distanciaTotal . "<br>";
    }
    
    public function getKilometros():int{
        return $this -> distanciaParcial;
    }
    
    private function infoError( String $mensaje):void{
        print ("Error: " . $mensaje . "<br>");
    }	




}



?>
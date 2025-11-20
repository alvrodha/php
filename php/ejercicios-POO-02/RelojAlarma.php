<?php
    include_once 'Reloj.php';
class RelojAlarma extends Reloj {
    private $segAlarma;
    private bool $activada;


    public function __construct(int $horas, int $minutos, int $segundos) {
        parent::__construct($horas, $minutos, $segundos);
        $this -> segAlarma = 0;
        $this -> activada = false;
    }

    public function setAlarma($hora, $minuto) {
        $this -> segAlarma = $hora * 3600 + $minuto * 60;
        $this -> activada = true;
    }

    public function activarAlarma($estado) {
        $this -> activada = $estado;
    }

    public function tictac() {
        $this -> segundos++;
        $msg = "";
        if ($this -> segundos  > 8600)  $this -> segundos = 0;
        if ($this -> segundos == $this -> segAlarma && $this -> activada) {
            print("<br> ¡¡¡ALARMA!!! " . $this -> mostrar() . "<br>");
        }
    }
}
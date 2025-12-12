<?php

include_once 'Cliente.php';
include_once 'Pedido.php';

class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo() {
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    public function __construct() {
        try {
            $dns = 'mysql:host=localhost;dbname=tienda';
            $this->dbh = new \PDO($dns, 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
            exit();
        }
    }

    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo un array de objeto de Pedidos
    public function getPedidos ($codigo):array {
        $tprod = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt_productos  = $this->dbh->prepare("select * from pedidos where cod_cliente = :cod_cliente");
        // Los resultados se devuelven como objetos de la clase Productos
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $stmt_productos->bindParam(':cod_cliente', $codigo);
        
        // Ejecuto la sentencias 
        if ( $stmt_productos->execute() ){
            $tprod = $stmt_productos->fetchAll();
        }
        return $tprod;
    }
    
    // Devuelvo un cliente o false
    public function getCliente (String $nombre, String $clave) {
        $cli = false;
        $stmt_cliente   = $this->dbh->prepare("select * from clientes where nombre =? and clave =?");
        $stmt_cliente->setFetchMode(PDO::FETCH_CLASS, 'cliente');
        $stmt_cliente->bindParam( 1, $nombre);
        $stmt_cliente->bindParam( 2, $clave);
        if ( $stmt_cliente->execute() ){
             // Solo hay un objeto
             if ( $obj = $stmt_cliente->fetch()){
                $cli= $obj;
            }
        }
        return $cli;
    }

    public function incrementarVeces(String $cod_cliente){
        $stmt_modCli = $this->dbh->prepare("update clientes set veces=veces+1 where cod_cliente=:cod_cliente");
        $stmt_modCli->bindValue(':cod_cliente',$cod_cliente);
        $stmt_modCli->execute();
        // El número de filas modificadas debe ser 1
        $resu = ($stmt_modCli->rowCount () == 1);
        return $resu;
    }
}
?>
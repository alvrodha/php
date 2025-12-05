<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios y Patrón Singleton 
 * Un único objeto para la clase
 * VERSION 1:  las sentencias precompiladas ser crean en cada función
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    
    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton, se accede por getModelo
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";dbname=".DATABASE.";charset=utf8";
            // Creo el objeto PDO estableciendo la conexión a la BD
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            // Si falla genera una excepción
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo un array de objeto de Productos
    public function getProductos():array {
        $tprod = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt_productos  = $this->dbh->prepare("select * from Productos");
        // Los resultados se devuelven como objetos de la clase Producto
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        
        // Ejecuto la sentencias 
        if ( $stmt_productos->execute() ){
            //$tuser = $stmt_usuarios->fetchAll();
            // Mientra $user no sea false, sea un objeto
            while ( $prod = $stmt_productos->fetch()){
               // añado ese objeto a la tabla
               $tprod[]= $prod;
            }
        }
        

        return $tprod;
    }
    
    // Devuelvo un usuario o false
    public function getProducto (String $nombre) {
        $prod = false;
        $stmt_producto   = $this->dbh->prepare("select * from Productos where nombre=:nombre");
        $stmt_producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt_producto->bindParam(':nombre', $nombre);
        if ( $stmt_producto->execute() ){
             // Solo hay un objeto
             if ( $obj = $stmt_producto->fetch()){
                $prod= $obj;
            }
        }
        return $prod;
    }
    
    // UPDATE
    public function modProducto($prod):bool{
      
        $stmt_modproducto   = $this->dbh->prepare("update Productos set nombre=:nombre, precio=:precio, stock=:stock where nombre=:nombre");
        $stmt_modproducto->bindValue(':nombre',$prod->nombre);
        $stmt_modproducto->bindValue(':precio',$prod->precio);
        $stmt_modproducto->bindValue(':stock',$prod->stock);
        $stmt_modproducto->execute();
        // El número de filas modificadas debe ser 1
        $resu = ($stmt_modproducto->rowCount () == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($prod):bool{
        $stmt_creaproducto  = $this->dbh->prepare("insert into Productos (nombre,precio,stock) Values(?,?,?)");
        //$stmt_creauser->bindValue(1,$user->login);
        $stmt_creaproducto->execute( [$prod->nombre, $prod->precio, $prod->stock]);
        $resu = ($stmt_creaproducto->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $nombre):bool {
        $stmt_borproducto = $this->dbh->prepare("delete from productos where nombre =:nombre");
        $stmt_borproducto->bindValue(':nombre', $nombre);
        $stmt_borproducto->execute();
        $resu = ($stmt_borproducto->rowCount () == 1);
        return $resu;
    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}


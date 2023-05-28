<?php
class Conexion{
    private static $instancia;
    private $conexion;

    private function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "danielordo123";
        $database = "drogueria_abc";

        $this->conexion = new mysqli($servername, $username, $password, $database);

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Conexion();
        }

        return self::$instancia;
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}

$conexion = Conexion::obtenerInstancia();
$conn = $conexion->obtenerConexion();

class ConexionFactory {
    public static function create() {
        return function() {
            return Conexion::obtenerInstancia();
        };
    }
}

return ConexionFactory::class;
?>
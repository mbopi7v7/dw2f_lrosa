<?php
class Conexion {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("mariadb", "root", "root", "dw2f_ibenitez");
        if ($this->conn->connect_error) {
            die(json_encode(["estado"=>"error","mensaje"=>"Error de conexión: ".$this->conn->connect_error]));
        }
        $this->conn->set_charset("utf8");
    }

    public function getConexion() {
        return $this->conn;
    }
}
?>

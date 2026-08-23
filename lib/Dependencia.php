<?php
class Dependencia {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function getAll() {
        $sql = "SELECT * FROM dependencias";
        $result = $this->conn->query($sql);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function insert($datos) {
        $stmt = $this->conn->prepare("INSERT INTO dependencias (nombre,tipo,edificio,piso,responsable,telefono,correo,estado) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss",
            $datos['nombre'],
            $datos['tipo'],
            $datos['edificio'],
            $datos['piso'],
            $datos['responsable'],
            $datos['telefono'],
            $datos['correo'],
            $datos['estado']
        );
        return $stmt->execute();
    }
}
?>

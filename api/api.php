<?php
require_once("../lib/Conexion.php");
require_once("../lib/Dependencia.php");

$conexion = new Conexion();
$db = $conexion->getConexion();
$dep = new Dependencia($db);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'listar') {
        $data = $dep->getAll();
        echo json_encode(["estado"=>"ok","cantidad"=>count($data),"datos"=>$data]);
    } else {
        echo json_encode(["estado"=>"ok","cantidad"=>0,"datos"=>[]]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $_POST;
    // Validaciones básicas
    if(empty($datos['nombre']) || empty($datos['correo']) || !filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["estado"=>"error","mensaje"=>"Datos inválidos"]);
        exit;
    }
    $ok = $dep->insert($datos);
    if($ok){
        echo json_encode(["estado"=>"ok","mensaje"=>"Dependencia registrada"]);
    } else {
        echo json_encode(["estado"=>"error","mensaje"=>"No se pudo insertar"]);
    }
}
?>

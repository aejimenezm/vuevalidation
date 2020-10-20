<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

function permisos()
{
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Credentials: true');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
        exit(0);
    }
}
permisos();

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
switch ($opcion) {
    case 1:
        $consulta = "SELECT em.id AS ID, 
        em.nombre_completo AS NOMBRE, 
        em.fecha_in AS FECHA_INGRESO, 
        em.dpi AS DPI, 
        a.nom_area  AS AREA  
        FROM empleado em 
        INNER JOIN area a 
        ON em.area = a.id 
        WHERE (em.dpi REGEXP '^[0-9]{4}\s?[0-9]{5}\s?[0-9]{4}$') = 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;

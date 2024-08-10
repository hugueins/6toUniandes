<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

//TODO: controlador de proveedores

require_once('../models/unidadmedida.model.php');
//error_reporting(0);
$unidad_medida= new unidad_medida;

switch ($_GET["op"]) {
        //TODO: operaciones de proveedores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de las unidad de medida
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase unidadmnedida.model.php
        $datos =$unidad_medida->todos(); // Llamo al metodo todos de la clase unidadmnedida.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos =$unidad_medida->uno($idUnidad_Medida);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos =$unidad_medida->insertar($Detalle, $Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos =$unidad_medida->actualizar($idUnidad_Medida, $Detalle, $Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos =$unidad_medida->eliminar($idUnidad_Medida);
        echo json_encode($datos);
        break;
}

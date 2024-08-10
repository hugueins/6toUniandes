<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

//TODO: controlador de clientes

require_once('../models/clientes.model.php');
//error_reporting(0);
$clientes = new Clientes;
switch ($_GET["op"]) {
        //TODO: operaciones de clientes
    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los clientes
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase clientes.model.php
        $datos = $clientes->todos(); // Llamo al metodo todos de la clase clientes.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idclientes = $_POST["idclientes"];
        $datos = array();
        $datos = $clientes->uno($idclientes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];

        $datos = array();
        $datos = $clientes->insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idclientes = $_POST["idclientes"];
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];
        $datos = array();
        $datos = $clientes->actualizar($idclientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idclientes = $_POST["idclientes"];
        $datos = array();
        $datos = $clientes->eliminar($idclientes);
        echo json_encode($datos);
        break;
}

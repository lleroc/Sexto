<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de proveedores

require_once('../models/proveedores.model.php');
error_reporting(0);
$proveedores = new Provedores;

switch ($_GET["op"]) {
        //TODO: operaciones de proveedores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $proveedores->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idProveedores = $_POST["idProveedores"];
        $datos = array();
        $datos = $proveedores->uno($idProveedores);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Nombre_Empresa = $_POST["Nombre_Empresa"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Contacto_Empresa = $_POST["Contacto_Empresa"];
        $Teleofno_Contacto = $_POST["Teleofno_Contacto"];

        $datos = array();
        $datos = $proveedores->insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idProveedores = $_POST["idProveedores"];
        $Nombre_Empresa = $_POST["Nombre_Empresa"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Contacto_Empresa = $_POST["Contacto_Empresa"];
        $Teleofno_Contacto = $_POST["Teleofno_Contacto"];
        $datos = array();
        $datos = $proveedores->actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idProveedores = $_POST["idProveedores"];
        $datos = array();
        $datos = $proveedores->eliminar($idProveedores);
        echo json_encode($datos);
        break;
}

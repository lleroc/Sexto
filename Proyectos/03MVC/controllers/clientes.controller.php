<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

//TODO: controlador de clientes Tienda Cel@g

require_once('../models/clientes.model.php');
error_reporting(0);
$clientes = new Clientes;

switch ($_GET["op"]) {
        //TODO: operaciones de clientes
    case 'buscar': // Procedimiento para cargar todos los datos de los clientes
        if (!isset($_POST["texto"])) {
            echo json_encode(["error" => "Client ID not specified."]);
            exit();
        }
        $texto = intval($_POST["texto"]);
        $datos = array();
        $datos = $clientes->buscar($texto);
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'todos': // Procedimiento para cargar todos los datos de los clientes
        $datos = array();
        $datos = $clientes->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno': // Procedimiento para obtener un registro de la base de datos
        if (!isset($_POST["idClientes"])) {
            echo json_encode(["error" => "Client ID not specified."]);
            exit();
        }
        $idClientes = intval($_POST["idClientes"]);
        $datos = array();
        $datos = $clientes->uno($idClientes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar': // Procedimiento para insertar un cliente en la base de datos
        if (!isset($_POST["Nombres"]) || !isset($_POST["Direccion"]) || !isset($_POST["Telefono"]) || !isset($_POST["Cedula"]) || !isset($_POST["Correo"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];

        $datos = array();
        $datos = $clientes->insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;

    case 'actualizar': // Procedimiento para actualizar un cliente en la base de datos
        if (!isset($_POST["idClientes"]) || !isset($_POST["Nombres"]) || !isset($_POST["Direccion"]) || !isset($_POST["Telefono"]) || !isset($_POST["Cedula"]) || !isset($_POST["Correo"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $idClientes = intval($_POST["idClientes"]);
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];

        $datos = array();
        $datos = $clientes->actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;

    case 'eliminar': // Procedimiento para eliminar un cliente en la base de datos
        if (!isset($_POST["idClientes"])) {
            echo json_encode(["error" => "Client ID not specified."]);
            exit();
        }
        $idClientes = intval($_POST["idClientes"]);
        $datos = array();
        $datos = $clientes->eliminar($idClientes);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}

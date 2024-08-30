<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
include_once('../models/usuarios.model.php');
error_reporting(0);
$usuario = new UsuariosModel();
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $usuario->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        if (!isset($_POST["idUsuarios"])) {
            echo json_encode(["error" => "Seleccione un usuario"]);
        }
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $usuario->uno($idUsuarios);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        if (!isset($_POST["Nombre_Usuario"]) || !isset($_POST["Contrasenia"]) || !isset($_POST["Estado"]) || !isset($_POST["Roles_idRoles"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $nombreUsuario = $_POST["Nombre_Usuario"];
        $contrasenia = $_POST["Contrasenia"];
        $estado = intval($_POST["Estado"]);
        $rolesIdRoles = intval($_POST["Roles_idRoles"]);

        $datos = array();
        $datos = $usuarios->insertar($nombreUsuario, $contrasenia, $estado, $rolesIdRoles);
        echo json_encode($datos);
        break;

    case 'actualizar':
        if (!isset($_POST["idUsuarios"]) || !isset($_POST["Nombre_Usuario"]) || !isset($_POST["Contrasenia"]) || !isset($_POST["Estado"]) || !isset($_POST["Roles_idRoles"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $idUsuarios = intval($_POST["idUsuarios"]);
        $nombreUsuario = $_POST["Nombre_Usuario"];
        $contrasenia = $_POST["Contrasenia"];
        $estado = intval($_POST["Estado"]);
        $rolesIdRoles = intval($_POST["Roles_idRoles"]);

        $datos = array();
        $datos = $usuarios->actualizar($idUsuarios, $nombreUsuario, $contrasenia, $estado, $rolesIdRoles);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["idUsuarios"])) {
            echo json_encode(["error" => "User ID not specified."]);
            exit();
        }
        $idUsuarios = intval($_POST["idUsuarios"]);
        $datos = array();
        $datos = $usuarios->eliminar($idUsuarios);
        echo json_encode($datos);
        break;

    case 'login':
        if (!isset($_POST["Nombre_Usuario"]) || !isset($_POST["Contrasenia"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $nombreUsuario = $_POST["Nombre_Usuario"];
        $contrasenia = $_POST["Contrasenia"];
        $result = $usuario->login($nombreUsuario, $contrasenia);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(["success" => false, "error" => "Invalid credentials."]);
        }
        break;

    default:
        # code...
        break;
}

<?php
error_reporting(0);
require_once("../models/alumnos.models.php");
$alumnos = new Alumnos();

switch ($_GET["op"]) {
    case "todos":
        $datos = $alumnos->todos();
        while ($row = mysqli_fetch_assoc($datos)) { ///muchos registros 
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $idAlumno = $_POST["idAlumno"];
        $datos = $alumnos->uno($idAlumno);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "insertar":
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Edad = $_POST["Edad"];
        $datos = $alumnos->insertar($Nombre, $Apellido, $Edad);
        echo json_encode($datos);
        break;
    case "actualizar":
        $idAlumno = $_POST["idAlumno"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Edad = $_POST["Edad"];
        $datos = $alumnos->actualizar($idAlumno, $Nombre, $Apellido, $Edad);
        echo json_encode($datos);
        break;
    case "eliminar":
        $idAlumno = $_POST["idAlumno"];
        $datos = $alumnos->eliminar($idAlumno);
        echo json_encode($datos);
        break;
}

<?php
require_once('../Models/cls_usuario.model.php');
$usuarios = new Clase_Usuarios;
switch ($_GET["op"]){
    case 'login':
        $correo = $_POST["correo"];
        $contrasenia = $_POST["contrasenia"];
        if(empty($correo) || empty($contrasenia)){
            header("Location:../login.php?op=1"); //llenar datos vacios
            exit();
        }
        try {
            $datos = array(); //defino un arreglo
            $datos = $usuarios->login($correo, $contrasenia); // almano en el arreglo la información de la base de datos
            $respuesta = mysqli_fetch_assoc($datos); // declaro una variable "respuesta" para usar los valores que trae
            if(is_array($respuesta) and count($respuesta)>0){  // comparar si la variable "respuesta" tiene datos y es un arreglo
                //poner variables de session controlar accessos
                //$respuesta -> trae toda la información del usuario
                if($contrasenia == $respuesta["Contrasenia"]){  //comparar la contraseña de la base con la contraseña que ingreso el usuario
                    $_SESSION['Nombres']  = $respuesta["Nombres"];
                    $_SESSION['Apellidos'] = $respuesta["Apellidos"];
                    header("Location:../views/index.php");
                }else{
                    header("Location:../login.php?op=2"); //el usuario o la contraseña son incorrectos
                    exit();
                }
            }else{
                header("Location:../login.php?op=2"); //el usuario o la contraseña son incorrectos
                exit();
            }
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
            header("Location:../login.php?op=3"); // no se que error escribir  es para capturar un error de codigo
        }
        break;

}


?>
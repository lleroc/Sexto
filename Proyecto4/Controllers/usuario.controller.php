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
            $datos = array();
            $datos = $usuarios->login($correo, $contrasenia);
            $respuesta = mysqli_fetch_assoc($datos);
            if(empty($datos)){
                header("Location:../login.php?op=2"); //no existe el usuario
                exit();
            }
            if(is_array($respuesta) and count($respuesta)>0){
                //poner variables de session controlar accessos
                header("Location:../index.php");
            }
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
            header("Location:../login.php?op=3"); // no se que error escribir
        }
        break;
   
}


?>
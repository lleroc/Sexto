<?php
include_once('../config/config.php');

class UsuariosModel
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM usuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function uno($idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM usuarios WHERE idUsuarios = $idUsuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function insertar($Nombre_Usuario, $Contrasenia, $Estado, $Roles_idRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO usuarios (Nombre_Usuario, Contrasenia, Estado, Roles_idRoles) VALUES ('$Nombre_Usuario', '" . md5($Contrasenia) . "', $Estado, $Roles_idRoles)";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function actualizar($idUsuarios, $Nombre_Usuario, $Contrasenia, $Estado, $Roles_idRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE usuarios SET Nombre_Usuario = '$Nombre_Usuario', Contrasenia = '" . md5($Contrasenia) . "', Estado = $Estado, Roles_idRoles = $Roles_idRoles WHERE idUsuarios = $idUsuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function eliminar($idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM usuarios WHERE idUsuarios = $idUsuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function login($Nombre_Usuario, $Contrasenia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$Nombre_Usuario' and estado = 1"; // ' or 1=1 -- 
        $datos = mysqli_query($con, $cadena);
        if ($datos && mysqli_num_rows($datos) > 0) {
            $usuario = mysqli_fetch_assoc($datos);
            if ((md5($Contrasenia) == $usuario['Contrasenia'])) {
                return $usuario;
            } else {
                return false;
            }
        }
    }
}

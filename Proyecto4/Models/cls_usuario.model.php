<?php
require_once('cls_conexion.model.php');
class Clase_Usuarios
{
    public function todos()
    {
    }
    public function uno($UsuarioId)
    {
    }
    public function insertar($Cedula, $Nombres, $Apellidos, $Telefono, $Correo, $Contrasenia, $Rol)
    {
    }
    public function actualizar($UsuarioId, $Cedula, $Nombres, $Apellidos, $Telefono, $Correo, $Contrasenia, $Rol)
    {
    }
    public function eliminar($UsuarioId)
    {
    }
    public function actualizar_contrasenia($UsuarioId, $contrasenia)
    {
    }


    public function login($correo, $contrasenia)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            //$cadena = sprintf("SELECT * FROM `Usuarios` WHERE `Correo`= '%s' and `Contrasenia`='%s'",mysqli_real_escape_string($con,$correo),mysqli_real_escape_string($con,$contrasenia));
            $cadena = "SELECT * FROM `Usuarios` WHERE `Correo`= '$correo'";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}

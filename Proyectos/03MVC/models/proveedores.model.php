<?php
//TODO: Clase de Provedores
require_once('../config/config.php');
class Provedores
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from provedores
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idProveedores) //select * from provedores where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores` WHERE `idProveedores`=$idProveedores";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto) //insert into provedores (nombre, direccion, telefono) values ($nombre, $direccion, $telefono)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `proveedores` ( `Nombre_Empresa`, `Direccion`, `Telefono`, `Contacto_Empresa`, `Teleofno_Contacto`) VALUES ('$Nombre_Empresa','$Direccion','$Telefono','$Contacto_Empresa','$Teleofno_Contacto')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto) //update provedores set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `proveedores` SET `Nombre_Empresa`='$Nombre_Empresa',`Direccion`='$Direccion',`Telefono`='$Telefono',`Contacto_Empresa`='$Contacto_Empresa',`Teleofno_Contacto`='$Teleofno_Contacto' WHERE `idProveedores` = $idProveedores";
            if (mysqli_query($con, $cadena)) {
                return $idProveedores;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idProveedores) //delete from provedores where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `proveedores` WHERE `idProveedores`= $idProveedores";
            // echo $cadena;
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}

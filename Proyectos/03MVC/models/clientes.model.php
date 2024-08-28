<?php
// TODO: Clase de Clientes Tienda Cel@g
require_once('../config/config.php');

class Clientes
{
    // TODO: Implementar los métodos de la clase


    public function buscar($textp) // select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` where nombres='$textp'";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function todos() // select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idClientes) // select * from clientes where id = $idClientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` WHERE `idClientes` = $idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo) // insert into clientes (nombres, direccion, telefono, cedula, correo) values ($nombres, $direccion, $telefono, $cedula, $correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `clientes`(`Nombres`, `Direccion`, `Telefono`, `Cedula`, `Correo`) 
                       VALUES ('$Nombres', '$Direccion', '$Telefono', '$Cedula', '$Correo')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id; // Return the inserted ID
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo) // update clientes set nombres = $nombres, direccion = $direccion, telefono = $telefono, cedula = $cedula, correo = $correo where id = $idClientes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clientes` SET 
                       `Nombres`='$Nombres',
                       `Direccion`='$Direccion',
                       `Telefono`='$Telefono',
                       `Cedula`='$Cedula',
                       `Correo`='$Correo' 
                       WHERE `idClientes` = $idClientes";
            if (mysqli_query($con, $cadena)) {
                return $idClientes; // Return the updated ID
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($idClientes) // delete from clientes where id = $idClientes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clientes` WHERE `idClientes`= $idClientes";
            if (mysqli_query($con, $cadena)) {
                return 1; // Success
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

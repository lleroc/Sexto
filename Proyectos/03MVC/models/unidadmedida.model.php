<?php
// Modelo de UnidadDeMedida
require_once('../config/config.php');

class UnidadDeMedida
{
    public function todos() // select * from unidad_medida
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `unidad_medida`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idUnidad) // select * from unidad_medida where id = $idUnidad
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `unidad_medida` WHERE `idUnidad` = $idUnidad";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombre, $Descripcion, $Tipo) // insert into unidad_medida (...) values (...)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `unidad_medida`(`Nombre`, `Descripcion`, `Tipo`) 
                       VALUES ('$Nombre', '$Descripcion', '$Tipo')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id; // Retorna el ID insertado
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($idUnidad, $Nombre, $Descripcion, $Tipo) // update unidad_medida set ... where id = $idUnidad
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `unidad_medida` SET 
                       `Nombre`='$Nombre',
                       `Descripcion`='$Descripcion',
                       `Tipo`='$Tipo'
                       WHERE `idUnidad` = $idUnidad";
            if (mysqli_query($con, $cadena)) {
                return $idUnidad; // Retorna el ID actualizado
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($idUnidad) // delete from unidad_medida where id = $idUnidad
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `unidad_medida` WHERE `idUnidad`= $idUnidad";
            if (mysqli_query($con, $cadena)) {
                return 1; // Éxito
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

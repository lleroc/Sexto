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
        $cadena = "SELECT * FROM `unidad_medida` WHERE `idUnidad_Medida` = $idUnidad";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Descripcion, $Tipo) // insert into unidad_medida (...) values (...)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `unidad_medida`( `Detalle`, `Tipo`) 
                       VALUES ( '$Descripcion', '$Tipo')";
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

    public function actualizar($idUnidad,  $Descripcion, $Tipo) // update unidad_medida set ... where id = $idUnidad
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `unidad_medida` SET 
                      
                       `Detalle`='$Descripcion',
                       `Tipo`='$Tipo'
                       WHERE `idUnidad_Medida` = $idUnidad";
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
            $cadena = "DELETE FROM `unidad_medida` WHERE `idUnidad_Medida`= $idUnidad";
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

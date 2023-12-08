<?php
require_once('cls_conexion.model.php');
class Clase_Productos
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Productos`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ProductoId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Productos` WHERE ProductoId=$ProductoId";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            //$cadena = "INSERT INTO `Productos`( `Nombre`, `Precio_Compra`, `Precio_Venta`, `Iva`, `cantidad`, `Unidad_Medida`, `Imagen`, `Fecha`) VALUES ('$Nombre','$Precio_Compra','$Precio_Venta',$Iva,$cantidad,'$Unidad_Medida','$Imagen','$Fecha')";
            $cadena = "INSERT INTO `Productos`( `Nombre`, `Precio_Compra`, `Precio_Venta`, `Iva`, `cantidad`, `Unidad_Medida`, `Imagen`, `Fecha`) VALUES ('$Nombre','$Precio_Compra','$Precio_Venta',$Iva,$cantidad,'$Unidad_Medida','$Imagen',CURDATE())";

            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ProductoId, $Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            //$cadena = "UPDATE `Productos` SET `Nombre`='$Nombre',`Precio_Compra`='$Precio_Compra',`Precio_Venta`='$Precio_Venta',`Iva`=$Iva,`cantidad`=$cantidad,`Unidad_Medida`='$Unidad_Medida',`Imagen`='$Imagen',`Fecha`='$Fecha' WHERE `ProductoId`='$ProductoId'";
            $cadena = "UPDATE `Productos` SET `Nombre`='$Nombre',`Precio_Compra`='$Precio_Compra',`Precio_Venta`='$Precio_Venta',`Iva`=$Iva,`cantidad`=$cantidad,`Unidad_Medida`='$Unidad_Medida',`Imagen`='$Imagen',`Fecha`=CURDATE() WHERE `ProductoId`='$ProductoId'";

            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ProductoId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Productos where ProductoId=$ProductoId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}

<?php
require_once('../config/conexion.php');
class Alumnos
{
    public function todos()
    {  //select * from alumnos
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from alumnos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function uno($IdAlumno)
    {  //select * from alumnos where id=1
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from alumnos where IdAlumno=$IdAlumno";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function insertar($Nombre, $Apellido, $Edad)
    {  //insert into alumnos values ()
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO `alumnos`(`Nombre`, `Apellido`, `Edad`) VALUES('$Nombre','$Apellido',$Edad)";

        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function actualizar($IdAlumno, $Nombre, $Apellido, $Edad)
    {  //update alumnos set where id=1
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE `alumnos` SET `Nombre`='$Nombre',`Apellido`='$Apellido',`Edad`=$Edad where IdAlumno=$IdAlumno";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function eliminar($IdAlumno)
    {  //delete from alumnos where id=1
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "delete from alumnos where IdAlumno=$IdAlumno";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
}

<?php
require_once('../Models/operaciones.model.php');
$operaciones = new Operaciones_Aritmeticas();
/**
 * Metodo GET
 * URL.   wwww.facebook.com?parametros=valores
 * localhost/sexto/Proyecto3/views/index.view.php?operacion=1
 * localhost/sexto/Proyecto3/views/index.view.php?operacion=suma   & numero1=6  & numero2=5
 */
$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];
    $operacion = $_GET['operacion'];
    if($operacion == '1'){
       echo json_encode($operaciones->suma($numero1, $numero2));
    }
    if($operacion == '2'){
        echo json_encode( $operaciones->resta($numero1, $numero2));
    }
    if($operacion == '3'){
        echo json_encode( $operaciones->multiplicacion($numero1, $numero2));
    }
    if($operacion == '4'){
        echo json_encode( $operaciones->division($numero1, $numero2));
    }
        


?>
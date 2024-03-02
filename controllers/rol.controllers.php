<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/rol.models.php");
error_reporting(0);

$Rol = new Rol;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Rol->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);

        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idAccesos = $_POST["idAccesos"];
        $datos = array();
        $datos = $Sucursal->uno($idAccesos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
       
    case 'insertar':

        $Ultimo = $_POST["Ultimo"];
        $Usuarios_idUsuarios = $_POST["combo_idUsuarios"];
        $tipo = $_POST["tipo"];
        $datos = array();
        $datos = $Sucursal->Insertar($Ultimo, $Usuarios_idUsuarios, $tipo);
        echo json_encode($datos);
        break;
       
  
}

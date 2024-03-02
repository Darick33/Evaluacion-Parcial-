<?php
// Requerimientos 
require_once('../config/conexion.php');

class Artista_Album
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Usuarios_Roles";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para sacar un registro */
    public function uno($idAccesos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Usuarios_Roles WHERE idAccesos = $idAccesos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para insertar */
    public function Insertar($Album_idAlbum, $Artistas_idArtistas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `artista_album`(`ID_album`, `ID_artista` ) VALUES (  $Album_idAlbum, $Artistas_idArtistas)";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'Error al insertar en la base de datos';
        }
    }

    /* Procedimiento para actualizar */
    public function Actualizar($Usuarios_idUsuarios, $Roles_idRoles, $idUsuariosRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Usuarios_Roles set Usuarios_idUsuarios=$Usuarios_idUsuarios,Roles_idRoles=$Roles_idRoles where idUsuariosRoles= $idUsuariosRoles";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'error al actualizar el registro';
        }
    }

    /* Procedimiento para Eliminar */
    public function Eliminar($Usuarios_idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Usuarios_Roles` WHERE `Usuarios_idUsuarios`= $Usuarios_idUsuarios";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }
}
?>

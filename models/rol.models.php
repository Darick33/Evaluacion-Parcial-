<?php
// Requerimientos 
require_once('../config/conexion.php');

class Rol
{
    // Procedimiento para sacar todos los registros
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Rol`"; // Se cambia 'Roles' por 'Rol'
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    // Procedimiento para sacar un registro
    public function uno($RolId) // Cambio en el nombre del parámetro
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Rol` WHERE `ID_rol`='$RolId'"; // Se cambia 'Sucursales' por 'Rol' y 'SucursalId' por 'ID_rol'
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    // Procedimiento para insertar un rol
    public function Insertar($Nombre_rol)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Rol`(`Nombre_rol`) VALUES ('$Nombre_rol')"; // Se cambia 'Sucursales' por 'Rol' y se ajustan los campos
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return mysqli_error($con);
        }
    }

    // Procedimiento para actualizar un rol
    public function Actualizar($RolId, $Nombre_rol) // Se agrega $RolId como parámetro
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Rol` SET `Nombre_rol`='$Nombre_rol' WHERE `ID_rol`='$RolId'"; // Se cambia 'Sucursales' por 'Rol', se ajustan los campos y se agrega la condición WHERE
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'error al actualizar el registro';
        }
    }

    // Procedimiento para eliminar un rol
    public function Eliminar($RolId) // Se ajusta el nombre del parámetro
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Rol` WHERE `ID_rol`='$RolId'"; // Se cambia 'Sucursales' por 'Rol' y 'SucursalId' por 'ID_rol'
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

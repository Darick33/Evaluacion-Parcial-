<?php
// Requerimientos 
require_once('../config/conexion.php');

class Artista
{
    // Procedimiento para sacar todos los registros
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT artista.ID_artista, artista.Nombre, artista.Genero, artista.Pais,artista.Anio_inicio_carrera, rol.Nombre_rol as rol, rol.ID_rol FROM artista INNER JOIN artista_rol ON artista.ID_artista = artista_rol.ID_artista INNER JOIN rol ON artista_rol.ID_rol = rol.ID_rol";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    // Procedimiento para sacar un registro
    public function uno($ID_artista)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT artista.ID_artista, artista.Nombre, artista.Correo, artista.Contrasenia, rol.Rol, rol.ID_rol FROM artista INNER JOIN artista_rol ON artista.ID_artista = artista_rol.ID_artista INNER JOIN rol ON artista_rol.ID_rol = rol.ID_rol WHERE artista.ID_artista = $ID_artista";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    // Procedimiento para insertar un artista
    public function Insertar($Nombre, $Genero, $Pais, $Anio_inicio_carrera, $ID_rol, $Correo, $Contrasenia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `artista` (`Nombre`, `Genero`, `Pais`, `Anio_inicio_carrera`, `ID_rol`, `Correo`, `Contrasenia`) VALUES ('$Nombre', '$Genero', '$Pais', $Anio_inicio_carrera, $ID_rol, '$Correo', '$Contrasenia')";
        
        if (mysqli_query($con, $cadena)) {
            require_once('../models/artista_roles.models.php');
            $UsRoles = new artista_roles();

            return $UsRoles->Insertar(mysqli_insert_id($con), $ID_rol);
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();

        // if (mysqli_query($con, $cadena)) {
        //     return "ok";
        // } else {
        //     return 'Error al insertar en la base de datos';
        // }
        // $con->close();
    }

    // Procedimiento para actualizar un artista
    public function Actualizar($ID_artista, $Nombre, $Correo, $Contrasenia, $ID_rol, $Cedula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE artista SET Nombre='$Nombre', Correo='$Correo', Contrasenia='$Contrasenia', ID_rol=$ID_rol, Cedula='$Cedula' WHERE ID_artista=$ID_artista";
        
        // if (mysqli_query($con, $cadena)) {
        //     return "ok";
        // } else {
        //     return 'Error al actualizar el registro';
        // }
        // $con->close();
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return mysqli_error($con);
        }
    }

    // Procedimiento para eliminar un artista
    public function Eliminar($ID_artista)
    {
        $Artista_Rol = new Artista_Rol();
        $Artista_Rol->Eliminar($ID_artista);
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM artista WHERE ID_artista=$ID_artista";
        
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }

    // Procedimiento para iniciar sesión de un artista
    public function login($Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT artista.ID_artista, artista.Nombre, artista.Correo, artista.Contrasenia, rol.Nombre_rol as rol, rol.ID_rol FROM artista INNER JOIN artista_rol ON artista.ID_artista = artista_rol.ID_artista INNER JOIN rol ON artista_rol.ID_rol = rol.ID_rol WHERE artista.Correo='$Correo'";
            $datos = mysqli_query($con, $cadena);
            return $datos;
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        $con->close();
    }
}
?>

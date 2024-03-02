<?php
// Requerimientos
require_once('../config/conexion.php');

class Album
{
    // Procedimiento para sacar todos los álbumes
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT album.ID_album, 
        album.Titulo, album.Anio_lanzamiento, album.Sello_discografico,   album.Genero, artista.Nombre AS artista  FROM album  INNER JOIN artista_album ON album.ID_album = artista_album.ID_album  INNER JOIN artista ON artista_album.ID_artista = artista.ID_artista;
 ";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    


    // Procedimiento para sacar un álbum por su ID
    public function uno($idAlbum)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM album WHERE idAlbum = $idAlbum";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    // Procedimiento para insertar un álbum
    public function Insertar($Titulo, $Anio_lanzamiento, $Sello_discografico, $Genero, $ID_artista)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `album`(`Titulo`, `Anio_lanzamiento`, `Sello_discografico`, `Genero`, `ID_artista`) VALUES ('$Titulo', $Anio_lanzamiento, '$Sello_discografico', '$Genero', $ID_artista)";
        
        if (mysqli_query($con, $cadena)) {
            require_once('./artista_album.models.php');
            $UsArtistas = new artista_album();
            $result = $UsArtistas->Insertar(mysqli_insert_id($con), $ID_artista);
            $con->close();
            return $result;
        } else {
            $con->close();
            return 'Error al insertar en la base de datos';
        }
    }

    // Procedimiento para actualizar un álbum
    public function Actualizar($idAlbum, $nombre, $artista, $anio)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE album SET Nombre='$nombre', Artista='$artista', Anio=$anio WHERE idAlbum=$idAlbum";
        
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'Error al actualizar el álbum';
        }
    }

    // Procedimiento para eliminar un álbum
    public function Eliminar($idAlbum)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM album WHERE idAlbum=$idAlbum";
        
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

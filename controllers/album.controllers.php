<?php
error_reporting(0);
/* Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/album.models.php");

$Album = new Album;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Album->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
          

    case 'uno':
        $idAlbum = $_POST["idAlbum"];
        $datos = array();
        $datos = $Album->uno($idAlbum);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    // case 'insertar':
    //     $nombre = $_POST["nombre"];
    //     $artista = $_POST["artista"];
    //     $anio = $_POST["anio"];
    //     $datos = array();
    //     $datos = $Album->Insertar($nombre, $artista, $anio);
    //     echo json_encode($datos);
    //     break;
    case 'insertar':
        $Titulo = $_POST["Titulo"];
        $Anio_lanzamiento = $_POST["Anio_lanzamiento"];
        $Sello_Discografico = $_POST["Sello_Discografico"];
        $Genero = $_POST["Genero"];
        $ID_artista = $_POST["ID_artista"];
        $datos = array();
        $datos = $Album->Insertar($Titulo,$Anio_lanzamiento,$Sello_Discografico,$Genero,$ID_artista);
       
            echo json_encode($datos);
     
        break;
    

    case 'actualizar':
        $idAlbum = $_POST["idAlbum"];
        $nombre = $_POST["nombre"];
        $artista = $_POST["artista"];
        $anio = $_POST["anio"];
        $datos = array();
        $datos = $Album->Actualizar($idAlbum, $nombre, $artista, $anio);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idAlbum = $_POST["idAlbum"];
        $datos = array();
        $datos = $Album->Eliminar($idAlbum);
        echo json_encode($datos);
        break;
}
?>

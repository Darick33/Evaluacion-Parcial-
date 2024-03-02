<?php
error_reporting(0);
/* Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/artista.models.php");

$Artista = new Artista;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Artista->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $ID_artista = $_POST["ID_artista"];
        $datos = array();
        $datos = $Artista->uno($ID_artista);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Genero = $_POST["Genero"];
        $Pais = $_POST["Pais"];
        $Anio_inicio_carrera = $_POST["Anio_inicio_carrera"];
        $ID_rol = $_POST["ID_rol"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["Contrasenia"];
        $datos = array();
        $datos = $Artista->Insertar($Nombre, $Genero, $Pais, $Anio_inicio_carrera, $ID_rol, $Correo, $Contrasenia);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $ID_artista = $_POST["ID_artista"];
        $Nombre = $_POST["Nombre"];
        $Genero = $_POST["Genero"];
        $Pais = $_POST["Pais"];
        $Anio_inicio_carrera = $_POST["Anio_inicio_carrera"];
        $ID_rol = $_POST["ID_rol"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["Contrasenia"];
        $datos = array();
        $datos = $Artista->Actualizar($ID_artista, $Nombre, $Genero, $Pais, $Anio_inicio_carrera, $ID_rol, $Correo, $Contrasenia);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $ID_artista = $_POST["ID_artista"];
        $datos = array();
        $datos = $Artista->Eliminar($ID_artista);
        echo json_encode($datos);
        break;

        case 'login':
            // header("Location:../views/home.php");
            // return;
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            
            //TODO: Si las variables estab vacias rgersa con error
            if (empty($correo) or empty($clave)) {
                header("Location:../login.php?op=2");
                // header("Location:../views/home.php");
                exit();
            }
    
            try {
                $datos = array();
                
                $datos = $Artista->login($correo, $clave);
                
                $res = mysqli_fetch_assoc($datos);
            } catch (Throwable $th) {
                header("Location:../login.php?op=1");
                // header("Location:../views/home.php");
                exit();
            }
          
            //TODO:Control de si existe el registro en la base de datos
            try {
                if (is_array($res) and count($res) > 0) {

                    //if ((md5($clave) == ($res["clave"]))) {
                        // header("Location:../views/home.php");
                        // $par = $res["Clave"];
                        // header("Location:../login.php?op=$par");
                        // exit();
                    if ((($clave) == ($res["Contrasenia"]))) {
                        

                        //$datos2 = array();
                        // $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"], 'ingreso');
    
                        $_SESSION["idartista"] = $res["ID_artista"];
                        $_SESSION["Artista_Nombre"] = $res["Nombre"];
                        $_SESSION["Artista_Genero"] = $res["Genero"];
                        $_SESSION["Artista_Anio_inicio_carrera"] = $res["Anio_inicio_carrera"];
                       
                        $_SESSION["Artista_Correo"] = $res["CorreoElectronico"];
                        $_SESSION["Artistas_IdRoles"] = $res["ID_rol"];
                        $_SESSION["Rol"] = $res["rol"];
                        $hola = $_SESSION["Rol"];
                       
                        header("Location:../views/home.php");
                        exit();
                    } else {
                        header("Location:../login.php?op=1");
                        // header("Location:../views/home.php");
                        exit();
                    }
                } else {
                    header("Location:../login.php?op=1");
                    // header("Location:../views/home.php");
                    exit();
                }
            } catch (Exception $th) {
                echo ($th->getMessage());
            }
            break;    

}
?>

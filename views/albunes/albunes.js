function init() {
    $("#form_albunes").on("submit", (e) => {
        GuardarEditar(e);
    });
}

$().ready(() => {
    CargaLista();
});

var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/album.controllers.php?op=todos",
        (ListAlbums) => {
            ListAlbums = JSON.parse(ListAlbums);
            $.each(ListAlbums, (index, album) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${album.Titulo}</td>
                    <td>${album.Anio_lanzamiento}</td>
                    <td>${album.Sello_discografico}</td>
                    <td>${album.Genero}</td>
                    <td>${album.artista}</td>
                    <td>
                        <button class='btn btn-primary' onclick='uno(${album.ID_album})'>Editar</button>
                        <button class='btn btn-warning' onclick='eliminar(${album.ID_album})'>Eliminar</button>
                    </td>
                </tr>`;
            });
            $("#ListaAlbunes").html(html);
        }
    );
};

var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioUsuario = new FormData($("#form_albunes")[0]);
    var accion = "../../controllers/album.controllers.php?op=insertar";
  
    for (var pair of DatosFormularioUsuario.entries()) {
      console.log(pair[0] + ", " + pair[1]);
    }
  
    $.ajax({
        
      url: accion,
      type: "post",
      data: DatosFormularioUsuario,
      processData: false,
      contentType: false,
      cache: false,
      success: (respuesta) => {
        console.log(respuesta);
        if (respuesta.trim() !== '') { // Verificar si la respuesta no está vacía
          try {
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
              alert("Se guardo con éxito");
              CargaLista();
              LimpiarCajas();
            } else {
              alert("No se pudo guardar el artista");
            }
          } catch (error) {
            // console.error("Error al analizar la respuesta JSON:", error);
            // alert("Error al analizar la respuesta del servidor");
          }
        } else {
          console.log("La respuesta del servidor está vacía");
          alert("La respuesta del servidor está vacía");
        }
      },
      error: (xhr, status, error) => {
        console.error("Error al realizar la solicitud AJAX:", error);
        alert("Error al comunicarse con el servidor");
      }
    });
};

var uno = async (idAlbum) => {
    document.getElementById("tituloModal").innerHTML = "Editar Álbum";
    $.post("../../controllers/album.controller.php?op=uno", { idAlbum: idAlbum }, (album) => {
        album = JSON.parse(album);
        document.getElementById("idAlbum").value = album.idAlbum;
        document.getElementById("nombre").value = album.Nombre;
        document.getElementById("artista").value = album.Artista;
        document.getElementById("anio").value = album.Anio;
    });
};

var artistas = () => {
    return new Promise((resolve, reject) => {
      var html = `<option value="0">Seleccione una opcion</option>`;
      $.post(
        "../../controllers/artista.controllers.php?op=todos",
        async (ListaArtistas) => {
          ListaArtistas = JSON.parse(ListaArtistas);
          $.each(ListaArtistas, (index, artista) => {
            html += `<option value="${artista.ID_artista}">${artista.Nombre}</option>`;
          });
          await $("#ID_artista").html(html);
          resolve();
        }
      ).fail((error) => {
        reject(error);
      });
    });
  };



  init();
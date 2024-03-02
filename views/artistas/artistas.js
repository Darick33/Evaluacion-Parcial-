function init() {
    $("#form_artistas").on("submit", (e) => {
      GuardarEditar(e);
    });
  }
  
  $().ready(() => {
    CargaLista();
  });
  
  var CargaLista = () => {
    var html = "";
    $.get(
      "../../controllers/artista.controllers.php?op=todos",
      (ListArtistas) => {
        ListArtistas = JSON.parse(ListArtistas);
        $.each(ListArtistas, (index, artista) => {
          html += `<tr>
              <td>${index + 1}</td>
              <td>${artista.Nombre}</td>
              <td>${artista.Genero}</td>
              <td>${artista.Pais}</td>
              <td>${artista.Anio_inicio_carrera}</td>
              <td>${artista.rol}</td>
  <td>
  <button class='btn btn-primary' click='uno(${
            artista.ID_artista
          })'>Editar</button>
  <button class='btn btn-warning' click='eliminar(${
    artista.ID_artista
          })'>Eliminar</button>
              `;
        });
        $("#ListaArtistas").html(html);
      }
    );
  };
  
  var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioUsuario = new FormData($("#form_artistas")[0]);
    var accion = "../../controllers/artista.controllers.php?op=insertar";
  
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

  
  var uno = async (idUsuarios) => {
    await sucursales();
    await roles();
    document.getElementById("tituloModal").innerHTML = "Actualizar Artista";
    $.post(ruta + "uno", { idUsuarios: idUsuarios }, (usuario) => {
      usuario = JSON.parse(usuario);
      document.getElementById("idUsuarios").value = usuario.idUsuarios;
      document.getElementById("Cedula").value = usuario.Cedula;
      document.getElementById("Nombres").value = usuario.Nombres;
      document.getElementById("Apellidos").value = usuario.Apellidos;
      document.getElementById("Correo").value = usuario.Correo;
      document.getElementById("contrasenia").value = usuario.contrasenia;
      document.getElementById("ID_rol").value = usuario.ID_rol;
      
    });
  };
  
  var roles = () => {
    return new Promise((resolve, reject) => {
      var html = `<option value="0">Seleccione una opción</option>`;
      $.post(
        "../../controllers/rol.controllers.php?op=todos",
        async (ListaRoles) => {
          ListaRoles = JSON.parse(ListaRoles);
          $.each(ListaRoles, (index, rol) => {
            html += `<option value="${rol.ID_rol}">${rol.Nombre_rol}</option>`;
          });
          await $("#ID_rol").html(html);
          resolve();
        }
      ).fail((error) => {
        reject(error);
      });
    });
  };

  var artistas = () => {
    return new Promise((resolve, reject) => {
      var html = `<option value="0">Seleccione una opcion</option>`;
      $.post(
        "../../controllers/artista.controllers.php?op=todos2",
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

  
  
  var eliminar = () => {};
  
  var LimpiarCajas = () => {
    (document.getElementById("Nombres").value = ""),
      (document.getElementById("Correo").value = ""),
      (document.getElementById("Clave").value = ""),
      $("#ModalArtistas").modal("hide");
  };
  init();
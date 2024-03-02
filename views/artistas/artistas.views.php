<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<!--onclick="sucursales(); roles()"-->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="roles(); proyectos();  "   data-bs-toggle="modal" data-bs-target="#ModalArtistas">Nuevo Artista</button>


    <h5 class="card-header">Lista de Artistas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Pais</th>
                    <th>Anio de inicio</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                    
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaArtistas">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalArtistas">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_artistas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Nombre</label>
                        <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese sus nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Genero</label>
                        <input type="text" name="Genero" id="Genero" class="form-control" placeholder="Ingrese su Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Pais</label>
                        <input type="text" name="Pais" id="Pais" class="form-control" placeholder="**********" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Anio de inicio de carrera </label>
                        <input type="text" name="Anio_inicio_carrera" id="Anio_inicio_carrera" class="form-control" placeholder="Ingrese el anio en que inicio su carrera" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Rol</label>
                        <select id="ID_rol" name="ID_rol" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Correo Electrónico</label>
                        <input  type="email" name="Correo" id="Correo" class="form-control" placeholder="Ingrese su Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Contraseña</label>
                        <input type="password" name="Contrasenia" id="Contrasenia" class="form-control" placeholder="**********" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php require_once('../html/scripts2.php') ?>

<script src="./artistas.js"></script>
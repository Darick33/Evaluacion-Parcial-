<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<!--onclick="sucursales(); roles()"-->
<div class="card">
    <button type="button" class="btn btn-outline-secondary"  onclick="artistas()"  data-bs-toggle="modal" data-bs-target="#ModalAlbunes">Nuevo Albun</button>


    <h5 class="card-header">Lista de Albunes</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Anio Lanzamiento</th>
                    <th>Sello Discografico</th>
                    <th>Genero</th>
                    <th>Artista</th>
                    <th>Opciones</th>
                    
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaAlbunes">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalAlbunes">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_albunes" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Titulo</label>
                        <input type="text" name="Titulo" id="Titulo" class="form-control" placeholder="Ingrese el nombre del Albun" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Anio Lanzamiento</label>
                        <input type="text" name="Anio_Lanzamiento" id="Anio_Lanzamiento" class="form-control" placeholder="**********" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Sello Discografico </label>
                        <input type="text" name="Sello_Discografico" id="Sello_Discografico" class="form-control" placeholder="Ingrese el anio en que inicio su carrera" required>
                    </select>
                </div>
                <div class="form-group">
                      <label for="Nombres">Genero</label>
                        <input type="text" name="Genero" id="Genero" class="form-control" placeholder="Ingrese el anio en que inicio su carrera" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Artista</label>
                        <select id="ID_artista" name="ID_artista" class="form-control" required>
                            
                             <!-- <input type="text" name="ID_artista" id="ID_artista" class="form-control" placeholder="Ingrese el anio en que inicio su carrera" required> -->
                        </select>
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

<script src="./albunes.js"></script>
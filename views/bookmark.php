<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                Mis URL's
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarMaterial"><i class="fa fa-plus"></i></button>
            </h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered tablas" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Titulo</th>
                                    <th>Url</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $item = null;
                                $valor = null;
                                $urls = BookMarkController::mostrarMaterial($item, $valor);
                                foreach ($urls as $key => $value) {
                                    echo '
                                        <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td>'. $value["title"]. '</td>
                                            <td>'. $value["url"]. '</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btnEditarMaterial" id="'. $value["id"]. '" data-bs-toggle="modal" data-bs-target="#modalEditarMaterial"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger btnEliminarMaterial" id="'. $value["id"].'"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAgregarMaterial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" role="form" method="POST" id="formRegistroMaterial">
                    <div class="modal-header" style="background:#009088; color:white">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar URL</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">

                        <div class="form-group row">
                            <label for="txtNuevoMaterial" class=" col-sm-2 col-form-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtNuevoMaterial" id="txtNuevoMaterial" placeholder="Ingrese titulo de la url">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txtNuevoURL" class=" col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtNuevoURL" id="txtNuevoURL" placeholder="Ingrese URL">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btnGuardarNuevoMaterial">Guardar</button>
                    </div>

                    <?php
                    $ctrMaterial = new BookMarkController();
                    $ctrMaterial->crearMaterial();
                    ?>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEditarMaterial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" role="form" method="POST" id="formEditarMaterial">
                    <div class="modal-header" style="background:#009088; color:white">
                        <h5 class="modal-title" id="exampleModalLabel">Editar URL</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form-group row">
                            <label for="txtEditarMaterial" class=" col-sm-2 col-form-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtEditarMaterial" id="txtEditarMaterial" placeholder="Ingrese titulo de la URL">
                                <input type="hidden" name="txtEditarClave" id="txtEditarClave">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txtEditarMaterial" class=" col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtEditarURL" id="txtEditarURL" placeholder="Ingrese URL">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btnEditarMaterial">Guardar</button>
                    </div>
                    <?php
                    $ctrMaterial = new BookMarkController();
                    $ctrMaterial->modificarMaterial();
                    ?>
                </form>
            </div>

        </div>
    </div>

    <?php 
        $borrarUrl = new BookMarkController();
        $borrarUrl->ctrBorrarUlr();
    ?>
</main>

<script async src="views/js/bookmark.js"></script>
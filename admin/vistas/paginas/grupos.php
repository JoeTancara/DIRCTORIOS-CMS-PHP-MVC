<div class="content-wrapper" style="min-height: 717px;">


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>administrar grupos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-success crear-categoria" data-toggle="modal"
                                data-target="#modal-crear-grupo">
                                crear nuevo grupo
                            </button><br>
                        </div><br>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tablaGrupos" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>nombre</th>
                                        <th>link</th>
                                        <th>descripcion</th>
                                        <th>foto</th>
                                        <th>categorias</th>
                                        <th>keywords</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($grupos as $key => $value) {
                                        $item = "id";
                                        $valor = $value["id_cat"];
                                        $cat = categorias::ctrMostrarCategorias($item, $valor);
                                    ?>
                                        <tr>
                                            <td><?php echo ($key + 1)  ?></td>
                                            <td><?php echo $value["wsp_nom"];  ?></td>
                                            <td><?php echo $value["wsp_link"];  ?></td>
                                            <td><?php echo $value["wsp_descrip"];  ?></td>
                                            <td><img src="<?php echo $rutaGruposFoto . $value["wsp_foto"]  ?>" width="40"
                                                    height="40"></td>
                                            <td><?php echo $cat["cat_nombre"];  ?></td>
                                            <td><?php echo $value["wsp_keywords"];  ?></td>
                                            <td>
                                                <div class='btn-group'>
                                                    <button class="btn btn-warning btn-sm editarGrupo"
                                                        idGrupo="<?php echo $value["id"];  ?>" data-toggle="modal"
                                                        data-target="#modal-editar-grupo">
                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-sm eliminarGrupo"
                                                        rutaFoto="<?php echo $value["wsp_foto"];  ?>"
                                                        idGrupo="<?php echo $value["id"];  ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </div>

    </section>





</div>





<!--=====================================
Modal Crear GRUPO
======================================-->

<div class="modal modal-default fade" id="modal-crear-grupo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar Grupo</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_grupo" placeholder="nombre grupo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="link_grupo" placeholder="link de grupo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">


                    <label>categorias</label>
                    <select class="form-control" name="cat_grupo" required>
                        <?php

                        foreach ($categorias as $key => $value) {



                        ?>


                            <option value="<?php echo $value["id"] ?>"><?php echo $value["cat_nombre"] ?></option>

                        <?php
                        }
                        ?>

                    </select>

                </div>






                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="etiquetas_grupo"
                        placeholder="#Etiquetas clasifica tu grupo">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de grupo
                        <input type="file" name="subirImgGrupo">
                    </div>
                    <img class="previsualizarImgGrupo img-fluid py-2" width='600' height='300'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="desc_grupo" placeholder="descripcion del grupo">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php

                $guardarGrupo = Grupos::ctrGuardarGrupo();



                ?>





            </form>






        </div>
    </div>
</div>




<!--=====================================
Modal EDITAR GRUPO
======================================-->


<div class="modal modal-default fade" id="modal-editar-grupo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar Grupo</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="idGrupoE">
                    <input type="text" class="form-control" name="nom_grupoE" placeholder="nombre grupo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="link_grupoE" placeholder="link de grupo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">


                    <label>categorias</label>
                    <select class="form-control" name="cat_grupoE" required>


                        <?php

                        foreach ($categorias as $key => $value) {

                        ?>



                            <option value="<?php echo $value["id"] ?>"><?php echo $value["cat_nombre"] ?></option>

                        <?php

                        }
                        ?>

                    </select>

                </div>






                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="etiquetas_grupoE"
                        placeholder="#Etiquetas clasifica tu grupo">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de grupo
                        <input type="file" name="subirImgGrupoE">
                    </div>
                    <input type="hidden" name="fotoActualE">
                    <img class="previsualizarImgGrupoE img-fluid py-2" width='600' height='300'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="desc_grupoE" placeholder="descripcion del grupo">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>




                <?php

                $editar = Grupos::ctrEditarGrupo();


                ?>


            </form>




        </div>
    </div>
</div>
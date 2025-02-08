<div class="content-wrapper" style="min-height: 717px;">


    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>administrar anuncios</h1>

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
                                data-target="#modal-crear-anuncios">
                                crear nuevo anuncio
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaAnuncios" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>nombre</th>
                                        <th>enlace</th>
                                        <th>foto</th>
                                        <th>acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

foreach ($anuncios as $key => $value) {
    # code...



?>





                                    <tr>

                                        <td><?php echo ($key +1)  ?></td>
                                        <td><?php echo $value["nombre"] ?></td>
                                        <td><?php echo $value["enlace"] ?></td>
                                        <td><img src="<?php echo $rutaGruposFoto.$value["foto"]  ?>" width="40"
                                                height="40"></td>

                                        <td>

                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm editarAnuncios"
                                                    idAnuncios="<?php echo $value["id"];  ?>" data-toggle="modal"
                                                    data-target="#modal-editar-anuncios">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarAnuncios"
                                                    rutaFoto="<?php echo $value["foto"];  ?>"
                                                    idAnuncios="<?php echo $value["id"];  ?>">
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
Modal Crear anuncios
======================================-->
<div class="modal modal-default fade" id="modal-crear-anuncios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nueva anuncios</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_anuncios" placeholder="nombre anuncios">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="enlace_anuncios" placeholder="enlace anuncios">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de anuncios
                        <input type="file" name="subirImganuncios">
                    </div>
                    <img class="previsualizarImganuncios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $guardaranuncios = new ctrAnuncios();
                $guardaranuncios->ctrCrearAnuncios();
                
                
                ?>


            </form>







        </div>
    </div>
</div>







<!--=====================================
Modal EDITAR anuncios
======================================-->
<div class="modal modal-default fade" id="modal-editar-anuncios">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar anuncios</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="idanunciosE">
                    <input type="text" class="form-control" name="nom_anunciosE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="enlace_anunciosE" placeholder="enlace">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de anuncios
                        <input type="file" name="subirImganuncios">
                    </div>
                    <input type="hidden" name="fotoActualA">
                    <img class="previsualizarImganuncios img-fluid py-2" width='600' height='300'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $editaranuncios = new ctrAnuncios();
                $editaranuncios->ctrEditarAnuncios();
                
                
                ?>


            </form>



        </div>
    </div>
</div>
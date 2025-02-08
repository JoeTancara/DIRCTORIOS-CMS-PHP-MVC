<div class="content-wrapper" style="min-height: 717px;">


    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>administrar categorias</h1>

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
                                data-target="#modal-crear-categoria">
                                crear nueva categoria
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaCategoria" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>nombre</th>
                                        <th>foto</th>
                                        <th>descripcion</th>
                                        <th>acciones</th>

                                    </tr>

                                </thead>

                                <tbody>




                                    <?php 


foreach ($categorias as $key => $value) {


                        
                                
                                ?>



                                    <tr>

                                        <td><?php echo ($key +1 )  ?></td>
                                        <td><?php echo $value["cat_nombre"];  ?></td>
                                        <td><img src="<?php echo $rutaGruposFoto.$value["cat_foto"]  ?>" width="40"
                                                height="40"></td>
                                        <td><?php echo $value["cat_decript"];  ?></td>

                                        <td>

                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm editarCategoria"
                                                    idCat="<?php echo $value["id"];  ?>" data-toggle="modal"
                                                    data-target="#modal-editar-categoria">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarCategoria"
                                                    rutaFoto="<?php echo $value["cat_foto"];  ?>"
                                                    idCat="<?php echo $value["id"];  ?>">
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
Modal Crear categoria
======================================-->
<div class="modal modal-default fade" id="modal-crear-categoria">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nueva categoria</h4>
            </div>


            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_categoria" placeholder="nombre categoria">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="descri_categoria" placeholder="descripcion categoria">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de categoria
                        <input type="file" name="subirImgcategoria">
                    </div>
                    <img class="previsualizarImgcategoria img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $guardarcat = new categorias();
                $guardarcat->ctrCrearCatergorias();
                
                
                ?>


            </form>




        </div>
    </div>
</div>







<!--=====================================
Modal EDITAR categorias
======================================-->
<div class="modal modal-default fade" id="modal-editar-categoria">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar categoria</h4>
            </div>


            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="idcategoriaE">
                    <input type="text" class="form-control" name="nom_categoriaE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="descr_categoriaE" placeholder="descripcion">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de categoria
                        <input type="file" name="subirImgcategoria">
                    </div>
                    <input type="hidden" name="fotoActualCat">
                    <img class="previsualizarImgcategoria img-fluid py-2" width='600' height='300'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $editarcategoria = new categorias();
                $editarcategoria->ctrEditarCategoria();
                
                
                ?>


            </form>




        </div>
    </div>
</div>
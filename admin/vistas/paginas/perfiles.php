<div class="content-wrapper" style="min-height: 717px;">


    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>administrar perfiles</h1>

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

                            <button type="button" class="btn btn-success crear-perfil" data-toggle="modal"
                                data-target="#modal-crear-perfil">
                                crear nuevo perfil
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>nombre</th>
                                        <th>usuario</th>
                                        <th>foto</th>
                                        <th>rol</th>
                                        <th>acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                
                                foreach ($perfiles as $key => $value) {

                                    $item = "id_roles";
                                    
                                    $valor = $value["id_roles"];

                                    $rol= ctrPerfiles::ctrMostrarRoles($item,$valor);
                                 
                               
                                
                                
                                
                                ?>



                                    <tr>

                                        <td> <?php echo ($key+1)  ?></td>
                                        <td><?php echo $value["nombre"]  ?></td>
                                        <td><?php echo $value["usuario"]  ?></td>
                                        <td><img src="<?php echo $rutaGruposFoto.$value["foto"]  ?>" width="40"
                                                height="40"></td>
                                        <td><?php echo $rol["nom_rol"]  ?></td>
                                        <td>

                                            <div class='btn-group'>


                                                <button class="btn btn-warning btn-sm editarPerfil"
                                                    idPerfil="<?php echo $value["id_perfil"];  ?>" data-toggle="modal"
                                                    data-target="#modal-editar-perfil">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarPerfil"
                                                    idPerfil="<?php echo $value["id_perfil"];  ?>"
                                                    rutaFoto="<?php echo $value["foto"];  ?>">
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
Modal Crear perfil
======================================-->
<div class="modal modal-default fade" id="modal-crear-perfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo Perfil</h4>
            </div>


            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_perfil" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_user" placeholder="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de perfil
                        <input type="file" name="subirImgPerfil">
                    </div>
                    <img class="previsualizarImgPerfil img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="form-group has-feedback">

                    <label>rol</label>
                    <select class="form-control" name="rol_user" required>

                        <?php 

                    foreach ($roles as $key => $value) {
                                                       
                    ?>

                        <option value="<?php echo $value["id_roles"] ?>"><?php echo $value["nom_rol"] ?></option>

                        <?php 
                      }
                    
                    ?>

                    </select>

                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>


                <?php
                
                $guardarPerfil= new ctrPerfiles();
                $guardarPerfil->ctrGuardarPerfil();
                
                
                
                
                
                ?>


            </form>






        </div>
    </div>
</div>










<!--=====================================
Modal EDITAR perfil
======================================-->
<div class="modal modal-default fade" id="modal-editar-perfil">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar perfil</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="idPerfilE">
                    <input type="text" class="form-control" name="nom_PerfilE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="usu_PerfilE" placeholder="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="pass_userActual">
                    <input type="password" class="form-control" name="pass_user" placeholder="password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">

                    <label>rol</label>
                    <select class="form-control" name="rol_PerfilE" required>

                        <?php 

                    foreach ($roles as $key => $value) {
                                                       
                    ?>

                        <option value="<?php echo $value["id_roles"] ?>"><?php echo $value["nom_rol"] ?></option>

                        <?php 
                      }
                    
                    ?>

                    </select>

                </div>








                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de perfil
                        <input type="file" name="subirImgPerfil">
                    </div>
                    <input type="hidden" name="fotoActualE">
                    <img class="previsualizarImgPerfil img-fluid py-2" width='600' height='300'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $editarPerfil = new ctrPerfiles();
                $editarPerfil->ctrEditarPerfil();
                
                
                
                
                ?>






            </form>

        </div>
    </div>
</div>
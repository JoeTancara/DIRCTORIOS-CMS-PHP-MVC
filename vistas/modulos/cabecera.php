<head>
    <title>grupos de wsp y mas </title>
    <link rel="icon" href="<?php echo $ruta; ?>images/icon-red.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <?php

    if (isset($_GET["ruta"])) {
        $urli = explode("/", $_GET["ruta"]);
        if ($urli[0] == "cuerpo") {
            echo '  <meta content="cuerpo" name="description" />
                <meta content="cuerpo" name="keywords" />
                <meta property="og:image" content="cuerpo">';
        }

        if (
            $urli[0] == $categorias[0][1] ||
            $urli[0] == $categorias[1][1] ||
            $urli[0] == $categorias[2][1]
            /*$urli[0] == $categorias[3][1] ||
        $urli[0] == $categorias[4][1] ||
        $urli[0] == $categorias[5][1] ||
        $urli[0] == $categorias[6][1] ||
        $urli[0] == $categorias[7][1] ||
        $urli[0] == $categorias[8][1] ||
        $urli[0] == $categorias[9][1] ||
        $urli[0] == $categorias[10][1] */
        ) {

            foreach ($categorias as $key => $value) {
                if ($value["cat_nombre"] == $urli[0]) {
                    echo '  <meta content="' . $value["cat_decript"] . '" name="description" />
                                <meta content="' . $seo[0]["keywords"] . '' . $value["cat_nombre"] . '" name="keywords" />
                                <meta property="og:image" content="' . $ruta1 . $value["cat_foto"] . '">';
                }
            }
        } else if ($urli[0] . $urli[1] == "wspgrupodetalles" . $urli[1]) {
            foreach ($grupos as $key => $value) {
                if ($urli[1] == $value["id"]) {
                    echo '  <meta content="' . $value["wsp_descrip"] . '" name="description" />
                                <meta content="' . $value["wsp_keywords"] . '" name="keywords" />
                                <meta property="og:image" content="' . $ruta1 . $value["wsp_foto"] . '">';
                }
            }
        }
    } else {
        echo '  <meta content="' . $seo[0]["description"] . '" name="description" />
                <meta content="' . $seo[0]["keywords"] . '" name="keywords" />
                <meta property="og:image" content="cuerpo">';
    }
    ?>
    <meta content="" name="author" />
    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link id="bootstrap" href="<?php echo $ruta; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-grid" href="<?php echo $ruta; ?>css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link id="bootstrap-reboot" href="<?php echo $ruta; ?>css/bootstrap-reboot.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo $ruta; ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/jquery.countdown.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/de-grey.css" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="<?php echo $ruta; ?>css/colors/scheme-04.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>css/coloring.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<header class="transparent scroll-dark">
    <div class="container" id="cabeza">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="<?php echo $rutaPrincipal; ?>">
                                    <img alt="" src="<?php echo $ruta; ?>images/logo-3.png" />
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                        <div class="de-flex-col">
                            <input id="quick_search" class="xs-hide style-2" name="quick_search"
                                placeholder="Busque tu grupo aqui..." type="text" />
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">

                        <button type="button" id="myBtn" class="btn btn-success btn-lg" data-toggle="modal"
                            data-target="#exampleModal"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                            subir grupo
                        </button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--=====================================
Modal Crear GRUPO
======================================-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Crear Grupo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- input nombre -->
                    <div class="input-group mb-3">
                        <label>nombre del grupo</label>
                        <input type="text" class="form-control" name="nom_grupo" placeholder=" nombre grupo" required>
                    </div>
                    <!-- input usuario -->
                    <div class="input-group mb-3">
                        <label>link del grupo</label>
                        <input type="text" class="form-control" name="link_grupo" placeholder="link del grupo" required>
                    </div>
                    <!-- input password -->
                    <div class="input-group mb-3">
                        <label>descripcion del grupo</label>
                        <input type="text" class="form-control" name="desc_grupo" placeholder="descripcion del grupo"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <label> #Etiquetas clasifica tu grupo</label>
                        <input type="text" class="form-control" name="etiquetas_grupo"
                            placeholder="por ejemplo: amistad , amigos,humor , memes" required>
                    </div>
                    <!-- seleccionar el perfil -->
                    <div class="input-group mb-3">
                        <label>categorias</label>
                        <select class="form-control" name="cat_grupo" required>
                            <?php
                            foreach ($categorias as $ct) {
                            ?>
                                <option value="<?php echo $ct["id"] ?>"><?php echo $ct["cat_nombre"] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="form-group my-2">

                        <div class="btn btn-default btn-file">

                            <i class="fas fa-paperclip"></i> Adjuntar Foto del grupo

                            <input type="file" name="subirImgPlan" required>

                        </div>

                        <img class="previsualizarImgPlan img-fluid py-2">

                        <p class="help-block small">Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>

                    </div>



                    <?php

                    $guardargrupo = new Controladorwsp();
                    $guardargrupo->ctrGuardarGrupo();

                    ?>

                </div>

                <div class="modal-footer d-flex justify-content-between">

                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>
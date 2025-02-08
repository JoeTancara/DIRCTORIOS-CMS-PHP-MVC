<?php 


class categorias{

    static public function ctrEliminarCategorias($id , $ruta){
        unlink("../".$ruta);
        $tabla="categorias";
        $respuesta=mcategorias::mdlEliminarCategoria($tabla , $id);
        return $respuesta;
    }

    static public function ctrEditarCategoria(){


        if(isset($_POST["idcategoriaE"])){

            $tabla="categorias";

             if(isset($_FILES["subirImgcategoria"]["tmp_name"]) && !empty($_FILES["subirImgcategoria"]["tmp_name"])){
                list($ancho, $alto) = getimagesize($_FILES["subirImgcategoria"]["tmp_name"]);
                $nuevoAncho = 480;
				$nuevoAlto = 382;
                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/
					$directorio = "vistas/imagenes/categorias";	
                      /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/
                    if(isset($_POST["fotoActualCat"])){
                        
                        unlink($_POST["fotoActualCat"]);

                    }

                    	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgcategoria"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgcategoria"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutas);	

					}

                    else if($_FILES["subirImgcategoria"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgcategoria"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutas);

					}else{
                        echo "solo se permite png y jpg";

                        return;
                    }

             }


              if($rutas != ""){
                    $r= $rutas;
                }else{
                    $r = $_POST["fotoActualCat"];
                }

                      $datos = array("id" => $_POST["idcategoriaE"],
                                    "nombre" => $_POST["nom_categoriaE"],                               
                                    "decripcion" => $_POST["descr_categoriaE"],                              
                                    "img" => $r );
                                    $respuesta=mcategorias::mdlEditarCategoria($tabla , $datos);
                                    if($respuesta=="ok"){
                                           	echo "<script>

                                Swal.fire({
                                        title: 'creado!',
                                        text: 'categoria actualizada correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'categorias';
                                        }
                                        
                                    });                                                                                                                    
                                </script>
                                ";
                        }


        }
    }


    static public function ctrCategorias(){
        $tabla="categorias";
        $respuesta = mCategorias::mdlCategorias($tabla);
        return $respuesta;
    }

      /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

     static public function ctrMostrarCategorias($item,$valor){
        $tabla = "categorias";
        $respuesta= mcategorias::mdlMostrarCategorias($tabla,$item,$valor);
        return $respuesta;
    }

  


    static public function ctrCrearCatergorias(){
        if(isset($_POST["nom_categoria"])){
            	if(isset($_FILES["subirImgcategoria"]["tmp_name"])){
                    list($ancho, $alto) = getimagesize($_FILES["subirImgcategoria"]["tmp_name"]);
                    $nuevoAncho = 500;
					$nuevoAlto = 500;
					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					============================================*/
					$directorio = "vistas/imagenes/categorias/";
                    	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["subirImgcategoria"]["type"] == "image/jpeg"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgcategoria"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $ruta);
					}

                    	if($_FILES["subirImgcategoria"]["type"] == "image/png"){
						/*============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefrompng($_FILES["subirImgcategoria"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);

					}

                }

                $tabla = "categorias";

                $datos = array("nomCategoria" => $_POST["nom_categoria"],
							   "descriCategoria" => $_POST["descri_categoria"],													 
							   "imagenCategoria" => $ruta);
                               $respuesta = mcategorias::mdlCrearCategorias($tabla , $datos);
                               if($respuesta=="ok"){


                                  	echo "<script>

                                Swal.fire({
                                        title: 'creado!',
                                        text: 'categoria creada correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'categorias';
                                        }
                                        
                                    });

                                                                                                                                                            
                                </script>
                                ";




                               }







        }





        



    }





}



?>
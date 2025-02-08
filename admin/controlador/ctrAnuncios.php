<?php 


class ctrAnuncios{


static public function ctrEliminarAnuncios($id , $rutaFoto){

    unlink("../".$rutaFoto);

    $tabla="anuncios";

    $respuesta=mdlAnuncios::mdlEliminarAnuncios($tabla,$id);

    return $respuesta;




}





    static public function  ctrEditarAnuncios(){

        if(isset($_POST["idanunciosE"])){

             $tabla="anuncios";

            if(isset($_FILES["subirImganuncios"]["tmp_name"]) && !empty($_FILES["subirImganuncios"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["subirImganuncios"]["tmp_name"]);

                $nuevoAncho = 480;
				$nuevoAlto = 382;

                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/imagenes/anuncios";

                     /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/

                  
                    if(isset($_POST["fotoActualA"])){
                        
                        unlink($_POST["fotoActualA"]);

                    }


                    
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImganuncios"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImganuncios"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutas);	

					}

                    else if($_FILES["subirImganuncios"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImganuncios"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
			
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutas);

					}else{

                        echo "solo se acepta png o jpg";
                        
                        return;
                    }
                    
                
            }


              if($rutas != ""){

                      $r= $rutas;

                }else{

                    $r = $_POST["fotoActualA"];

                }


                    $datos = array("id" => $_POST["idanunciosE"],
                                    "nombre" => $_POST["nom_anunciosE"],                               
                                    "enlace" => $_POST["enlace_anunciosE"],                              
                                    "img" => $r );

                                    $respuesta=mdlAnuncios::mdlEditarAnuncios($tabla,$datos);

                                    if($respuesta=="ok"){

                                           	echo "<script>

                                                Swal.fire({
                                                        title: 'creado!',
                                                        text: 'anuncio editado correctamente',
                                                        icon: 'success',
                                                        confirmButtonText: 'ok'
                                                        }).then(function(result){

                                                        if(result.value){   
                                                            window.location = 'anuncios';
                                                        }
                                                        
                                                    });

                                                                                                                                                                            
                                                </script>
                                                ";

                                    }

        }


    }



      


    static public function ctrMotrarAnuncios(){

        $tabla="anuncios";

        $respuesta=mdlAnuncios::mdlMostrarAnuncios($tabla);


        return $respuesta;


    }

       static public function ctrMotrarAnuncios2($item,$valor){

        $tabla="anuncios";

        $respuesta=mdlAnuncios::mdlMostrarAnuncios2($tabla , $item , $valor);


        return $respuesta;


    }


    static public function ctrCrearAnuncios(){

        if(isset($_POST["nom_anuncios"])){

            if(isset($_FILES["subirImganuncios"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["subirImganuncios"]["tmp_name"]);

                $nuevoAncho = 500;
				$nuevoAlto = 500;

                	/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/imagenes/anuncios/";

                    	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImganuncios"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImganuncios"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

                    if($_FILES["subirImganuncios"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImganuncios"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}


            }


            $tabla="anuncios";

            	$datos = array("nomAnuncios" => $_POST["nom_anuncios"],
							   "enlaceAnuncios" => $_POST["enlace_anuncios"],													 
							   "imagenAnuncios" => $ruta);

                               $respuesta=mdlAnuncios::mdlCrearAnuncios($tabla,$datos);

                               if($respuesta=="ok"){

                                          	echo "<script>

                                Swal.fire({
                                        title: 'creado!',
                                        text: 'anuncio creado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'anuncios';
                                        }
                                        
                                    });

                                                                                                                                                            
                                </script>
                                ";




                               }










        }





    }







}




?>
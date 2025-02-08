<?php


class Grupos{


    static public function ctrGuardarGrupo(){


        if(isset($_POST["nom_grupo"])){
            $tabla ="grupos_wsp";
            if(isset($_FILES["subirImgGrupo"]["tmp_name"]) && !empty($_FILES["subirImgGrupo"]["tmp_name"])){

                list($ancho , $alto) = getimagesize($_FILES["subirImgGrupo"]["tmp_name"]);
                $nuevoAncho = 480;
                $nuevoAlto= 382;
                	/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL GRUPO
					=============================================*/
                $directorio = "vistas/imagenes/grupos";
                
               /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/ 

                if($_FILES["subirImgGrupo"]["type"] == "image/jpeg"){
                    $aleatorio = mt_rand(100,999);
                    $ruta = $directorio ."/".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($_FILES["subirImgGrupo"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto); 
                    imagecopyresized($destino ,$origen ,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
                    imagejpeg($destino ,$ruta);


                }

                else if($_FILES["subirImgGrupo"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgGrupo"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);	
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);
				}else{

                    echo 'error de imagen solo se permite png y jpg';
                    return;
                }

                $datos = array("nombre" => $_POST["nom_grupo"],
                                "link" => $_POST["link_grupo"],
                                "categoria" => $_POST["cat_grupo"],
                                "etiquetas" => $_POST["etiquetas_grupo"],
                                "img"=> $ruta,
                                "descripcion" => $_POST["desc_grupo"]);


                          $respuesta = mdlGrupos:: mdlguardarGrupo($tabla , $datos); 
                          
                          
                          if($respuesta== "ok"){

                           	echo "<script>

                               Swal.fire({
                                    title: 'guardado!',
                                    text: 'grupo guardado correctamente',
                                    icon: 'success',
                                    confirmButtonText: 'ok'
                                    }).then(function(result){

									if(result.value){   
									    window.location = 'grupos';
									  }                                     
                                });                                                                                                                      
                               </script>
                               ";
                          }else{
                            echo "error";
                          }
            }
        }        
    }

    static public function ctrMostrarGrupos(){
        $tabla="grupos_wsp";
        $respuesta = mdlGrupos::mdlMostrarGrupos($tabla);
        return $respuesta;
    }
       static public function ctrMostrarGrupos1($item , $valor){
        $tabla="grupos_wsp";
        $respuesta = mdlGrupos::mdlMostrarGrupos1($tabla ,$item , $valor);
        return $respuesta;

    }



    static public function ctrEditarGrupo(){

        if(isset($_POST["nom_grupoE"])){
            $tabla="grupos_wsp";
            if(isset($_FILES["subirImgGrupoE"]["tmp_name"]) && !empty($_FILES["subirImgGrupoE"]["tmp_name"])){
                list($ancho , $alto) = getimagesize($_FILES["subirImgGrupoE"]["tmp_name"]);
                $nuevoAncho = 480;
                $nuevoAlto= 382;
                /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL GRUPO
					=============================================*/
                $directorio = "vistas/imagenes/grupos";
                 /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/
                if(isset($_POST["fotoActualE"])){
                    unlink($_POST["fotoActualE"]);
                }

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if($_FILES["subirImgGrupoE"]["type"] == "image/jpeg"){
						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgGrupoE"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutas);	
					}

                    else if($_FILES["subirImgGrupoE"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgGrupoE"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutas);
					}else{
                         echo 'error de imagen solo se permite png y jpg';
                         return;
                    }
                }

                    if($rutas != ""){
                        $r = $rutas;
                    }else{

                        $r =$_POST["fotoActualE"];
                    }
                $datos = array("id" => $_POST["idGrupoE"],
                                    "nombre" => $_POST["nom_grupoE"],
                                    "link" =>  $_POST["link_grupoE"],
                                    "categoria" => $_POST["cat_grupoE"],
                                    "etiquetas" => $_POST["etiquetas_grupoE"],
                                    "img" => $r,
                                    "descripcion" => $_POST["desc_grupoE"] );
                                    
                                  //  var_dump($datos);

                                 $respuesta = mdlGrupos::mdlEditarGrupo($tabla , $datos);

                                   if($respuesta == "ok"){

                           	echo "<script>

                                Swal.fire({
                                        title: 'editado!',
                                        text: 'grupo editado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'grupos';
                                        }   
                                    });                                                                                                                           
                                </script>
                                ";
                          }else{
                            echo "error";
                          }
        }
    }

    static public function ctrEliminarGrupos($id , $rutaFoto){
        unlink("../".$rutaFoto);
        $tabla ="grupos_wsp";
        $respuesta = mdlGrupos::mdlEliminarGrupo($tabla,$id);
        return $respuesta;
    }
}


?>
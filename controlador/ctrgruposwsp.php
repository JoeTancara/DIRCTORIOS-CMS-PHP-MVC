<?php 
class Controladorwsp{
    static public function ctrGrupos(){
        $tabla="grupos_wsp";
        $respuesta = whatsapp::getGruposWsp($tabla);
        return $respuesta;
    }

    static public function ctrDetalleGrupo(){
       if(isset($_GET["ruta"])){
        $url1 = explode("/" , $_GET["ruta"]);
        $tabla="grupos_wsp";
        $respuesta= whatsapp::getGruposWsp2($tabla , "id" ,$url1[1]);
        return $respuesta;
       }

    }

    static public function ctrGuardarGrupo(){
        if(isset($_POST["nom_grupo"])){
            $tabla ="grupos_wsp";
            if(isset($_FILES["subirImgPlan"]["tmp_name"]) && !empty($_FILES["subirImgPlan"]["tmp_name"])){
                list($ancho , $alto) = getimagesize($_FILES["subirImgPlan"]["tmp_name"]);
                $nuevoAncho= 400;
                $nuevoAlto=382;
                   	/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL grupo
					=============================================*/
                    $directorio ="admin/vistas/imagenes/grupos";
                    	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if($_FILES["subirImgPlan"]["type"] == "image/jpeg"){
                        $aleatorio = mt_rand(100 ,999);
                        $ruta = $directorio."/".$aleatorio.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["subirImgPlan"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho , $nuevoAlto);
                        imagecopyresized($destino , $origen ,0,0,0,0 ,$nuevoAncho , $nuevoAlto , $ancho , $alto);
                        imagejpeg($destino , $ruta);                          
                    }
                    	else if($_FILES["subirImgPlan"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgPlan"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);

					}else{
                        echo 'no se permite dicho formato de imagen ';
                        return ; 
                    }
                    $ruta1 = str_replace("admin","",$ruta);
                    $ruta = str_replace("/vistas","vistas",$ruta1);
                    $datos = array("nombre" => $_POST["nom_grupo"],
                                    "link" => $_POST["link_grupo"],
                                    "categoria" => $_POST["cat_grupo"],
                                    "etiquetas" => $_POST["etiquetas_grupo"],
                                    "img" => $ruta,
                                    "descripcion" => $_POST["desc_grupo"] );
                                 //   var_dump($datos);
                                   $respuesta = whatsapp::mdlguardarGrupo($tabla , $datos);
                                    if($respuesta == "ok"){       
                                         $html = "<div id='alerta' class='alert alert-success alert-dismissible   text-center' style='color:red;'>se guardo correctamente</div>";
                                            echo '<script>
                                            document.getElementById("cabeza").innerHTML = "'.$html.'";
                                            setTimeout(function(){ window.location.href= "inicio";}, 1500);
                                    
                                            </script>';
                                    }else{
                                        echo 'error';
                                    }
            }
        }
    }
}

?>
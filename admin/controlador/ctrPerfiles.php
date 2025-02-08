<?php 


class ctrPerfiles{


    static public function ctrIngresoAdministradores(){

        if(isset($_POST["ingresoUsuario"])){
            	$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla="perfiles";
                $item="usuario";
                $valor=$_POST["ingresoUsuario"];
                $respuesta=mdlPerfiles::mdlMostrarPerfiles1($tabla,$item,$valor);
                if($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword ){
                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["idBackend"]= $respuesta["id_perfil"];
                    echo '<script>
                    window.location="perfiles"; 
                    </script>';
                }else{

                    	echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
                }


        }


    }

    static public function ctrEditarPerfil(){
        if(isset($_POST["idPerfilE"])){
            $tabla="perfiles";
             if(isset($_FILES["subirImgPerfil"]["tmp_name"]) && !empty($_FILES["subirImgPerfil"]["tmp_name"])){
                    list($ancho, $alto) = getimagesize($_FILES["subirImgPerfil"]["tmp_name"]);
                    $nuevoAncho = 480;
					$nuevoAlto = 382;
                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/
					$directorio = "vistas/imagenes/perfiles";  
                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                    =============================================*/                 
                    if(isset($_POST["fotoActualE"])){
                        
                        unlink($_POST["fotoActualE"]);

                    }
                	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["subirImgPerfil"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgPerfil"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutas);	
					}

                    else if($_FILES["subirImgPerfil"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgPerfil"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutas);

					}else{
                        echo "no se permiten otros formatos mas alla de png o jpg";
                        return;
                    }

                 }
                 if($rutas != ""){
                      $r= $rutas;
                }else{
                    $r = $_POST["fotoActualE"];
                }
                
                if($_POST["pass_user"] != ""){
					$password = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
				}else{
					$password = $_POST["pass_userActual"];
				}



                 $datos = array("idP" => $_POST["idPerfilE"],
                                    "nombreP" => $_POST["nom_PerfilE"],
                                    "usuarioP" =>  $_POST["usu_PerfilE"],
                                    "passworedP" => $password,
                                    "rolP" => $_POST["rol_PerfilE"],
                                    "img" => $r);



                 $respuesta= mdlPerfiles::mdlEditarPerfiles($tabla,$datos);   
                 
                 
                 if($respuesta == "ok"){

                    echo "
                    <script>
                                Swal.fire({
                                        title: 'editado!',
                                        text: 'perfil editado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){
                                        if(result.value){   
                                            window.location = 'perfiles';
                                        } 
                                    });                                                                                                                          
                                </script>  
                    ";
                 }else{
                    echo "error";
                 }
          }

    }

    static public function ctrEliminarPerfiles($id , $ruta){
        unlink("../".$ruta);
        $tabla="perfiles";
        $respuesta=mdlPerfiles::mdlEliminarPerfiles($tabla , $id);
        return $respuesta;
    }



    static public function ctrMostrarPerfiles(){
        $tabla="perfiles";
        $respuesta=mdlPerfiles::mdlMostrarPerfiles($tabla);
        return $respuesta;
    }

     static public function ctrMostrarPerfiles1($item , $valor){
        $tabla="perfiles";
        $respuesta=mdlPerfiles::mdlMostrarPerfiles1($tabla , $item , $valor);
        return $respuesta;
    }


    static public function ctrMostrarRoles($item,$valor){
        $tabla = "roles";
        $respuesta = mdlPerfiles::mdlMostrarRoles($tabla , $item , $valor);
        return $respuesta;
    }


    static public function ctrMostrarRoles1(){
        $tabla = "roles";
        $respuesta = mdlPerfiles::mdlMostrarRoles1($tabla);
        return $respuesta;
    }




    static public function ctrGuardarPerfil(){

         if(isset($_POST["nom_perfil"])){
             if(isset($_FILES["subirImgPerfil"]["tmp_name"]) && !empty($_FILES["subirImgPerfil"]["tmp_name"])){
                    list($ancho, $alto) = getimagesize($_FILES["subirImgPerfil"]["tmp_name"]);

                    $nuevoAncho = 480;
					$nuevoAlto = 382;
                       /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PERFIL
					=============================================*/
					$directorio = "vistas/imagenes/perfiles";
                    	/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if($_FILES["subirImgPerfil"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgPerfil"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $ruta);	
					}

                    else if($_FILES["subirImgPerfil"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgPerfil"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);

					}else{

                        echo "solo se permite imagenes pnh y jpg";

                        return;
                    }    
             }
             $encriptarPassword = crypt($_POST["pass_user"] , '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                     $datos = array("nom_perfil" => $_POST["nom_perfil"],
                                    "nom_user" =>  $_POST["nom_user"],
                                    "pass_user" => $encriptarPassword,                                 
                                    "img" => $ruta,
                                    "cat_user" => $_POST["rol_user"]);
                    $tabla="perfiles";
                    $respuesta = mdlPerfiles::mdlGuardarPerfil($tabla , $datos);
                    if($respuesta == "ok"){
                           	echo "<script>

                                Swal.fire({
                                        title: 'editado!',
                                        text: 'perfil guardado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'ok'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'perfiles';
                                        }
                                        
                                    });

                                                                                                                                                            
                                </script>
                                ";
                    }
         }

    }
}




?>
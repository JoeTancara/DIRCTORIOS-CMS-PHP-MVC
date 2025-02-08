<?php 

class ctrAnuncios{
    static public function ctrAnuncios1(){
        $tabla="anuncios";
        $respuesta = mdlAnuncios::mdlAnuncios1($tabla);
        return $respuesta;
    }
}
?>
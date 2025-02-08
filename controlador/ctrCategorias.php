<?php 

class Categorias{
    static public function ctrCategorias(){
          $tabla="categorias";
        $respuesta = mdlcategorias::getCategorias($tabla);
        return $respuesta;
    }
}
?>
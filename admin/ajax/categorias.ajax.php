<?php 

require_once "../controlador/ctrCategorias.php";
require_once "../modelo/modelo.categorias.php";



class AjaxCategorias{


    /*=============================================
	Editar categorias
	=============================================*/	

    public $idCate;

    public function ajaxMostrarCategorias(){

        $item= "id";
        $valor= $this->idCate;
        
        $respuesta=categorias::ctrMostrarCategorias($item , $valor);

      //  $respuesta=$valor;

     

        echo json_encode($respuesta);
    }

      /*=============================================
	eliminar categorias
	=============================================*/	

    public $idcategorias;
    public $rutaFoto;

    public function ajaxEliminarCategoria(){

        $respuesta=categorias::ctrEliminarCategorias($this->idcategorias , $this->rutaFoto);

        echo $respuesta;

    }






    

}






/*=============================================
Editar categoria
=============================================*/
if(isset($_POST["idCategoria"])){

	$editar = new AjaxCategorias();
	$editar ->idCate = $_POST["idCategoria"];
	$editar ->ajaxMostrarCategorias();

}


/*=============================================
eliminar categoria
=============================================*/
if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxCategorias();
	$eliminar ->idcategorias = $_POST["idEliminar"];
    $eliminar ->rutaFoto = $_POST["rutaFoto"];
	$eliminar ->ajaxEliminarCategoria();

}
<?php 

require_once "../controlador/ctrAnuncios.php";
require_once "../modelo/modelo.anuncios.php";


class AjaxAnuncios{


    public $idAnuncios;

    public function ajaxMostrarAnuncios(){

        $item="id";
        $valor=$this->idAnuncios;

        $respuesta=ctrAnuncios::ctrMotrarAnuncios2($item , $valor);

        echo json_encode($respuesta);


    }

      /*=============================================
	Eliminar anuncios
	=============================================*/	

    public $idAds;
    public $rutaFoto;

    public function ajaxEliminarAnuncios(){


        $respuesta=ctrAnuncios::ctrEliminarAnuncios($this->idAds,$this->rutaFoto);

        echo $respuesta;
    }










}



if(isset($_POST["idAnuncios"])){

    $editar= new AjaxAnuncios();
    $editar->idAnuncios = $_POST["idAnuncios"];
    $editar->ajaxMostrarAnuncios();


}





if(isset($_POST["idEliminar"])){


    $eliminar= new AjaxAnuncios();
    $eliminar->idAds=$_POST["idEliminar"];
    $eliminar->rutaFoto=$_POST["rutaFoto"];
    $eliminar->ajaxEliminarAnuncios();

}













?>
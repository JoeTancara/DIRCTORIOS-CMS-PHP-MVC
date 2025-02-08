<?php 

require_once "../controlador/ctrGrupos.php";
require_once "../modelo/modelo.grupos.php";



class AjaxGrupos{

 /*=============================================
	Editar grupos
	=============================================*/	

    public $idGrupo;

    public function ajaxMostrarGrupos(){

        $item = "id";
        $valor= $this->idGrupo;

        $respuesta = Grupos::ctrMostrarGrupos1($item , $valor);

        echo json_encode($respuesta);



    }



      /*=============================================
	Eliminar grupo
	=============================================*/	

	public $idEliminar;
	public $rutaFoto;

	public function ajaxEliminarGrupos(){

		$respuesta = Grupos::ctrEliminarGrupos($this->idEliminar, $this->rutaFoto);

		echo $respuesta;

	}



}



if(isset($_POST["idGrupo"])){

    $editar = new AjaxGrupos();
    $editar ->idGrupo = $_POST["idGrupo"];
    $editar->ajaxMostrarGrupos();

}


if(isset($_POST["idEliminar"])){

    $eliminar = new AjaxGrupos();
    $eliminar->idEliminar = $_POST["idEliminar"];
    $eliminar->rutaFoto = $_POST["rutaFoto"];
    $eliminar->ajaxEliminarGrupos();




}




?>
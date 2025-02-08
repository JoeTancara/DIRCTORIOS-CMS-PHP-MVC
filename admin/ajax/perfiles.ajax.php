<?php 

require_once "../controlador/ctrPerfiles.php";
require_once "../modelo/modelo.perfiles.php";



class AjaxPerfiles{



    public $idPerfil;

    public function ajaxMostrarPerfiles(){

        $item ="id_perfil";
        $valor= $this->idPerfil;

        $respuesta = ctrPerfiles::ctrMostrarPerfiles1($item , $valor);

        echo json_encode($respuesta);

    }


    public $idEliminar;
    public $rutaFoto;

    public function ajaxEliminarPerfil(){

        $respuesta=ctrPerfiles::ctrEliminarPerfiles($this->idEliminar , $this->rutaFoto);

        echo $respuesta;



    }




}


if(isset($_POST["idPerfil"])){

    $editar =new AjaxPerfiles();
    $editar->idPerfil = $_POST["idPerfil"];
    $editar->ajaxMostrarPerfiles();




}


if(isset($_POST["idPerfil1"])){

    $eliminar = new AjaxPerfiles();
    $eliminar->idEliminar=$_POST["idPerfil1"];
    $eliminar->rutaFoto=$_POST["rutaFoto"];
    $eliminar->ajaxEliminarPerfil();
}











?>
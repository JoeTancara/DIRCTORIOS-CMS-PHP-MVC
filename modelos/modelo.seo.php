<?php 

require_once "conexion.php";

class seo{
    static public function getSeo(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM seo");
        $stmt ->execute();
        return $stmt -> fetchAll();
        $stmt ->close();
        $stmt = null;
    }
}

?>
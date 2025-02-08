<?php

class mdlAnuncios{

static public function mdlAnuncios1($tabla){
 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt ->execute();
        return $stmt ->fetchAll();
        $stmt -> close();
        $stmt = null;
}
}

?>
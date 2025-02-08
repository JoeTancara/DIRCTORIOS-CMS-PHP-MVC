<?php 

require_once "conexion.php";

class whatsapp{

    static public function getGruposWsp($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt ->execute();
        return $stmt ->fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    static public function getGruposWsp2($tabla , $item , $valor){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
    }

    static public function mdlguardarGrupo($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cat, wsp_nom, wsp_link, wsp_descrip ,wsp_foto ,wsp_keywords) VALUES (:id_cat, :wsp_nom, :wsp_link, :wsp_descri ,:wsp_foto, :wsp_keywords)");
        $stmt->bindParam(":id_cat", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":wsp_nom", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":wsp_link", $datos["link"], PDO::PARAM_STR);
		$stmt->bindParam(":wsp_descri", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":wsp_foto", $datos["img"], PDO::PARAM_STR);
        $stmt->bindParam(":wsp_keywords", $datos["etiquetas"], PDO::PARAM_STR);
        if($stmt ->execute()){
            return "ok";
        }else{

            echo "error";
        }
        $stmt->close();
		$stmt = null;
    }
}


?>
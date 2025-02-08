<?php 

require_once "conexion.php";


class mcategorias{


    static public function mdlEliminarCategoria($tabla , $id){

        $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;





    }



    static public function mdlEditarCategoria($tabla , $datos){

         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cat_nombre=:cat_nom, cat_foto=:img, cat_decript=:descr WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
	    $stmt->bindParam(":cat_nom", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descr", $datos["decripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);

        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;





    }


    static public function mdlCategorias($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");


        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;




    }

    static public function mdlMostrarCategorias($tabla , $item , $valor){


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
     
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;
        

    }

   


    static public function mdlCrearCategorias($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cat_nombre , cat_decript , cat_foto) VALUES (:nombreC, :descriC, :imgC)");

        $stmt->bindParam(":nombreC", $datos["nomCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":descriC", $datos["descriCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":imgC", $datos["imagenCategoria"], PDO::PARAM_STR);

        if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;





    }





}





?>
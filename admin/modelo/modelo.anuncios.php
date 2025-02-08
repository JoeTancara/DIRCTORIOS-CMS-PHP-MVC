<?php 

require_once "conexion.php";


class mdlAnuncios{


    static public function mdlEliminarAnuncios($tabla,$id){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

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



    static public function mdlEditarAnuncios($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombreA, enlace=:enlaceA, foto=:imgA WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
	    $stmt->bindParam(":nombreA", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":enlaceA", $datos["enlace"], PDO::PARAM_STR);
		$stmt->bindParam(":imgA", $datos["img"], PDO::PARAM_STR);


        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;








    }



    static public function mdlMostrarAnuncios($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");


        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;




    }

    static public function mdlMostrarAnuncios2($tabla , $item , $valor){


         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
     
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;









    }


    static public function mdlCrearAnuncios($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre , enlace , foto) VALUES (:nombreA, :enlaceA, :imgA)");


        $stmt->bindParam(":nombreA", $datos["nomAnuncios"], PDO::PARAM_STR);
		$stmt->bindParam(":enlaceA", $datos["enlaceAnuncios"], PDO::PARAM_STR);
		$stmt->bindParam(":imgA", $datos["imagenAnuncios"], PDO::PARAM_STR);

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
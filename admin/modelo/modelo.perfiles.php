<?php 

require_once "conexion.php";

class mdlPerfiles{







    

    static public function mdlGuardarPerfil($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_roles, nombre, usuario, password, foto) VALUES(:id_rolesG ,:nombreG ,:usuarioG ,:passwordG ,:fotoG)");

         $stmt->bindParam(":id_rolesG", $datos["cat_user"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreG", $datos["nom_perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":usuarioG", $datos["nom_user"], PDO::PARAM_STR);
        $stmt->bindParam(":passwordG", $datos["pass_user"], PDO::PARAM_STR);
		$stmt->bindParam(":fotoG", $datos["img"], PDO::PARAM_STR);


        if($stmt->execute()){

            return "ok";



        }else{


            echo "error";
        }

        $stmt->close();
		$stmt = null;







    }



    static public function mdlMostrarPerfiles($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

		return $stmt -> fetchAll();

        $stmt-> close();

		$stmt = null;


    }

      static public function mdlMostrarPerfiles1($tabla , $item , $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt-> close();

		$stmt = null;


    }


    static public function mdlMostrarRoles($tabla , $item , $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt-> close();

		$stmt = null;


    }


      static public function mdlMostrarRoles1($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

		return $stmt -> fetchAll();

        $stmt-> close();

		$stmt = null;




    }



    static public function mdlEditarPerfiles($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_roles=:rolP, nombre=:nombreP, usuario=:usuarioP, password=:passworedP , foto=:img WHERE id_perfil = :idP");

        $stmt->bindParam(":idP", $datos["idP"], PDO::PARAM_STR);
	    $stmt->bindParam(":nombreP", $datos["nombreP"], PDO::PARAM_STR);
        $stmt->bindParam(":usuarioP", $datos["usuarioP"], PDO::PARAM_STR);
        $stmt->bindParam(":passworedP", $datos["passworedP"], PDO::PARAM_STR);
		$stmt->bindParam(":rolP", $datos["rolP"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;


    }



    static public function mdlEliminarPerfiles($tabla , $id){

        $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_perfil =:id");

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt ->execute()){


            return "ok";
            
        }else{

            echo "error";
        }

        $stmt -> close();

		$stmt = null;






    }





}



?>
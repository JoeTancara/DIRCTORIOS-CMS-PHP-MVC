<?php 


$ruta = Ruta::ctrRuta();
$ruta1 = Ruta::ctrRutaCompleta();
$rutaPrincipal = Ruta::ctrRutaPrincipal();

$grupos =Controladorwsp::ctrGrupos();
$categorias = Categorias::ctrCategorias();
$anuncios = ctrAnuncios::ctrAnuncios1();

$seo = seo::getSeo();

//echo $categorias[0][1];

//echo "<>"; print_r($grupos); echo "<pre>";

//$url = explode("/" , $_GET["ruta"]);

//var_dump($url);

?>



<!DOCTYPE html>
<html lang="zxx">

<?php include "modulos/cabecera.php"; ?>


<body class="dark-scheme de-grey">
    <div id="wrapper">




        <?php

$url = array();


if(isset($_GET["ruta"])){


    $url = explode("/" , $_GET["ruta"]);


    if($url[0] == "inicio" ||
       $url[0] == "wspgrupodetalles"){


        include "modulos/". $url[0]. ".php";

        
    }if($url[0] == $categorias[0][1] ||
        $url[0] == $categorias[1][1] ||
        $url[0] == $categorias[2][1] ||
        $url[0] == $categorias[3][1] ||
        $url[0] == $categorias[4][1]){


            include "modulos/gruposespecificos.php";

        }


}else{


     include "modulos/inicio.php";



}




?>














        <a href="#" id="back-to-top"></a>
        <?php include "modulos/footer.php"; ?>


    </div>




</body>



</html>
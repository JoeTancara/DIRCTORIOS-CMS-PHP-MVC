<section id="section-text" class="no-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="style-2">anuncios hot xxx</h2>
            </div>



            <?php 



foreach($anuncios as $value){

?>

            <div class="col-lg-4 col-md-6 mb-sm-30">
                <div class="feature-box f-boxed style-3">

                    <a href="<?php echo $value["enlace"];  ?>">
                        <img class="lazy" src="<?php echo $ruta1.$value["foto"];  ?>" width="270" height="230">
                    </a>

                </div>
            </div>
            <?php


}  

?>



        </div>
    </div>
</section>
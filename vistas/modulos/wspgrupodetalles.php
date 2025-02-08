<?php 

$gruposdetalle =Controladorwsp::ctrDetalleGrupo();

foreach ($gruposdetalle as $key => $value) {



?>

<br>
<br>



<div class="row" style="background-size: cover;">
    <div class="col-md-6 text-center" style="background-size: cover;">
        <img src="<?php echo $ruta1.$value["wsp_foto"]; ?>" class="nft_img_preview img-fluid img-rounded mb-sm-30"
            alt="">
    </div>
    <div class="col-md-6" style="background-size: cover;">
        <div class="item_info" style="background-size: cover;">
            Auctions ends in <div class="de_countdown is-countdown" data-year="2021" data-month="10" data-day="16"
                data-hour="8" style="background-size: cover;"><span class="countdown-row countdown-show3"><span
                        class="countdown-section"><span class="countdown-amount">0h</span></span><span
                        class="countdown-section"><span class="countdown-amount">0m</span></span><span
                        class="countdown-section"><span class="countdown-amount">0s</span></span></span></div>
            <h2><?php echo $value["wsp_nom"]; ?></h2>
            <div class="item_info_counts" style="background-size: cover;">
                <div class="item_info_type" style="background-size: cover;"><i class="fa fa-image"></i>Art</div>
                <div class="item_info_views" style="background-size: cover;"><i class="fa fa-eye"></i>250</div>
                <div class="item_info_like" style="background-size: cover;"><i class="fa fa-heart"></i>18</div>
            </div>
            <p><?php echo $value["wsp_descrip"]; ?></p>


            <div class="menu_side_area">
                <a href="<?php echo $value["wsp_link"]; ?>" class="btn btn-success btn-lg">
                    <span><i class="fa fa-whatsapp" aria-hidden="true"></i> unirse al
                        grupo</span></a>
                <span id="menu-btn"></span>
            </div>

            <br>

            <br>



            <?php include "etiquetas.php"; ?>


        </div>
    </div>
</div>


<?php 

}
?>


<?php include "anuncios.php"; ?>
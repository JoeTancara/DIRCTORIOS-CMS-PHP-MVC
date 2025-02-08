    <div id="item-carousel-big" class="owl-carousel wow fadeIn">


        <?php 


foreach ($categorias as $key => $value) {

    echo '

        <div class="nft_pic">
            <a href="'.$rutaPrincipal.$value["cat_nombre"].'">
                <span class="nft_pic_info">
                    <span class="nft_pic_title">'.$value["cat_nombre"].'</span>
                    <span class="nft_pic_by">Fred Ryan</span>
                </span>
            </a>
            <div class="nft_pic_wrap">
                <img  src="'.$ruta1.$value["cat_foto"].'" class="lazy img-fluid" alt="'.$value["cat_decript"].'" >
            </div>
        </div>
    
    
    
    ';
    




}



?>













    </div>
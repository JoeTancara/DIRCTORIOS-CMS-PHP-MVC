      <div class="no-bottom no-top" id="content">
          <div id="top"></div>
          <section id="section-hero" class="no-bottom" aria-label="section">
              <div class="d-carousel">

                  <?php include "categorias.php"; ?>

                  <div class="d-arrow-left"><i class="fa fa-angle-left"></i></div>
                  <div class="d-arrow-right"><i class="fa fa-angle-right"></i></div>
              </div>
          </section>
          <br>
          <br>
          <?php include "etiquetas.php"; ?>

          <?php include "anuncios.php"; ?>


          <section id="section-collections" class="pt30 pb30">
              <div class="container">

                  <div class="spacer-single"></div>

                  <div class="row wow fadeIn">
                      <div class="col-lg-12">
                          <h2 class="style-2">nuevos grupos</h2>
                      </div>




                      <?php 


foreach ($grupos as $key => $value) {


    echo ' 
     <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">

                                <div class="nft__item_wrap">

                                    <a href="wspgrupodetalles/'.$value["id"].'">
                                        <img src="'.$ruta1.$value["wsp_foto"].'"
                                            class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="03_grey-item-details.html">
                                        <h4>'.$value["wsp_nom"].'</h4>
                                    </a>
                                    <div class="nft__item_click">

                                    </div>
                                    <div class="nft__item_price">
                                        '.$value["wsp_descrip"].'
                                    </div>


                        <div class="menu_side_area">
                                <a href="wspgrupodetalles/'.$value["id"].'"
                        class="btn btn-success btn-lg">
                        <span><i class="fa fa-whatsapp" aria-hidden="true"></i> unirse al
                            grupo</span></a>
                        <span id="menu-btn"></span>
                    </div>



                </div>
        </div>
    </div>';

    }

    ?>








                  </div>

                  <div class="spacer-single"></div>

                  <div class="row">
                      <div class="col-lg-12">
                          <h2 class="style-2">Grupos recien Agregados
                          </h2>
                      </div>
                      <div id="collection-carousel-alt" class="owl-carousel wow fadeIn">



                          <?php 


foreach ($grupos as $key => $value) {
    

echo '   <div class="nft_coll style-2">
                                <div class="nft_wrap">
                                    <a href="wspgrupodetalles/'.$value["id"].'"><img
                                            src="'.$ruta1.$value["wsp_foto"].'"
                                            class="lazy img-fluid" alt=""></a>
                                </div>

                                <div class="nft_coll_info">
                                    <a href="03_grey-collection.html">
                                        <h4>'.$value["wsp_nom"].'</h4>
                                    </a>
                                    <span>'.$value["wsp_descrip"].'</span>
                                </div>

                                
                        <div class="menu_side_area">
                                <a href="wspgrupodetalles/'.$value["id"].'"
                        class="btn btn-success btn-lg">
                        <span><i class="fa fa-whatsapp" aria-hidden="true"></i> unirse al
                            grupo</span></a>
                        <span id="menu-btn"></span>
                    </div>

                    
                            </div>';





}

?>




                      </div>
                  </div>

                  <div class="spacer-double"></div>


              </div>
          </section>



      </div>
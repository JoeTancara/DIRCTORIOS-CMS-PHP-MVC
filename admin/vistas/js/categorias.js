
$.ajax({

	url: "ajax/categorias.ajax.php",
	success:function(respuesta){
		
		console.log("respuestat", respuesta);

	}

})




$(".tablaCategoria").DataTable({
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});







/*=============================================
Subir imagen temporal crear categoria
=============================================*/

$("input[name='subirImgcategoria']").change(function(){

  var imagen = this.files[0];
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgcategoria']").val("");

	   swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else if(imagen["size"] > 2000000){

	  $("input[name='subirImgcategoria']").val("");

	   swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

	  var datosImagen = new FileReader;
	  datosImagen.readAsDataURL(imagen);

	  $(datosImagen).on("load", function(event){

	    var rutaImagen = event.target.result;

	    $(".previsualizarImgcategoria").attr("src", rutaImagen);

	  })

	}

})






/*=============================================
Editar grupo
=============================================*/



$(document).on("click", ".editarCategoria", function(){

    var idCategoria = $(this).attr("idCat");
    
    console.log("ID", idCategoria);

	var datos = new FormData();
  	datos.append("idCategoria", idCategoria);

  	$.ajax({
  		url:"ajax/categorias.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
        success:function(respuesta){
            
                console.log("respuesta", respuesta);

            $('input[name="idcategoriaE"]').val(respuesta["id"]);
			$('input[name="nom_categoriaE"]').val(respuesta["cat_nombre"]);
    		$('input[name="descr_categoriaE"]').val(respuesta["cat_decript"]);			  	
            $(".previsualizarImgcategoria").attr("src", respuesta["cat_foto"]);
            $('input[name="fotoActualCat"]').val(respuesta["cat_foto"]);
			

    	}

  	})

})









/*=============================================
Eliminar categorias
=============================================*/

$(document).on("click", ".eliminarCategoria", function () {

	var idCategoria = $(this).attr("idCat");
	var rutaFoto = $(this).attr("rutaFoto");


	 Swal.fire({
                title: 'eliminar!',
                text: 'estas seguro de eliminar',
                icon: 'success',
                confirmButtonText: 'si eliminar'
                }).then(function(result){

					if (result.value) {
					
						var datos = new FormData();

						datos.append("idEliminar", idCategoria);
						datos.append("rutaFoto", rutaFoto);

						$.ajax({

								url: "ajax/categorias.ajax.php",
								method: "POST",
								data: datos,
								cache: false,
								contentType: false,
								processData: false,
							success: function (respuesta) {
									
								if (respuesta == "ok") {

									 Swal.fire({
                                        title: 'eliminado!',
                                        text: 'categoria eliminada correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'cerrar'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'categorias';
                                        }
                                        
                                    });
								}
     						}	
							
						})									
								
														
                }
                                        
            });

})
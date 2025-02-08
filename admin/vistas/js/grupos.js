$(".tablaGrupos").DataTable({
	
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
Subir imagen temporal crear grupo
=============================================*/

$("input[name='subirImgGrupo']").change(function(){

  var imagen = this.files[0];
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgGrupo']").val("");

	   swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else if(imagen["size"] > 2000000){

	  $("input[name='subirImgGrupo']").val("");

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

	    $(".previsualizarImgGrupo").attr("src", rutaImagen);

	  })

	}

})




/*=============================================
Subir imagen temporal editar grupo
=============================================*/

$("input[name='subirImgGrupoE']").change(function(){

  var imagen = this.files[0];
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgGrupoE']").val("");

	   swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else if(imagen["size"] > 2000000){

	  $("input[name='subirImgGrupoE']").val("");

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

	    $(".previsualizarImgGrupoE").attr("src", rutaImagen);

	  })

	}

})




/*=============================================
Editar grupo
=============================================*/

$(document).on("click", ".editarGrupo", function () {

	var idGrupo = $(this).attr("idGrupo");
	var datos = new FormData();

	datos.append("idGrupo", idGrupo);

	$.ajax({
		url: "ajax/grupos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$('input[name="idGrupoE"]').val(respuesta["id"]);
			$('input[name="nom_grupoE"]').val(respuesta["wsp_nom"]);
			$('input[name="link_grupoE"]').val(respuesta["wsp_link"]);
			$('input[name="etiquetas_grupoE"]').val(respuesta["wsp_keywords"]);
			$('input[name="desc_grupoE"]').val(respuesta["wsp_descrip"]);
			$(".previsualizarImgGrupoE").attr("src", respuesta["wsp_foto"]);
			$('input[name="fotoActualE"]').val(respuesta["wsp_foto"]);
			$('input[name="subirImgGrupoE"]').val(respuesta["wsp_foto"]);
			
		}
		
	})

})


/*=============================================
Eliminar Grupo
=============================================*/

$(document).on("click", ".eliminarGrupo", function () {

	var idGrupo = $(this).attr("idGrupo");
	var rutaFoto = $(this).attr("rutaFoto");


	 Swal.fire({
                title: 'eliminar!',
                text: 'estas seguro de eliminar',
                icon: 'success',
                confirmButtonText: 'si eliminar'
                }).then(function(result){

					if (result.value) {
					
						var datos = new FormData();

						datos.append("idEliminar", idGrupo);
						datos.append("rutaFoto", rutaFoto);

						$.ajax({

								url: "ajax/grupos.ajax.php",
								method: "POST",
								data: datos,
								cache: false,
								contentType: false,
								processData: false,
							success: function (respuesta) {
									
								if (respuesta == "ok") {

									 Swal.fire({
                                        title: 'eliminado!',
                                        text: 'grupo eliminado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'cerrar'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'grupos';
                                        }
                                        
                                    });
								}
     						}	
							
						})									
								
														
                }
                                        
            });

})








					

                   






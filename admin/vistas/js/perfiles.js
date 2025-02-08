$(".tablaPerfiles").DataTable({
	
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
Subir imagen temporal crear perfil
=============================================*/

$("input[name='subirImgPerfil']").change(function(){

  var imagen = this.files[0];
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgPerfil']").val("");

	   swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else if(imagen["size"] > 2000000){

	  $("input[name='subirImgPerfil']").val("");

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

	    $(".previsualizarImgPerfil").attr("src", rutaImagen);

	  })

	}

})






/*=============================================
Editar perfil
=============================================*/


$(document).on("click", ".editarPerfil", function () {


	var idPerfil = $(this).attr("idPerfil");

	console.log(idPerfil);


	var datos = new FormData();

	datos.append("idPerfil", idPerfil);

	$.ajax({

		url:"ajax/perfiles.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
		dataType: "json",
		
		success: function (respuesta) {

			console.log(respuesta);


			$('input[name="idPerfilE"]').val(respuesta["id_perfil"]);
			$('input[name="nom_PerfilE"]').val(respuesta["nombre"]);
    		$('input[name="usu_PerfilE"]').val(respuesta["usuario"]);
			$('input[name="pass_user"]').val(respuesta["password"]);
			$('input[name="pass_userActual"]').val(respuesta["password"]);
            $('input[name="previsualizarImgPerfil"]').val(respuesta["foto"]);
            $('input[name="fotoActualE"]').val(respuesta["foto"]); 
            $('.previsualizarImgPerfil').attr("src", respuesta["foto"]);
		

		}


	})


})




/*=============================================
eliminar perfil
=============================================*/


$(document).on("click", ".eliminarPerfil", function () {

	var idPerfil1 = $(this).attr("idPerfil");
	var rutaFoto = $(this).attr("rutaFoto");




	 Swal.fire({
                title: 'eliminar!',
                text: 'estas seguro de eliminar',
                icon: 'success',
                confirmButtonText: 'si eliminar'
                }).then(function(result){

					if (result.value) {
					
						var datos = new FormData();

						datos.append("idPerfil1", idPerfil1);
						datos.append("rutaFoto", rutaFoto);

						$.ajax({

								url: "ajax/perfiles.ajax.php",
								method: "POST",
								data: datos,
								cache: false,
								contentType: false,
								processData: false,
							success: function (respuesta) {

								console.log(respuesta);
									
								if (respuesta == "ok") {

									 Swal.fire({
                                        title: 'eliminado!',
                                        text: 'perfil eliminado correctamente',
                                        icon: 'success',
                                        confirmButtonText: 'cerrar'
                                        }).then(function(result){

                                        if(result.value){   
                                            window.location = 'perfiles';
                                        }
                                        
                                    });
								}
     						}	
							
						})									
								
														
                }
                                        
            });

})
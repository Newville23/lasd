/*
** Al hacer clic sobre la entidades estas desapareco o aparece.
*/

$(function(){

	/*
	*si se agrega la clase="aparecer" a una entidad, al hacer clic sobre ella aparecerá
	 y desaparecerá el atributo llamado con un id . (por defecto estará desaparecida)
	*/
	function espabilar(atributo, fadeout){

		$(atributo).toggleClass("ghost");

		if ($(atributo).hasClass("ghost")) {

			$(atributo).fadeOut(fadeout); // desaparecer
		}
		else
		{
			$(atributo).fadeIn(500); // Aparecer
		}

	}
	// aparece y desaparece un bloque que por defecto está desactivado
	function alternar(apuntador, atributo){

		espabilar(atributo, 0);

		$(apuntador).on('click', function(){

			espabilar(atributo, 0);

		});
	}

	// aparece y desaparece un bloque que por defecto está activado
	function alternarClic(apuntador, atributo){

		$(apuntador).on('click', function(){

			espabilar(atributo, 0);

		});
	}

	/***************************************************************/
	//aparece y desaparece un bloque.
	function aparecer(apuntador, atributo){
		$(apuntador).on('click', function(){

			$(atributo).fadeIn(500); // Aparecer

		});
	}

	function desaparecer(apuntador, atributo){
		$(apuntador).on('click', function(){

			$(atributo).fadeOut(0); // desaparecer

		});
	}

	/***************************************************************/
	/*
	*
	*/
	function cambioClasesClic(apuntador, atributo, rmClass, addClass){
		
		$(apuntador).on('click', function(){

			$(atributo).addClass(addClass).removeClass(rmClass);

		});
	}
	/***************************************************************/

	/*
	*
	*/
	function activarLink(atributoGeneral, atributo, addClass){ 
		
		$(atributoGeneral).removeClass(addClass);

		$(atributo).addClass(addClass);
	}
	/***************************************************************/
	

	//***************** PAGINA DE ESTUDIANTES ****************************

	/*********Elementos ocultos por defecto**********/
	$('#materias').fadeOut(0);
	$('#perfil-caption2').fadeOut(0);
	$('#profes').fadeOut(0);
	$('#horario').fadeOut(0);

	//***** Cambios generales realizados  por el menu ***********

	cambioClasesClic('.menu', '#menu', "span5", "span3");
	cambioClasesClic('.menu', '#perfil', "span3", "span2");

	aparecer('.menu', '#perfil-caption2');

	desaparecer('.menu', '#miniatura');
	desaparecer('.menu', '#perfil-caption');

	// ======= Cambios al hacer clic en el Menú: materias =======
	aparecer('#apuntadorMaterias', '#materias');
	
	desaparecer('#apuntadorMaterias', '#profes');
	desaparecer('#apuntadorMaterias', '#horario');

	$('#apuntadorMaterias').on('click', function(){

		activarLink('#menu div div', '#apuntadorMaterias', 'Matbar-selected');
	});

	//==============================================================

	// Cambios al hacer clic en el Menú: profesores
	desaparecer('#apuntadorProfes', '#materias');
	desaparecer('#apuntadorProfes', '#horario');

	aparecer('#apuntadorProfes', '#profes');

	$('#apuntadorProfes').on('click', function(){

		activarLink('#menu div div', '#apuntadorProfes', 'Matbar-selected');
	});

	// Cambios al hacer clic en el Menú: horario
	desaparecer('#apuntadorHorario', '#materias');
	desaparecer('#apuntadorHorario', '#profes');

	aparecer('#apuntadorHorario', '#horario');

	$('#apuntadorHorario').on('click', function(){

		activarLink('#menu div div', '#apuntadorHorario', 'Matbar-selected');
	});

	//***************** PAGINA DE ESTUDIANTES/MATERIAS ****************************
	$('.btn-foro').fadeOut(0);
	$('#cuerpoforo').fadeOut(0);
	$('#comentarioforo').fadeOut(0);

	// cambios al 
	$('.textprincipal').on('focus', function(){

		$('.btn-foro, #cuerpoforo').fadeIn(500);
		$( ".textprincipal" ).attr( "rows", "2" ).addClass("fontSize3");
		$('#comentarioforo').fadeIn(500);
	});

	$('.cancelarforo').on('click', function(){

		$('.btn-foro, #cuerpoforo').fadeOut(500);
		//$( "#textprincipal" ).attr( "rows", "1" ).removeClass("fontSize3");
	});



	// tablas de notas
	$('.tabla-notas th.tabla-cabecera').on('click', function() {

		$('.tabla-notas tr span').addClass('desaparecer');

		var clasesita = $(this).attr('id');
		
		$('.' + clasesita).toggleClass('desaparecer');			
	});

// ******************* Barra de Menú de administrador *****************
	$('#boton-barra').on('click', function(){
		$('.barra-propiedades div').toggleClass('bp-envoltura');
	});



//============================================================================
//============================ AJAX ==========================================
//============================================================================


//========== F O R O==================================================================

	$('.foroTitulo a').on('click', function() {
			var id_enlace_foro = $(this).attr('id');
			var enlace_foro = $(this).attr('href');
			
			$('#cuerpoModalDelForo').load(enlace_foro);


	});


//======== L O G I N ====================================================================

	var peticion = $('.main form').attr('action');

	$('.main form').on('submit',function(e){

		e.preventDefault();

		$.ajax({

			beforeSend: function(){
				// se ejuecuta antes de realizar la peticion
				$('.main form .btn').html('<i class="icon-spinner icon-spin icon-large icon-muted"></i>');
				
			},

			url: peticion,
			type: "POST",
			data: $('.main form').serialize(),

			success: function(resp){

				var obj = jQuery.parseJSON(resp);

				console.log(obj["msj"])

				if (obj["estado"] == 1) {
					self.location = obj["msj"];
				}
				else if (obj["estado"] == 0){
					
					// $('#errorvalidation .alert').html(obj["msj"]);
					// $('#errorvalidation').removeClass('oculto');

					$('#errorvalidation2 .alert').html(obj["msj"]);
					$('#errorvalidation2').removeClass('oculto');
				}
			},

			error: function(jqXHR,estado,error){
				
				console.log(estado)
				console.log(error)
			},
			complete: function(jqXHR, estado){
				console.log(estado)
				$('.main form .btn').html('Enviar');
			},

			timeout: 10000,

		});

	});


	//========== F O R M U L A R I O S  ==================================================================
		$('form.formajax').on('submit', function(event) {

			event.preventDefault();

			var ran=Math.floor(Math.random()*1000000);

			var enlace = $(this).attr('action');

			$(this).attr('id', ran);

			$.post(enlace, $(this).serialize(), function(data) {

				$('#'+ ran.toString() + ' div.alerta').html(data);

				//$('form.formajax')[0].reset();

				console.log(data);

			});
			

		});
});
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

	// Cambios al hacer clic en el Menú: profesores
	aparecer('#apuntadorMaterias', '#materias');
	
	desaparecer('#apuntadorMaterias', '#profes');
	desaparecer('#apuntadorMaterias', '#horario');


	// Cambios al hacer clic en el Menú: profesores
	desaparecer('#apuntadorProfes', '#materias');
	desaparecer('#apuntadorProfes', '#horario');

	aparecer('#apuntadorProfes', '#profes');

	// Cambios al hacer clic en el Menú: profesores
	desaparecer('#apuntadorHorario', '#materias');
	desaparecer('#apuntadorHorario', '#profes');

	aparecer('#apuntadorHorario', '#horario');

	

});
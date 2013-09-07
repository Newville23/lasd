//========== F O R M U L A R I O S  ==================================================================
		$('form.formajax').on('submit', function(event) {

			event.preventDefault();

			var ran=Math.floor(Math.random()*1000000);

			var enlace = $(this).attr('action');

			$(this).attr('id', ran);

			$.post(enlace, $(this).serialize(), function(data) {

				//var obj = jQuery.parseJSON(data);

				$('#'+ ran.toString() + ' div.alerta').html(data);

				//$('form.formajax')[0].reset();
			
				console.log(data);

			});
			

		});


//======= FORM IMPUTS ============

	$('.rangeText').on('change', function(){
		
		
		var textValue = $(this).val();
		var id = $(this).attr('id');
		id = id.replace('text','');
		
		$('#range' + id).val(textValue);
	});

	$('.range').change(function(){

		var rangeValue = $(this).val();
		var id = $(this).attr('id');
		id = id.replace('range','');
		//console.log(rangeValue);
		$('#text' + id).val(rangeValue);
		$('#textNoForm' + id).text(rangeValue);

	});

	$('.rangeAjax').on('change', function(event){

		var enlace = $(this).attr('action');

		$.post(enlace, $(this).serialize()).success(function(data){

		});

	});
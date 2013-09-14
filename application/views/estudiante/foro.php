<?php 
	// Generan numeros aleatorios para los Id's del los botones y textos, para que no existan conflictos.
	// Variables para el foro general
	$cometarForo = rand(); 
	$resetComentario = rand();
	$botonesComentario = rand();
	$id_FormForo = rand();

?>

				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
					</a>
					<div class="media-body">
						<h3 id="myModalLabel" class="media-heading"><?php echo $titulo; ?></h3>
						<p class="well-white"><?php echo $cuerpo; ?></p>
						<p>
							<span class="voto"><?php echo $puntos; ?></span> 
							<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
							<span class="inforo"> <?php $this->tiempo->fechaHumana($fecha_creacion_foro); ?> <a href="#"><?php echo $nombre .' '. $apellido; ?></a></span>
						</p>
					</div>
				</div>
<!-- ================== Cometar en el foro ============================= -->
				
				<div class="media bloque-top">
					<a class="pull-left" href="#">
						<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
					</a>
					<div class="media-body clase-comentario-foro">

						<?php echo form_open('estudiante/foroAjax/' . $Materia_id . '/' . $Clase_numero . '/' . $id_time, 
						array('class' => 'form-horizontal', 'id' => $id_FormForo)) ?>

							<div class="control-group">
								<textarea name="comentarForo" id="<?php echo $cometarForo; ?>" placeholder="Escribe un comentario." class="input-block-level   comentarForo" wrap="hard" cols="30" rows="2"></textarea>
							</div>
							<div class="btn-group desaparecer" id="<?php echo $botonesComentario; ?>">
								<button id="" class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
								<button id="<?php echo $resetComentario; ?>" class="btn reset" type="reset"><i class="icon-remove"></i></button>
							</div>
						</form>
					</div>
				</div>
				
<!-- ====================================================================== -->

<!-- ---------------------------Comentarios---------------------------- -->
			
			<div id="conejillo"></div>

			<div class="bloqueComentarios">
				<?php foreach ($Comentario as $key => $value):  ?>
				<?php 
					$id_responder[$key] = rand(1345, getrandmax());
					$id_FormSubComentario[$key] = rand(1345, getrandmax());
				 ?>
				<div class="media bloque-top well-white" style="margin: 0px;">
					<a class="pull-left" href="#">
						<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
					</a>
					<div class="media-body">

						<h5 id="myModalLabel" class="media-heading"><a href="#"><?php echo $value['nombre'] .' '. $value['apellido'] ;?></a></h5>

						<p class=""><?php echo $value['cuerpo']; ?> <br>
						
							<span class="voto"><?php echo $value['puntos']; ?></span> 
							<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
							<span class="inforo"><a href="#" id="<?php echo $id_responder[$key]; ?>" class="muted"> Responder</a></span>
							<span class="inforo"> <?php $this->tiempo->fechaHumana($value['fecha_creacion_comentario']); ?> </span>
							
							<div class="clase-Subcomentario-foro">
								<?php echo form_open('estudiante/comentarioAjax/' . $value['Materia_id'] . '/' . $value['Clase_numero'] . '/' . $value['Foro_id_time'] . '/' . $value['id_time'], 
												array('class' => 'form-horizontal desaparecer', 'id' => $id_FormSubComentario[$key])) ?>
									<div class="control-group">
										<textarea name="comentarComentario" id="comentar" placeholder="Escribe un comentario." class="input-block-level  " wrap="hard" cols="30" rows="2"></textarea>
									</div>
									
									<div class="btn-group" id="">
										<button id="Subcomentar" class="btn btn-primary btn-small" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
									</div>
								</form>
							</div>
							
							<?php foreach ($value['SubComentario'] as $key => $SubComentario): ?>
							<div class="media bloque-top well-white">
								<a class="pull-left" href="#">
									<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
								</a>
								<div class="media-body">
									<strong id="myModalLabel" class="media-heading"><a href="#"><?php echo $SubComentario['nombre'] .' '. $SubComentario['apellido']; ?></a></strong>
									<?php echo $SubComentario['cuerpo']; ?> <br>
									<p>
										<span class="voto"><?php echo $SubComentario['puntos']; ?></span> 
										<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
										<span class="inforo"> <?php $this->tiempo->fechaHumana($SubComentario['fecha_creacion_sub']); ?> </span>
									</p>
								</div>
							</div>
							<?php endforeach; ?>
						</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			
			<!-- <div id="conejillo"></div> -->
					
	
<script>

	// Al hacer click sobre el texto para comentar el foro los botones del comentario se activan
	$('#<?php echo $cometarForo; ?>').on('focus', function(){
		$('#<?php echo $botonesComentario; ?>').fadeIn(500).removeClass('desaparecer');
	});

	// Al hacer click sobre el boton cancelar, los botones del comentar desaparecen
	$('#<?php echo $resetComentario; ?>').on('click', function(e) {
		e.preventDefault();

		$('#<?php echo $botonesComentario; ?>').fadeOut(500).addClass('desaparecer');
	});

	// foreach realizado a los comentarios con id's aleatorias
	<?php if (isset($id_responder)): ?>
		<?php foreach ($id_responder as $key => $value): ?>

			$('#<?php echo $value; ?>').on('click', function(e) {
				e.preventDefault();
				$('#<?php echo $id_FormSubComentario[$key]; ?>').fadeToggle(500).toggleClass('desaparecer');

			});

		<?php endforeach; ?>
	<?php endif; ?>

	// funcion que aparece y desaparece el textarea de respuesta de un comentario
	// function fadeResponder(){

	// 	$('.subComentar a').on('click', function(event) {
	// 		event.preventDefault();

	// 		var idSubcomentario = '#' + $(this).attr('class');
	// 		console.log(idSubcomentario);

	// 		$(idSubcomentario).fadeToggle(500).toggleClass('desaparecer');

	// 	});
	// }

//============================================================================
//============================ AJAX ==========================================
//============================================================================

//---------- Comentarios directos al foro ------------------------------------------//
	$('.clase-comentario-foro form').on('submit',function(e){

		e.preventDefault();

		// id del formulario capturado
		var id = '#' + $(this).attr('id');

		// URL del formulario
		var peticion = $(this).attr('action');

		$.ajax({

			url: peticion,
			type: "POST",
			data: $(id).serialize(),

			success: function(resp){
				
				var ran=Math.floor(Math.random()*1000000);

				if (resp !== 'textAreaVacio') {

					$('#conejillo').after(resp);

					$('.clase-comentario-foro form textarea').val(''); // Limpia el text-Area

					// fadeResponder();
				};
			},

			error: function(jqXHR,estado,error){
				
				console.log(estado)
				console.log(error)
			},
			complete: function(jqXHR, estado){
				console.log(estado)
			},

			timeout: 10000,

		});

	});

// ---------- SubComentarios ----------------------------------
	$('.clase-Subcomentario-foro form').on('submit',function(e){

		e.preventDefault();

		var peticion = $(this).attr('action');
		var id = '#' + $(this).attr('id');

		$.ajax({

			url: peticion,
			type: 'POST',
			data: $(id).serialize(),

			success: function(resp){
				console.log(resp)

				if (resp !== 'textAreaVacio') {

					$('.clase-Subcomentario-foro form').after(resp);

					// Limpia el text area del campo comentario.
					$('.clase-Subcomentario-foro form textarea').val('');

				}
			},

			timeout: 10000,

		});

	});

//------------------------------------------------------------

</script>
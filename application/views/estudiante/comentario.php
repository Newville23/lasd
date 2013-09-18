<div class="media bloque-top well-white">
	<a class="pull-left" href="#">
		<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
	</a>
	<div class="media-body">
		<h5 id="myModalLabel" class="media-heading"><a href="#"><?php echo $nombre .' '. $apellido; ?></a></h5>
		<p class=""><?php echo $cuerpo; ?> <br>
					
			<span class="voto"><?php echo $puntos; ?></span> 
			<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
			<span class="inforo subComentar"><a href="#" id="#" class="<?php echo $subComentar = rand(); ?>"> Responder</a></span>

			<span class="inforo"><?php $this->tiempo->fechaHumana($fecha_creacion_comentario); ?></span>

			<div class="clase-Subcomentario-foro">
				<?php echo form_open('estudiante/comentarioAjax/' . $Materia_id . '/' . $Clase_numero . '/' . $Foro_id_time . '/' . $id_time, 
								array('class' => 'form-horizontal desaparecer', 'id' => $subComentar )) ?>
					<div class="control-group">
						<textarea name="comentarComentario" id="comentar" placeholder="Escribe un comentario." class="form-control" wrap="hard" cols="30" rows="2"></textarea>
					</div>
										
					<div class="btn-group" id="">
						<button id="Subcomentar" class="btn btn-primary btn-small" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
					</div>
				</form>
			</div>
		</p>
	</div>
</div>

<script>
		
	$('.subComentar a.<?php echo $subComentar;?>').on('click', function(event) {
		event.preventDefault();

		var idSubcomentario = '#' + $(this).attr('class');

		$(idSubcomentario).fadeToggle(500).toggleClass('desaparecer');

	});

	$('#<?php echo $subComentar;?>').on('submit',function(e){

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

</script>
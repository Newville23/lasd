<?php if (isset($listaEstudiante) && !empty($listaEstudiante)): ?>
	

<?php foreach ($listaEstudiante as $key => $value): ?>
	
	<div class="media well-white bloque-top marcador-borde-azul" style="margin: 0px;">
		<a class="pull-left" href="#">
	  		<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
		</a>
		<div class="media-body">
	   		<div class="col-md-5 col-xs-12">
	   			
	   			<a 
					id="#<?php //echo $value['id_time']; ?>" 
					class=""
					href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
					data-target="#modalPerfil<?php echo $value['identificacion']; ?>" data-toggle="modal">
					<strong class="media-heading text-success"><?php echo $value['nombre'] .' '. $value['apellido']; ?></strong>
				</a>
	    			<br><a class="fontSize1" href="#"><i class="fa fa-envelope-alt"></i> Mensaje</a>
	   		</div>
					    							
			<div class="col-md-6 col-xs-12">
				<div class="row">
					<div class="col-md-6"><span class="text-muted">Curso: </span>
						<?php echo $value['nombre_curso'] . 'º' . $value['indice']; ?></div>
					<div class="col-md-6"><span class="text-muted">
						<?php echo $value['tipo_identificacion'] . ': ' . $value['identificacion'] ; ?>
						</span></div>
				</div>
			</div>

			<div class="col-md-1 col-xs-12" style="text-align: right;">
					<button class="btn btn-default btn-lg btn-block"><i class="fa fa-edit fa-lg"></i> </button>
			</div>
		</div>

	</div>

	<div class="modal" id="modalPerfil<?php echo $value['identificacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	      	<div class="modal-content modal-correccion">

		        <div class="modal-header">
		         	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
		         	<h4 class="modal-title text-muted">Perfil de estudiante</h4>
		        </div>

		        <div class="modal-body">
		        	<div class="tabbable">

						<ul class="nav nav-tabs nav-justified">
						 	<li class="active"><a href="#info" data-toggle="tab">Infomacion Básica</a></li>
							<li class="hidden"><a href="#editar" data-toggle="tab">Editar</a></li>
						</ul>

						<div class="tab-content">

							<div class="tab-pane active" id="info">

								<div class="thumbnail margen-top" id="miniatura">
									<img class="img-rounded" data-src="holder.js/300x150" alt="300x150" style="width: 300px;" 
									src="<?php echo base_url('bootstrap/img/images/avatar.png'); ?>">
								</div>

								<div class="caption" id="perfil-caption">
									<h4><?php echo $value['nombre'] . " " . $value['apellido']; ?> </h4>

									<p><strong class="text-success">Curso: </strong> <?php echo $value['nombre_curso'] . $value['indice']; ?></p>

									<p><strong class="text-success">Edad: </strong> 
										<?php  echo $this->tiempo->calcularEdad($value['fecha_nacimiento']);?> Años
										<span class="text-muted"><?php  echo $value['fecha_nacimiento'];?></span></p>

									<p><strong class="text-success"><?php echo $value['tipo_identificacion'] ?>: </strong> <?php  echo $value['identificacion'];?></p>
									<p><strong class="text-success">Tipo de Sangre: </strong><?php echo $value['tipo_sangre'] ?></p>

									<p><strong class="text-success">Email: </strong><?php echo $value['email'] ?></p>
								</div>	

							</div>

							<div class="tab-pane" id="editar">
							</div>

						</div>
					</div>
		 	    </div>

	      	</div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<?php endforeach ?>

<?php else: ?>
	<p>No se han encontrado resultados para tu búsqueda </p>
<?php endif; ?>
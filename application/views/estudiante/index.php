		<div class="container container2">
			<div class="row">

				<div class="col-md-3 well well-white margen2" id="perfil">
					<?php $this->load->view('estudiante/includes/perfil-inicio'); ?>
				</div>

	
				<div class="row">
					
					<div class="col-md-5 margen2" id="menu">
						<div class="row margen-bottom2">
							
							<a href="#">
								<div class="">
									<span>Progreso Notas</span>
									<div class="progress" style="height: 10px;">
										<div class="progress-bar progress-bar-warning" style="width: 40%;">
									    	<span class="sr-only">20% Complete (warning)</span>
									    </div>

										<div class="progress-bar progress-bar1" style="width: 15%">
											<span class="sr-only">20% Complete (warning)</span>
										</div>

										<div class="progress-bar progress-bar-success" style="width: 5%">
											<span class="sr-only">10% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
					
							<a href="#">
								<div class="">
									<span>Asistencias a clase</span>
									<div class="progress" style="height: 10px;">

										<div class="progress-bar progress-bar1" style="width: 30%">
											<span class="sr-only">20% Complete (warning)</span>
										</div>

										<div class="progress-bar progress-bar-success" style="width: 10%">
											<span class="sr-only">10% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="row fontSize4">
							<div class="col-md-12 Matbar menu" id="apuntadorMaterias">
								<div><i class="icon-book icon-large"></i> Materias</div>
							</div>
						</div>

						<div class="row fontSize4">
							<div class="col-md-12 Matbar menu" id="apuntadorProfes"><i class="icon-group"></i> Profesores</div>
						</div>

						<div class="row fontSize4">
							<div class="col-md-12 Matbar menu" id="apuntadorMensaje">
								<div><i class="icon-envelope-alt icon-large"></i> Mensajes</div>
							</div>
						</div>

						<div class="row fontSize4">
							<div class="col-md-12 Matbar menu" id="apuntadorHorario"><i class="icon-th icon-large"></i> Horario</div>
						</div>

					</div>
					
					<div class="col-md-6 well" id="materias">
						<div class="row">
							<?php foreach ($clase as $value): ?>
							<a class="Matbar2" href="<?php echo site_url('estudiante/materia/' . $value['numero']); ?>">
								<p><strong><?php echo $value['materia']; ?></strong><br>
									  <small><?php echo $value['profesor']; ?></small>
								</p>
							</a>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="col-md-6 well" id="profes">
						<ul class="list-unstyled">
							<li>
								<?php foreach ($profesores as $value): ?>
								<div class="media well well-white">
							  		<a class="pull-left" href="#">
							    		<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
							  		</a>
							  		<div class="media-body">
							    		<h4 class="media-heading"><?php echo $value['nombre']; ?></h4>
							    		<p>
							    			<?php echo $value['profesion']; ?>
							    			<span class="inforo"><i class="icon-envelope"></i><a href="#"> Mensaje</a></span>
							    		</p>

							  		</div>
								</div>
								<?php endforeach; ?>
							</li>	
						</ul>

					</div>

				</div>



				<div class="col-md-6 well" id="horario">
					<ul>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
					</ul>
				</div>
			
			</div>
		</div>

		<!-- Modal del Perfil -->
<!-- 		<div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header" style="background-color: rgba(221, 221, 221, 0.3);">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
				  <h4 class="text-muted text-center" id="myModalLabel">Datos del Estudiante</h4 class="text-muted text-center">
			</div>
			<div class="modal-body" id="">
				
			</div>
		</div> -->

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
        	<?php $this->load->view('estudiante/includes/perfil-completo') ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

